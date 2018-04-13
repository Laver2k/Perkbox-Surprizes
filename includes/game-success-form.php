<?php
include 'config.php';
include 'prize.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Only process a form if it has been posted.

    //Data collection - Put the values receieved here
    $submittedFirstName = strip_tags(trim($_POST["fname"]));
    $submittedFirstName = str_replace(array("\r","\n"),array(" "," "),$submittedFirstName);
    $submittedLastName = strip_tags(trim($_POST["lname"]));
    $submittedLastName = str_replace(array("\r","\n"),array(" "," "),$submittedLastName);
    $submittedEmail = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $submittedCompanyName = strip_tags(trim($_POST["cname"]));
    $submittedCompanyName = str_replace(array("\r","\n"),array(" "," "),$submittedCompanyName);
    $submittedRole = strip_tags(trim($_POST["role"]));
    $submittedCompanySize = strip_tags(trim($_POST["size"]));
    $submittedPhone = "07777777777";
    //Sanitize for database input - addslashes to each typed input for security.
    $submittedFirstName = strtolower(addslashes($submittedFirstName));
    $submittedLastName = strtolower(addslashes($submittedLastName));
    $submittedEmail = strtolower(addslashes($submittedEmail));
    $submittedCompanyName = addslashes($submittedCompanyName);
    $submittedRole = addslashes($submittedRole);
    $submittedCompanySize = addslashes($submittedCompanySize);

    //Error checking - errors are stored in the $feedback variable
    $feedback = "";
    $fail = false; //$fail is used for forcing a fail without giving the user feedback.

    if (rapidEntrySpamCheck($submittedEmail) == true) {
        $fail = true;
    }

    //Name
    if ($submittedFirstName=="" || strlen($submittedFirstName)<1 || strlen($submittedFirstName)>100) {
        $feedback .= "Please enter a valid first name<br/>";
    }

    if ($submittedLastName=="" || strlen($submittedLastName)<1 || strlen($submittedLastName)>100) {
        $feedback .= "Please enter a valid last name<br/>";
    }

    //Email 
    if (!isValidEmail($submittedEmail) || isSpam($submittedEmail) || strlen($submittedEmail)<3 || strlen($submittedEmail)>254 ) {
        $feedback .= "The email address entered is not valid<br/>";
    }

    //Company Name
    if ($submittedCompanyName=="default"){
        $feedback .= "Please enter a valid company name<br/>";            
    }

    //Role
    if ($submittedRole=="default") {
        $feedback .= "Please enter a valid company role<br/>";            
    }

    //Size
    if ($submittedCompanySize=="default") {
        $feedback .= "Please enter a valid company size<br/>";            
    }


    if ($feedback =="") {

        //If the user has been flagged as spamming, auto-fail them.
        if ($fail == true) {
            echo "lose";
            return;
        }

        //Validation succeeded
        $data = array(
        'firstname'=>$submittedFirstName,
        'lastname'=>$submittedLastName,
        'email'=>$submittedEmail,
        'phone_number'=>$submittedPhone,
        'company_name'=>$submittedCompanyName,
        'company_size'=>$submittedCompanySize,
        'role'=>$submittedRole,
        'utm_term'=>'fb_comp_1'
        );

        $url = $GLOBALS["apiPath"];
        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($data, "", "&amp;");
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response,true);
        $response = $response['status'];

        //Create a user
        $sql = "INSERT INTO users (email, firstName, lastName, companyName, role, companySize, registeredDate) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
        $createUserQuery = $GLOBALS["pdo"]->prepare($sql);
        $createUserQuery->bindParam(1, $submittedEmail);
        $createUserQuery->bindParam(2, $submittedFirstName);
        $createUserQuery->bindParam(3, $submittedLastName);
        $createUserQuery->bindParam(4, $submittedCompanyName);
        $createUserQuery->bindParam(5, $submittedRole);
        $createUserQuery->bindParam(6, $submittedCompanySize);

        $createUserQuery->execute();
        $userID = $GLOBALS["pdo"]->lastInsertId();

        $competitionResult = runCompetition($userID);
        echo $competitionResult;

    } else {
        $feedback = "<p>".$feedback."</p>";
        echo $feedback;
    }

}


//Takes an email address, checks that it isnt being used for spamming entries. 
function isSpam($email){

    //Check user hasnt exceeded maximum allowed entries
    $entriesByEmailSQL = $GLOBALS["pdo"]->prepare("SELECT COUNT(*) as numberOfEntriesByEmail FROM users WHERE email = :email");
    $entriesByEmailSQL->bindValue(':email', $email, PDO::PARAM_STR);
    $entriesByEmailSQL->execute();
    $entriesByEmailSQL->setFetchMode(PDO::FETCH_ASSOC);

    while($row = $entriesByEmailSQL->fetch()) {
        $numberOfEntriesByEmail = $row['numberOfEntriesByEmail']."<br/>";
        if(intval($numberOfEntriesByEmail)>$GLOBALS["maxAllowedEntries"] ) {
            return true;
        }
    }

}

//Checks user hasnt spammed the form.
function rapidEntrySpamCheck($email) {

    $entryFormSQL = $GLOBALS["pdo"]->prepare("SELECT registeredDate FROM users WHERE email = :email ORDER BY registeredDate DESC LIMIT 1");
    $entryFormSQL->bindValue(':email', $email, PDO::PARAM_STR);
    $entryFormSQL->execute();
    $entryFormSQL->setFetchMode(PDO::FETCH_ASSOC);

    while($row = $entryFormSQL->fetch()) {
        $lastEntry = strtotime($row['registeredDate']);
        $now = time();
        $differenceInSeconds = $now - $lastEntry;
        //Only entries more than 10s apart count
        if($differenceInSeconds < 10) {
            return true;
        }
    }
}


function isValidEmail($email){ 
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
