<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/output.inc.php';
require_once 'includes/dbh.inc.php';

if ($_SESSION['account_type'] == 'driver' && isset($_SESSION['user_id'])) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journey Management</title>
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/1-journey management.css">
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
        <div class="myjourneys">
            <?php
            $journeyID = $_GET['journey_id'];
            $passenger_id = $_GET['passenger_id'];
            $status = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['accept'])) {
                    $status = 'Accepted';
                    header('Location:1-driver-account.php');
                } elseif (isset($_POST['refuse'])) {
                    $status = 'Declined';
                    header('Location:1-driver-account.php');

                }
                
                $sql = "UPDATE journeyrequests SET Status = ? WHERE TripID = ? AND PassengerID = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$status, $journeyID, $passenger_id]);
            }
            
            $sql = "SELECT * FROM journeyrequests WHERE TripID = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$journeyID]);
            $my_journeys2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($my_journeys2 as $j) {
                $PassengerID = $j['PassengerID'];
                $sql2 = "SELECT * FROM passenger WHERE ID = ?";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute([$PassengerID]);
                $pass = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($pass as $p) { ?>
                    <h3>Journey : 20/02/24 Annaba/Detif</h3>
                    <div class="journey">
                        <div class="journey-details">
                            <div class="journey-details-data date" id="date"><?php echo $p['Username'] ?></div>
                            <div class="journey-details-data timetaken" id="timetaken"><?php echo $p['Gender'] ?></div>
                            <div class="journey-details-data dep-dis" id="dep-dis">
                                <?php 
                                $dob = new DateTime($p['dob']);
                                $today = new DateTime('today');
                                $age = $dob->diff($today)->y; 
                                echo $age;  
                                ?>
                            </div>
                            <div class="journey-details-data status"><?php echo $p['pob'] ?></div>
                        <form method="post">
                            <!-- Add hidden input fields for accept and refuse values -->
                            <input type="hidden" name="accept" value="accept">
                            <input type="hidden" name="refuse" value="refuse">
                            <div class="choise-button">
                                <div class="ok-choise-button">
                                    <button type="submit" name="accept">OK</button>
                                </div>
                                <div class="no-choise-button">
                                    <button type="submit" name="refuse">NO</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
            <?php }
            } ?>
            <h2 id="h2">Manage a journey</h2>
        </div>
    </div>

    <footer>
        <h2>Contact Us</h2>
        <div class="footer-links">
            <div><a href="#"><img src="instagram.png" alt="Instagram Logo">Carpool.Dz</a></div>
            <div><a href="#"><img src="facebook.png" alt="Facebook Logo">Carpool Dz</a></div>
            <div><a href="#"><img src="linkedin.png" alt="linkedin">Carpool-Dz</a></div>
            <div><a href="#"><img src="social.png" alt="Whatsapp Icon">Carpool.Dz</a></div>
            <div><a href="#"><img src="gmail.png" alt="Mail Icon">Carpool.dz@gmail.com</a></div>
        </div>
    </footer>
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
    header("Location: index.php");
    exit();
}
?>
