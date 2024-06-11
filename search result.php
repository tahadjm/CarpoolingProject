<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/dbh.inc.php';
?>
<?php
if (isset($_SESSION['user_id'] )) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/search result.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/form-error.css">
    <link rel="stylesheet" href="css/submitbutton.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">



</head>
<body>
    <div class="a">
        <nav>
              <img src="Capture.PNG" class="logo" alt="">
              <ul>
                  <li>
                    <a href="#">Search</a>
                  </li>
                  <li>
                    <a href="#">Driver account</a>
                  </li>
                  <li>
                    <a href="#">passenger account</a>
                  </li>
                  <li>
                    <a href="#">About us</a>
                  </li>
              </ul>
              <div class="user">
                <details>
                  <summary> 
                    <img src="user-interface.png">
                  </summary>
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
          </nav>
        </div>
    <div class="section">
        <div class="result-container">

            <div class="data">
                <div class="h3">
                    <div class="sort">
                    <h4>
                        Sort by:
                    </h4>
                </div>
                <div class="details">
                <form action="" method="post">

                    <div class="row">
                        <label for="lowestprice">lowestprice</label>
                        <input type="radio" id="lowestprice" name="Sort" value="lowestprice" checked>
                    </div>
                    <div class="row">
                        <label for="Fastestroute">Fastest route</label>
                        <input type="radio" id="Fastestroute" name="Sort" value="Fastestroute" >
                    </div>
                    <div class="row">
                        <label for="earlydeparture">Early departure</label>
                        <input type="radio" id="earlydeparture" name="Sort" value="earlydeparture" >
                    </div>
                    <?php if( $_SESSION['search_results'] !=='There is no journey matches with your result')
                    {?>
                    
                    <button type="submit" class="button" >
                        Apply
                    </button>  
                    <?php } ?>   

                </form>
                </div>
            </div>
            <div class="space"></div>

            <div class="data">
                <div class="h4">
                    <h4>
                        Filters:
                    </h4>
                </div>
                <div class="details">
                    <div class="row">                    
                        <label for="passenger">No smoking</label>
                        <input type="checkbox" id="nosmoking" name="filters" value="nosmoking" checked ></div>
                    <div class="row">                    
                        <label for="passenger">No drinking</label>
                        <input type="checkbox" id="dnodrinking" name="filters" value="dnodrinking" checked></div>
                    <div class="row">
                        <label for="passenger">No eating</label>
                        <input type="checkbox" id="noeating" name="filters" value="noeating"checked >
                    </div>
                </div>
            </div>

                    </div>

        </div>
        <div class="searchresult">
        <?php

                if (isset($_SESSION['search_results']) && !empty($_SESSION['search_results'])) {
                    if (isset($_POST['Sort'])) {
                        $sort_criteria = $_POST['Sort'];
                        if ($sort_criteria === 'lowestprice') {
                            usort($_SESSION['search_results'], function ($a, $b) {
                                return $a['Price'] - $b['Price'];
                            });
                        } elseif ($sort_criteria === 'fastestroute') { 
                            usort($_SESSION['search_results'], function ($a, $b) {
                                return strtotime($a['Deptime']) - strtotime($b['Deptime']);
                            });
                        } elseif ($sort_criteria === 'earlydeparture') {
                            usort($_SESSION['search_results'], function ($a, $b) {
                                return strtotime($a['Deptime']) - strtotime($b['Deptime']);
                            });
                        }
                    }
                    if( $_SESSION['search_results'] =='There is no journey matches with your result')
                    {?>
                    <div class="form-error">
                        <?php
                        echo $_SESSION['search_results'];
                        ?>
                    </div>
                    <?php
                        die();
                    }
                    foreach ($_SESSION['search_results'] as $key => $journey) {
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
                        <?php echo $journey['username'] ;  ?>
                    </div>
                    <div class="journey-det">
                        <form action="includes/journey_details.inc.php?journeyID=$journey['journeyID']" method="get">
                        <input type="hidden" name="journeyID" value="<?php echo $journey['journeyID']; ?>">
                        <?php 
                        $journeyID=$journey['journeyID'];
                        $passengerID=$_SESSION['user_id'];
                        $sqlCheck = "SELECT * FROM journeyrequests WHERE TripID = ? AND PassengerID = ?";
                        $stmtCheck = $pdo->prepare($sqlCheck);
                        $stmtCheck->execute([$journeyID, $passengerID]);
                        
                        if ($stmtCheck->rowCount() > 0) {?>
                            <button id="alredysubmitted">
                                You have already requested this journey.
                            </button>

                        <?php } 
                            else {?>
                        <button type="submit" id="submit">
                            Go to journey details.
                        </button>
                            <?php } ?>

                        </form>

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
</body>

</html>

<?php }else {
    header("Location: index.php");
    exit();
}
?>

