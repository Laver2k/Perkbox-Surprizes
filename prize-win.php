<?php

if (isset($_GET["prize"])){

    switch($_GET["prize"]) {
    case "balloon":
       $prizeImage = "prize-balloon.png"; 
       $prizeDescription = "Hot Air Balloon Ride";
    break;

    case "adventure":
       $prizeImage = "prize-bungee.png";  
       $prizeDescription = "Adventure Pack: Supercar Driving Experience or Bungee Jumping ";
    break;

    case "coffee":
       $prizeImage = "prize-coffee.png";  
       $prizeDescription = "2 Free Cafe Nero Coffees";
    break;

    case "massage":
       $prizeImage = "prize-massage.png";  
       $prizeDescription = "Office Massage";
    break;

    case "cinema":
       $prizeImage = "prize-popcorn.png";  
       $prizeDescription = "2 Free Cinema Tickets ";
    break;

    case "voucher":
       $prizeImage = "prize-voucher.png";  
       $prizeDescription = "£200 gift voucher of your choice : Tesco / John Lewis / M&S / Sainsburys";
    break;

    case "vr":
       $prizeImage = "prize-vr.png";  
       $prizeDescription = "Samsung VR Headset";
    break;

    default:
        header( 'Location: game.php' ) ;
    }

} else {
    header( 'Location: game.php' ) ;
}


include 'includes/header.php';



?>

    <div id="wrapper" class="prize-win bg-blue">

        <!--Introduction-->
        <div id="game-introduction" class="section">
            <div class="inner">
                <a href="http://tr.huddlebuy.co.uk/aff_c?offer_id=286&aff_id=2137&url_id=1787&source=pb_surprize_logofb" target="_blank" class="ga" data-clicked="perkbox logo"><img src="img/logo.png" alt="Perkbox" id="logo"></a>
                <br>
                <img src="img/plane.png" alt="Plane with surprizes" id="plane">
                <h2>CONGRATULATIONS!<br/>YOU'RE A WINNER!</h2>

                <img src="img/prizes/<?php echo $prizeImage;?>">

                <p id="prize"><?php echo $prizeDescription;?></p>

                <p id="prize-lose-summary">Give yourself a high-five, pat yourself on the back – a member of our super-friendly team will be in touch soon to deliver your prize. Please keep an eye on your emails!</p>
               
                <img src="img/keep-winning.png" alt="want to keep winning?" id="keep-winning">

                <p id="find-out-more">Find out more about the hundreds of perks available for you and your whole team all year round with Perkbox.</p>


                <div id="perk-partners">
                    <img src="img/starbucks.png" alt="Starbucks">
                    <img src="img/tesco.png" alt="Tesco">
                    <img src="img/virgin.png" alt="Virgin">
                    <img src="img/boots.png" alt="Boots">
                    <img src="img/debenhams.png" alt="Debenhams">
                </div>

                <div id="perk-partners">
                    <img src="img/mands.png" alt="M&amp;S">
                    <img src="img/vue.png" alt="Vue">
                    <img src="img/apple.png" alt="Apple">
                    <img src="img/papajohns.png" alt="Papa Johns">
                    <img src="img/amazon.png" alt="Amazon">
                </div>

                <img src="img/hundreds-more.png" alt="and 100s more" id="hundreds-more">

                <div id="get-perks">
                    <h3>Get your team <span>free perks!</span></h3>
                </div>

                <?php
                    include('forms/hr-share-form.php');
                ?>


            </div>
        </div>


        <?php
            include('includes/summary.php');
        ?>







<?php
include 'includes/footer-blue.php';
