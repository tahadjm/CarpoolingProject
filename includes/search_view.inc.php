<?php

declare(strict_types=1);
require_once 'config_session.inc.php';


function search_error(){

    if(isset($_SESSION['search_error'])){

            echo' <div class="form-error">'  . $_SESSION['search_error'] .'</div>';
        unset($_SESSION['search_error']);
    };
}
