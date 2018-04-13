<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Only process a form if it has been posted.

    //Data collection - Put the values receieved here
    $submittedYourName = strip_tags(trim($_POST["referrer"]));
    $submittedYourName = str_replace(array("\r","\n"),array(" "," "),$submittedYourName);
    $submittedFirstName = strip_tags(trim($_POST["hrfname"]));
    $submittedFirstName = str_replace(array("\r","\n"),array(" "," "),$submittedFirstName);
    $submittedLastName = strip_tags(trim($_POST["hrlname"]));
    $submittedLastName = str_replace(array("\r","\n"),array(" "," "),$submittedLastName);
    $submittedEmail = filter_var(trim($_POST["hremail"]), FILTER_SANITIZE_EMAIL);
    $submittedCompanyName = strip_tags(trim($_POST["cname"]));
    $submittedCompanyName = str_replace(array("\r","\n"),array(" "," "),$submittedCompanyName);
    $submittedRole = "I'm a Decision Maker";
    $submittedPhone = strip_tags(trim($_POST["hrtel"]));
    $submittedPhone = str_replace(array("\r","\n"),array(" "," "),$submittedPhone);
    $submittedCompanySize = strip_tags(trim($_POST["size"]));

    //Error checking - errors are stored in the $feedback variable
    $feedback = "";

    //Your Name
    if ($submittedYourName=="" || strlen($submittedYourName)<1 || strlen($submittedYourName)>45) {
        $feedback .= "Please enter a valid name<br/>";
    }

    //HR Name
    if ($submittedFirstName=="" || strlen($submittedFirstName)<1 || strlen($submittedFirstName)>45) {
        $feedback .= "Please enter a valid HR manager's first name<br/>";
    }

    if ($submittedLastName=="" || strlen($submittedLastName)<1 || strlen($submittedLastName)>45) {
        $feedback .= "Please enter a valid HR manager's last name<br/>";
    }

    //Email 
    if (!isValidEmail($submittedEmail) || strlen($submittedEmail)<3 || strlen($submittedEmail)>45 ) {
        $feedback .= "The email address entered is not valid<br/>";
    }

    //Company Name
    if ($submittedCompanyName=="default"){
        $feedback .= "Please enter a valid company name<br/>";            
    }
    if (strlen($submittedEmail)>45){
        $feedback .= "Please enter a shorter company name<br/>";            
    }

    //Size
    if ($submittedCompanySize=="default") {
        $feedback .= "Please enter a valid company size<br/>";            
    }

    //Phone
    if (strlen($submittedPhone)<9 || strlen($submittedPhone)>15){
        $feedback .= "The telephone number is not valid<br/>";            
    }

    if ($feedback =="") {

        //Validation succeeded
        $data = array(
        'firstname'=>$submittedFirstName,
        'lastname'=>$submittedLastName,
        'email'=>$submittedEmail,
        'phone_number'=>$submittedPhone,
        'company_name'=>$submittedCompanyName,
        'company_size'=>$submittedCompanySize,
        'role'=>$submittedRole,
        'utm_term'=>'fb_comp_2',
        'referrer'=>$submittedYourName
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
        echo $response; //Returns the status of the curl request.


    } else {
        $feedback = "<p>".$feedback."</p>";
        echo $feedback;
    }



}


function isValidEmail($email){ 
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
