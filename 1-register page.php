<?php
require_once'includes\signup_view.inc.php';
require_once'includes\config_session.inc.php';


if(!isset($_SESSION['user_id'])) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/1-signup.css">
    <link rel="stylesheet" href="css/form-error.css">
    <link rel="stylesheet" href="css/radio_style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
   
</head>
<body>
    <div class="container">
        <div class="a">
        <nav>
                <img src="Capture.PNG" class="logo" alt="">
                <ul>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">Driver account</a></li>
                    <li><a href="#">passenger account</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
                
                <div class="user">
                    <details>
                          <summary> <img src="user-interface.png"></summary>
                          <div class="list">
                              <div class="list-1"><ul>
                              <?php
                                if(isset($_SESSION['user_id'])){
                                    ?>
                                    <li>
                                        <a href="<?php echo ($_SESSION['account_type'] == "passenger") ? "1-Passenger account page.php" : "1-driver-account.php"; ?>" target="_blank">
                                            <?php
                                            if( $_SESSION['account_type'] == "passenger" ){
                                                ?>
                                                Passenger account
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if( $_SESSION['account_type'] == "driver" ){
                                                ?>
                                                Driver account
                                                <?php
                                            }
                                            ?>
                                            <img src="icons8-linking-100.png" alt="Link">
                                        </a>
                                    <?php
                                }
                                ?>

                              </li>
                              <li>
                              <?php
                                if(isset($_SESSION['user_id'])){
                                    ?>
                                    <li>
                                            <?php
                                            if( $_SESSION['account_type'] == "driver" ){
                                                ?>
                                                    <a href="1-journey management.php" target="_blank">
                                                        Journey management
                                                        <img src="icons8-linking-100.png" alt="">
                                                    </a> 
                                                <?php
                                            }
                                            ?>
                                    <?php
                                }
                                ?>
                              </li>
                              <li>
                              <?php
                                if(isset($_SESSION['user_id'])){
                                    ?>
                                    <li>
                                            <?php
                                            if( $_SESSION['account_type'] == "driver" ){
                                                ?>
                                                    <a href="1-New journey page.php" target="_blank">
                                                        New Journey
                                                        <img src="icons8-linking-100.png" alt="">
                                                    </a> 
                                                <?php
                                            }
                                            ?>
                                    <?php
                                }
                                ?>
                              </li>
                              <li>
                              <?php
                                if(isset($_SESSION['user_id'])){
                                    ?>
                                    <li>
                                            <?php
                                            if( $_SESSION['account_type'] == "passenger" ){
                                                ?>
                                                    <a href="index.php" target="_self">
                                                        Search
                                                        <img src="icons8-linking-100.png" alt="">
                                                    </a> 
                                                <?php
                                            }
                                            ?>
                                    <?php
                                }
                                ?>
                              </li>
                              <li>
                              <li>
                              <?php
                                if(!isset($_SESSION['user_id'])){
                                    ?>
                                    <li>
                                        <a href="1-sign-in.php">
                                        Login
                                        <img src="login.png" alt="">
                                        </a>
                                    <?php
                                }
                                ?>
                                </li>
                                <li>
                              <?php
                                if(!isset($_SESSION['user_id'])){
                                    ?>
                                    <li>
                                        <a href="1-register page.php">
                                        SIGN UP
                                        <img src="login.png" alt="">
                                        </a>
                                    <?php
                                }
                                ?>
                                </li>
                                <li>
                                <?php
                                if(isset($_SESSION['user_id'])){
                                    ?>
                                    <form method="post" action="includes/logout.inc.php" style="display: flex;  justify-content: space-between;text-align: center;" >
                                        <button class="" type="submit"  style="text-decoration: none;display: flex;align-items: center;width: 100%;margin: 10px;color: var(--clr-text);white-space: nowrap; text-overflow: ellipsis; background-color: transparent;border-radius: 0;border: none;cursor:grab;font-family: Arial, sans-serif;font-family: 'Poppins', sans-serif; font-size: 18px; ">


                                                Logout
                                                <img src="login.png" width="30px" height="30px" alt="logout">
                                        </button>
                                    </form>
                                    <?php
                                }
                                ?>
                                </li>

                          </div>
                    </details>           
            </nav>

            <div class="section">
                <div class="formbox">
                    <div class="formvalue">

                        <form method="post" action="includes/signup.inc.php">

                                <h2>Signup</h2>

                                <label for="accountType" id="radiolabel">Account Type</label>
                                <div class="radio">
                                    <label for="passenger">Passenger</label>
                                    <input type="radio" id="passenger" name="accountType" value="passenger" checked>
                                    <label for="driver">Driver</label>
                                    <input type="radio" id="driver" name="accountType" value="driver">
                                </div>

                                <div class="inputbox">
                                    <label for="">Username</label>
                                    <input type="text" name="username" >
                                
                                </div>
                                <div class="inputbox">
                                    <label for="">Email</label>
                                    <input type="email" name="email" >
                                </div>
                                <div class="inputbox">
                                    <label for="">Confirm Your email</label>
                                    <input type="email" name="confirmEmail" >
                                </div>
                                <div class="inputbox">
                                    <label for="">Password</label>
                                    <input type="password" name="pwd" >
                                </div>
                                <div class="inputbox">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" >
                                        <option value="male" >Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="inputbox">
    <label for="Phone">Phone number</label>
    <input type="text" name="phone" id="Phone">
</div>


                                <div class="inputbox" id="driverfildes" style="display: none;">
                                        <label for="dol">Date of Obtaining Driving License</label>
                                        <input type="date" name="dol">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob">
                                    
                                </div>

                                <button id="signup" type="submit" >Signup</button>
                                <div class="login">
                                    <p>Already have an account?<a href="">Sign in</a></p>
                                </div>
                                <?php
                            check_signup_errors();
                            
                        ?>
      
                                
                        </form>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('driver').addEventListener('change', function() {
                    var driverFields = document.getElementById('driverfildes');
                    if (this.checked) {
                        driverFields.style.display = 'block';
                    } else {
                        driverFields.style.display = 'none';
                    }
                });
            
                document.getElementById('passenger').addEventListener('change', function() {
                    var driverFields = document.getElementById('driverfildes');
                    if (this.checked) {
                        driverFields.style.display = 'none';
                    }
                });
            </script>  
  <footer class="footer">
  	 <div class="footer-container">
  	 	<div class="row">
        <div class="footer-col">
          <h4>
            contact
          </h4>
          <ul>
            <li>
              <a href="#">Tel:99 99 99 99 99</a>
              <a href="#">Mail:taha.djm087@gmail.com</a>
              <a href="#">Adress:seraidi</a>
            </li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>
            get help
          </h4>
          <ul>
            <li>
              <a href="#">FAQ</a>
              <a href="#">Our partners</a>
              <a href="#">our services</a>
              <a href="#">privacy policy</a>
            </li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>
            Quick links
          </h4>
          <ul>
            <li>
              <a href="#">Regiser</a>
              <a href="#">send a message</a>
              <a href="#">Who are we</a>
            </li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>
          follow us
          </h4>
          <div class="social-links">
            <div class="link">
              <a href="#">
                <img src="instagram.png" alt="Instagram Logo">

              </a>
            </div>
            <div class="link">
              <a href="#">
                <img src="facebook.png" alt="Facebook Logo">

              </a>
            </div>
            <div class="link">
              <a href="#">
                <img src="linkedin.png" alt="linkedin">
              </a>
            </div>
            <div class="link">
              <a href="#">
                <img src="social.png" alt="Whatsapp Icon">
              </a>
            </div>
            <div class="link">
              <a href="#">
                <img src="gmail.png" alt="Mail Icon">
              </a>
            </div>
          </div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
        </div>
    </div>
</body>
</html>
<?php }else{
    header('location:index.php');
}?>