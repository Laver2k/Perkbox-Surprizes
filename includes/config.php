<?php
//Set the odds here -  1 out of this number will win a prize.
$GLOBALS["gameOdds"] = 1;

//API Path
$GLOBALS["apiPath"] = "";

//Max entries per email address - to deter spammers.
$GLOBALS["maxAllowedEntries"] = 25;

//Campaign end date [US Format] - this is only used for reporting and does not impact the game or odds.
$GLOBALS["campaignEndDate"] = "2016-08-29 23:59:59";

//Connection
if ($_SERVER['SERVER_NAME'] == 'perkbox.localhost' ) {
	//Development database
	$host = '127.0.0.1';
	$db   = ''; 
	$user = ''; 
	$pass = ''; 
	$charset = 'utf8';

} else {
	//Live database
	$host = '';
	$db   = ''; 
	$user = ''; 
	$pass = ''; 
	$charset = 'utf8';
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
$GLOBALS["pdo"]  = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
    print "<span style='color:#fff;'>Sorry, something went wrong - please try again later<br/><br/></span>";
    die();
}
