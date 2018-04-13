        <div id="form-wrapper" class="section">

            <div id="formError"></div>

            <form action="game-success.php" method="post" id="success-form">
                <div class="inner">
                    <div class="text-fields">

                        <div class="half">
                            <input type="text" name="fname" id="fname" placeholder="First name">
                            <input type="text" name="email" id="email" placeholder="Work email">
                            <select name="role" id="role" placeholder="Role">
                                <option value="default">Your role at your company</option>
                                <option value="I'm a Decision Maker">Decision Maker</option>
                                <option value="I'm an Office Manager/EA">Office Manager/EA</option>
                                <option value="I'm in HR/Payroll">HR/Payroll</option>
                                <option value="I'm a Director">Director</option>
                                <option value="I'm a Manager">Manager</option>
                                <option value="I'm an employee">Employee</option>
                            </select>
                        </div>

                        <div class="half">
                            <input type="text" name="lname" id="lname" placeholder="Last name">
                            <input type="text" name="cname" id="cname" placeholder="Company Name">
                            <select name="size" id="size" placeholder="Company Size">
                            <option value="default">Company Size</option>
                            <option value="1 - 4">1 - 4 employees</option>
                            <option value="5 - 9">5 - 9 employees</option>
                            <option value="10 - 19">10 - 19 employees</option>
                            <option value="20 - 49">20 - 49 employees</option>
                            <option value="50 - 99">50 - 99 employees</option>
                            <option value="100 - 249">100 - 249 employees</option>
                            <option value="250 - 999">250 - 999 employees</option>
                            <option value="1000+">1000+ employees</option>
                            </select>
                        </div>

                    </div>
                </div>

                <input type="submit" name="prize-entry-button" id="prize-entry-button" class="button-yellow" value="All Done">  
                
            </form>
            
            <p id="tac">By submitting your information above, you agree to the campaign <a href="https://www.perkbox.co.uk/goldcard/article/terms-amp-conditions-perkbox-surprizes" data-clicked="terms-and-conditions" class="ga" target="_blank">Terms &amp; conditions</a> / <a href="https://www.perkbox.co.uk/goldcard/article/huddlebuy-perks-privacy-policy" target="_blank">Privacy Policy</a></p>

            <div id="trustE-container"> 
                <img src="img/trust.png" alt="TrustE Verified" id="trust-badge">
            </div>

        </div>


