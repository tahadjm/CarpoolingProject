<?php

declare(strict_types=1);
require_once 'config_session.inc.php';

function check_signup_errors(){
    if(isset($_SESSION['errors_signup'])){
        
        $errors = $_SESSION['errors_signup'];
        foreach($errors as $error){
            echo '<div class="form-error"><p>' . $error . '</p></div>';

        }

        unset($_SESSION['errors_signup']);
    }else if(isset($_GET["signup"]) && $_GET["signup"] == "success"){
        echo "<br>";
        echo '<p class="form-success">Signup success</p>';
    };
}