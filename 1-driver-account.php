<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/output.inc.php';
require_once 'includes/dbh.inc.php';
?>

<?php
if ($_SESSION['account_type'] == 'driver' && isset($_SESSION['user_id'] )) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/1-driver account .css">
    <link rel="stylesheet" href="css/1-driver account .css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Noto+Serif+Khojki:wght@400..700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

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
                                                    <a href="1-home page.php" target="_self">
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
                <div class="myprofile">
                    <h2 id="h2">My Profile</h2>
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
                            echo experience();
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
                            echo output_phone();
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

                <div class="myjourneys">
                    <h2 id="h2">My journeys</h2>
                    <div class="journey">
                        <div class="create-button">
                            <button id="new-journey" onclick="">New journey</button>
                        </div>
                        <?php
                            $driverID=$_SESSION['user_id'];
                            $sqlCheck = "SELECT DISTINCT journeyID FROM journey WHERE DriverID = ?";
                            $stmtCheck = $pdo->prepare($sqlCheck);
                            $stmtCheck->execute([$driverID]);
                            $tripIDs = $stmtCheck->fetchAll(PDO::FETCH_COLUMN);
                            foreach ($tripIDs as $tripID) {
                                $sqlCheckJourney = "SELECT * FROM journeyrequests WHERE TripID = ?";
                                $stmtCheckJourney = $pdo->prepare($sqlCheckJourney);
                                $stmtCheckJourney->execute([$tripID]);
                                $my_journeys = $stmtCheckJourney->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($my_journeys as $my_journey)
                                {
                                    $journeyID = $my_journey['TripID'];
                                    $sqlCheckJourney2 = "SELECT * FROM journey WHERE journeyID = ?";
                                    $stmtCheckJourney2 = $pdo->prepare($sqlCheckJourney2);
                                    $stmtCheckJourney2->execute([$journeyID]);
                                    $my_journeys2 = $stmtCheckJourney2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($my_journeys2 as $my_journey2)
                                    {
                                        ?>
                                        <div class="history">
                                            <div class="history date" id="date">
                                                <?php echo $my_journey2['date']; ?>
                                            </div>
                                            <div class="history timetaken" id="timetaken">
                                                <?php 
                                                $deptTime = new DateTime($my_journey2['Deptime']);
                                                $destTime = new DateTime($my_journey2['Destime']);
                                                $timeDiff = $deptTime->diff($destTime);
                                                echo $timeDiff->format('%H:%I:%S');
                                                ?>
                                            </div>
                                            <div class="history dep-dis" id="dep-dis">
                                                <?php echo $my_journey2['Deplocation']." / ".$my_journey2['Deslocation'];?>
                                            </div>
                                            <?php if( $my_journey ['Status'] == 'Pending') {?>
                                            <div class="history button" id="button">
                                                <form action="1-journey management.php" method="get">
                                                    <input type="hidden" name="journey_id" value="<?php echo $my_journey2['journeyID']; ?>">
                                                    <input type="hidden" name="passenger_id" value="<?php echo $my_journey['PassengerID']; ?>">
                                                    <button type="submit">manage</button>
                                                </form>
                                            </div>
                                            <?php }else { ?>
                                                <div class="history button" id="button">
                                                <button>
                                                <?php echo $my_journey['Status'] ?>
                                                </button>


                                            </div>
                                            <?php }?>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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
</html>

<?php } else {
    header("Location: 1-home page.php");
    exit();
} ?>
