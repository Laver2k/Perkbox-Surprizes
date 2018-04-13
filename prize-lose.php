<?php
include 'includes/header.php';
?>

    <div id="wrapper" class="prize-lose bg-blue">

        <!--Introduction-->
        <div id="game-introduction" class="section">
            <div class="inner">
                <a href="http://tr.huddlebuy.co.uk/aff_c?offer_id=286&aff_id=2137&url_id=1787&source=pb_surprize_logofb" target="_blank" class="ga" data-clicked="perkbox logo"><img src="img/logo.png" alt="Perkbox" id="logo"></a>
                <br>
                <img src="img/plane.png" alt="Plane with surprizes" id="plane" class="small-plane">
                <h2>UNLUCKY! DON’T WORRY.</h2>

                <div id="fail-options">
                    <a href="http://join.perkbox.co.uk/1-more-chance/" data-clicked="play-link" class="button-yellow ga">Get 1 more chance</a>
                    <span id="or">OR</span>
                    <a href="#" data-clicked="get-perks-link" class="button-yellow ga">Get Free Perks</a> 
                </div>

                <div id="get-perks">
                    <h3>Get your team <span>free perks!</span></h3>
                </div>

                <p id="prize-lose-summary">Perkbox is the UK’s leading team happiness platform.<br/>Big or small, we’re all about making your company a rewarding and happier place to work. Bring your team together with our engagement platform that has hundreds of free &amp; exclusive perks, health &amp; wellness, rewards and more.</p>


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
