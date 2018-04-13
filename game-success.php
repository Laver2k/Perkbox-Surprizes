<?php
include 'includes/header.php';
?>

    <div id="wrapper" class="success bg-blue">

        <!--Introduction-->
        <div id="game-introduction" class="section">
            <div class="inner">
                <a href="http://tr.huddlebuy.co.uk/aff_c?offer_id=286&aff_id=2137&url_id=1787&source=pb_surprize_logofb" target="_blank" class="ga" data-clicked="perkbox logo"><img src="img/logo.png" alt="Perkbox" id="logo"></a>
                <br>
                <img src="img/plane.png" alt="Plane with surprizes" id="plane" class="small-plane">
                <h2>YOU'RE ALMOST THERE...</h2>
                <p id="awesome-skills">Awesome skills! As part of our lucky draw, fill in your details below to see if you’ve won one of our many instant surprizes. Don't worry – we'll keep your information private.</p>
                <?php 
                include('forms/game-entry-form.php');
                ?>
            </div>
        </div>



        <!--cloud line-->
        <div class="section bg-blue">
                <img src="img/cloud-line.png" alt="clouds">
        </div>

<?php
include 'includes/footer-white.php';
