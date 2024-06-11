<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="haha.css">
    <link rel="stylesheet" href="stylee.css">
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

                    </details>           
            </nav>
            <div class="s">
              <div class="photo">
                  <button id="scroll-left">Scroll right</button>
                  <div class="image">
                      <img src="Dacia-Sandero-Algeria-2019.webp" alt="Image 1">
                      <img src="Golf8r.jpg" alt="Image 2">
                      <img src="audirs7.webp" alt="Image 3">
                      <img src="12 (4).jpg" alt="Image 4">
                      <img src="12 (5).jpg" alt="Image 5">
                  </div>
                  <button id="scroll-right">Scroll left</button>
              </div>
              <div class="Search">
              <form method="post" action="includes/search.inc.php">
                      <input type="text" placeholder="from" name="depart">
                      <input type="text" placeholder="to" name="destination">
                      <input type="date" placeholder="20/20/2020" name="time">
                      <input type="number" placeholder="1" name="places">
                      <button type="submit" class="button" >Search</button>     

                  </form>
              </div>

          </div>  
          </div>
        </div>
        </div>
    </div>
    <h1 id="pick">
    <?php echo $_SESSION['user_username']; ?>
    </h1>
    <div class="rating">
        <ul>
            <li><img src="user-interface.png" alt=""> i was looking for ia service capable of offering trips!</li>
            <li><img src="facebook.png" alt=""> i was looking for ia service capable of offering trips from serval companies!</li>
            <li><img src="user-interface.png" alt=""> i was looking for ia service capable of offering trips!</li>
            <li><img src="facebook.png" alt=""> i was looking for ia service capable of offering trips from serval companies!</li>
        </ul>
    </div>
    <div class="content">
        
        <h1>Go evrywhere with us!</h1>
        <p>Transporta1on represents symbols of civiliza1on and modernity. However, their increasing use leads to
            ecological and economic problems. In order to minimize these effects and simplify the lives of ci1zens,
            the concept of carpooling has emerged. Carpooling involves sharing a vehicle by mul1ple individuals
            making the same journey simultaneously, even if they do not know each other. The realiza1on of this
            idea requires a communica1on system among the involved par1es, oEen in the form of a website or
            mobile applica1on.</p>
    </div>
  </body>
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



<script>
  var imageContainer = document.querySelector('.image');

  // Define the scroll speed (adjust as needed)
  var scrollSpeed = 2; // pixels per frame

  // Continuous scrolling function
  function continuousScroll() {
      imageContainer.scrollLeft += scrollSpeed;
      if (imageContainer.scrollLeft >= (imageContainer.scrollWidth - imageContainer.clientWidth)) {
          imageContainer.scrollLeft = 0;
      }
  }

  // Start continuous scrolling
  var scrollInterval = setInterval(continuousScroll, 50); // Adjust scroll speed (interval) as needed

  // Pause continuous scrolling on hover
  imageContainer.addEventListener('mouseenter', function() {
      clearInterval(scrollInterval);
  });

  // Resume continuous scrolling on mouse leave
  imageContainer.addEventListener('mouseleave', function() {
      scrollInterval = setInterval(continuousScroll, 50); // Adjust scroll speed (interval) as needed
  });

  // Scroll left on button click
  document.getElementById('scroll-left').addEventListener('click', function() {
      imageContainer.scrollBy({
          left: 100, // Adjust scroll distance as needed
          behavior: 'smooth'
      });
  });

  // Scroll right on button click
  document.getElementById('scroll-right').addEventListener('click', function() {
      imageContainer.scrollBy({
          left: -100, // Adjust scroll distance as needed
          behavior: 'smooth'
      });
  });
</script>
</html>