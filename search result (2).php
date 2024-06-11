<?php
require_once 'includes/config_session.inc.php';
?>
<?php
if (isset($_SESSION['user_id'] )) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="search result.css">
    <link rel="stylesheet" href="1-journey-details.css">
    <link rel="stylesheet" href="card.css">
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
        <nav>  
                <div class="user">
                    <details>
                          <summary> <img src="user-interface.png"></summary>
                          <div class="list">
                              <div class="list-1"><ul><li></li>
                              <li>
                                  <a href="1-driver-account.php" target="_blank">
                                    Account 
                                    <img src="icons8-linking-100.png" alt="Link" >
                                </a>
                              </li>
                              <li>
                                  <a href="1-journey management.php" target="_blank">
                                    Journey management
                                    <img src="icons8-linking-100.png" alt="">
                                </a>
                              </li>
                              <li>
                                  <a href="1-New journey page.php" target="_blank">
                                    New Journey
                                    <img src="icons8-linking-100.png" alt="">
                                </a>
                              </li>
                              <li>
                                <a href="1-sign-in.php">
                                Login
                                <img src="login.png" alt="">
                                </a>
                                </li>
                                <li>
                                <a href="1-register page.php">
                                Sign up
                                <img src="login.png" alt="">
                                </a>
                                </li>
                                <li>
                                    <form method="post" action="includes/logout.inc.php" style="display: flex;  justify-content: space-between;text-align: center;" >
                                <button type="submit"  style="text-decoration: none;display: flex;align-items: center;width: 100%;margin: 10px;color: var(--clr-text);white-space: nowrap; text-overflow: ellipsis; background-color: transparent;border-radius: 0;border: none;cursor:grab;font-family: Arial, sans-serif;font-family: 'Poppins', sans-serif; /* Example font family */font-size: 18px; /* Example font size */">
                                            Logout
                                        </button>
                                        <img src="login.png" width="30px" height="30px" alt="logout">

                                    </form>
                                </li>

                          </div>
                    </details>           
            </nav>
            </details>   
        </div>
    </nav>

    <div class="section">
        <div class="container">
            <div class="data">
                <div class="h3">
                    <h4>
                        Sort by:
                    </h4>
                </div>
                <div class="details">
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
                   
                </div>
            </div>
            <div class="space"></div>
            <?php echo var_dump($_SESSION['search_results']);?>
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
                    <button type="submit" class="button" >Search</button>     

                </div>
            </div>
        </div>
        <div class="searchresult">
            <div class="card">
                <h2 class="date-h2">
                    <span class="date">Thu,21 March</span>
                </h2>
                <ul>
                    <li class="depart">
                        <div class="guTWpB">
                        </div>
                        <div class="range">
                            <div class="range-class"></div>
                            <div class="range-cyrcle">
                            <div class="range-cyrcle-co"></div>
                            </div>
                            <div class="range-row"></div>
                                <div class="dep-data">
                                    <span class="des-city">London</span>
                                    <span class="des-address">Ukrania,Catholic,Cathedral</span>
                                </div>
    
                        </div>
                    </li>                
                    <li class="des">
                        <div class="guTWpB">
                            14:00
                        </div>
                        <div class="under-range">
                            <div class="under-range-class"></div>
                            <div class="under-range-cyrcle">
                            <div class="under-range-cyrcle-co"></div>
                            </div>
                            <div class="under-range-row"></div>
                            <div class="des-data">
                                <span class="des-city">Warsaw</span>
                                <span class="des-address">Wroclaw,Nicolaus Copernicus Airport</span>
                            </div>
                        </div>
                    </li>
                    <div class="price">
                        180 DA
                    </div>
                    <div class="no-smoking">
                        <img src="no-smoking.png" alt="">
                        <img src="no-food.png" alt="">
                        <img src="no-ice-cream.png" alt="">
                    </div>
    
                </ul>
            </div>
            </div>
    </div>
            

    </div>
    <footer>
      <h2>Contact Us</h2>
      <div class="footer-links">
          <div>
              <a href="#">
                  <img src="instagram.png" alt="Instagram Logo">
                  Carpool.Dz
              </a>
          </div>
          <div>
              <a href="#">
                  <img src="facebook.png" alt="Facebook Logo">
                  Carpool Dz
              </a>
          </div>
          <div>
              <a href="#">
                  <img src="linkedin.png" alt="linkedin">
                  Carpool-Dz
              </a>
          </div>
          <div>
              <a href="#">
                  <img src="social.png" alt="Whatsapp Icon">
                  Carpool.Dz
              </a>
          </div>
          <div>
              <a href="#">
                  <img src="gmail.png" alt="Mail Icon">
                  Carpool.dz@gmail.com
              </a>
          </div>
      </div>
  </footer>
</body>

</html>

<?php }else {
    header("Location: 1-home page.php");
    exit();
}
?>

