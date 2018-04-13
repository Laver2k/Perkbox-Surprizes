<?php
include 'includes/header.php';
?>

    <div id="wrapper" class="fail bg-blue">

        <!--Introduction-->
        <div id="game-introduction" class="section">
            <div class="inner">
                <a href="http://tr.huddlebuy.co.uk/aff_c?offer_id=286&aff_id=2137&url_id=1787&source=pb_surprize_logofb" target="_blank" class="ga" data-clicked="perkbox logo"><img src="img/logo.png" alt="Perkbox" id="logo"></a>
                <br>
                <img src="img/plane.png" alt="Plane with surprizes" id="plane" class="small-plane">
                <h2>OH WELL, BETTER LUCK NEXT TIME.</h2>
                <p id="lose-message">Not as easy as it looks, is it? Don’t worry, you can try again, or (spoilers) you can click below and be a winner every day with Perkbox.</p>

                <div id="fail-options">
                    <a href="http://join.perkbox.co.uk/1-more-chance/" data-clicked="play-link" class="button-yellow ga">Get 1 more chance</a>
                    <span id="or">OR</span>
                    <a href="#form-anchor" data-clicked="get-perks-link" class="button-yellow ga">Get Free Perks</a> 
                </div>


                <div id="get-perks">
                    <h3>Get your team <span>free perks!</span></h3>
                </div>

                <div id="perk-partners">
                    <img src="img/amazon.png" alt="Amazon">
                    <img src="img/tesco.png" alt="Tesco">
                    <img src="img/apple.png" alt="Apple">
                    <img src="img/mands.png" alt="M&amp;S">
                    <img src="img/vue.png" alt="Vue">
                </div>

                <img src="img/hundreds-more.png" alt="and 100s more" id="hundreds-more">


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
