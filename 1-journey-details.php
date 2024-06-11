<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/dbh.inc.php';

require_once 'includes/output.inc.php';

?>
<?php

if ($_SESSION['account_type'] == 'passenger' && isset($_SESSION['user_id'] )) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/1-journey-details.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
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
        <div class="container">
            <div class="myjourneys">
                <h1 id="h2">
                    <span class="Ride-a-plan-h2"> 
                        Ride a plan
                    </span>
                </h1>
            </div>
            <?php
            foreach ($_SESSION['journey_res_details'] as $key => $journey) {
                ?>
            <div class="card">
                <h2 class="date-h2">
                <span class="date"><?php echo date("D, d M", strtotime($journey['date'])); ?></span></h2>
                <ul>
                    <li class="depart">
                        <div class="guTWpB">
                        <?php echo $journey['Deptime']?>
                        </div>
                        <div class="range">
                            <div class="range-class"></div>
                            <div class="range-cyrcle">
                            <div class="range-cyrcle-co"></div>
                            </div>
                            <div class="range-row"></div>
                                <div class="dep-data">
                                    <span class="des-city"><?php echo $journey['Deplocation']; ?></span>
                                    <span class="des-address"><?php echo $journey['Deplocation']; ?></span>
                                </div>
    
                        </div>
                    </li>                
                    <li class="des">
                        <div class="guTWpB">
                        <?php echo $journey['Destime']?>
                        </div>
                        <div class="under-range">
                            <div class="under-range-class"></div>
                            <div class="under-range-cyrcle">
                            <div class="under-range-cyrcle-co"></div>
                            </div>
                            <div class="under-range-row"></div>
                            <div class="des-data">
                                <span class="des-city"><?php echo $journey['Deslocation']; ?></span>
                                <span class="des-address"><?php echo $journey['Deslocation']; ?></span>
                            </div>
                        </div>
                    </li>
                    <div class="price">
                    <?php echo $journey['Price']; ?> DA
                    </div>
                    <div class="no-smoking">
                        <img src="no-smoking.png" alt="">
                        <img src="no-food.png" alt="">
                        <img src="no-ice-cream.png" alt="">
                    </div>
                    <div class="driver-name">
                    <?php
                    $id = $journey['DriverID']; 
                    $sql = "SELECT * FROM driver WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
                    $stmt->execute();
                    $driver = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    echo '<div class="driver-username">' . $driver['Username'] . '</div>';

                ?>
                <div>
                    <p>
                        
                    </p>
                </div>
                    </div>
                </ul>
            </div>
            <?php
                    } 
                } else {
                    echo "<p>No search results found.</p>";
                }
                ?>
    </div>
    </div>
    <div class="option">
            <div class="journey">
                <div class="row">
                    <div class="box evaluation">
                        <label for="evaluation">Evaluation</label>
                    </div>
                    <div class="data text evaluation">
                        5
                    </div>
                </div>
                <div class="row">
                    <div class="box experience">
                        <label for="experience" >experience</label>                      
                    </div>
                    <div class="data experience">
                    <?php
                        $licenseDateTime = new DateTime ($driver['dob']);  
                        $currentDate = new DateTime();
                        $experience = $currentDate->diff($licenseDateTime)->y;
                    

                            echo $experience. ' YEARS';

                    ?>                    
                            </div>
                </div>
                <div class="row">
                    <div class="box Driving-category">
                        <label for="">Driving category</label>
                    </div>
                    <div class="data driving-category">
                        used to

                    </div>
                </div>
                <div class="row">
                    <div class="box annulation-delay">
                        <label for="" >annulation / delay</label>
                    </div>
                    <div class="data annulation-delay">
                        2/10
                    </div>
                </div>
                <div class="row">
                    <div class="box Contact">
                        <label for="">Contact</label>
                    </div>
                    <div class="data contact">
                    <?php
                            echo $driver['phone_number'];
                            ;
                            ?>
                    </div>
                </div>
                <div class="row">
                    <div class="box Certified">
                        <label for="">certified</label>
                    </div>
                    <div class="data Certified">Yes</div>
                </div>
            </div>
            <div class="buttons"> echo
                <form action="includes\reservation.inc.php?$journeyID=$_SESSION['journey_res_details'][0]['journeyID']" method="get" >
                <input type="hidden" name="journeyID" value="<?php echo $journey['journeyID']; ?>">
                <div class="button" >
                        <button type="submit">reservation-request</button>
                    </div>
                </form>

                <div class="space">
                    <div class="space-space">
    
                    </div>
                </div>
                <div class="return">
                    <div class="button">
                        <button onclick="redirect()">Return</button>
                    </div>
                </div>
            </div>
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Rotate Options</title>
            <link rel="stylesheet" href="css/styles.css">
            </head>
            <body>
            <div class="driver-options">
                <div class="option">
                    <img src="nonono.PNG" alt="">
                </div>
            </div>
            </body>
            </html>
            
            
            
        </div>
    </div>
</div>
            
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
<script>
    function redirect() {
        // Redirect to the homepage URL
        window.location.href = "search result.php";
    }
</script>
</html>


 
