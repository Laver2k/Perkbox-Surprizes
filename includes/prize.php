<?php

//Determine if user has won a prize
function runCompetition($userID) {
    $game_odds = $GLOBALS["gameOdds"];
    $random_number = mt_rand(1, $game_odds);
    if ( $random_number == 1){
        //Award a prize
        $prize = selectPrize($userID);
        if ($prize !== false) {
            return $prize;
        }
    } else {
            return 'lose';
    }
} 

//Determine which prize the user has won.
function selectPrize($userID) {
    $claimed = 0;
    $sql = "SELECT * FROM prizes WHERE dateAvailableFrom <= CURDATE() AND claimed = ? ORDER BY RAND() LIMIT 1";
    $availablePrizesQuery = $GLOBALS["pdo"]->prepare($sql);
    $availablePrizesQuery->execute([$claimed]);

    if ($availablePrizesQuery->rowCount()>0) {
        foreach ($availablePrizesQuery as $row) {
            claimPrize($row['prizeID'], $userID);
            return $row['prizeDescription'];
        }
    } else {
        return false;
    }
}

//Mark the prize as claimed.
function claimPrize($prizeID, $userID) {
    $sql = "UPDATE prizes SET claimed=1, claimedUserID=?, dateClaimed=CURRENT_TIMESTAMP WHERE prizeID=?";
    $claimQuery = $GLOBALS["pdo"]->prepare($sql);
    $claimQuery->execute([$userID, $prizeID]);
}
