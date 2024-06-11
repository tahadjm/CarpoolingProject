<?php
declare(strict_types=1);
require_once 'config_session.inc.php';

function output_username(){
    if(isset($_SESSION['user_id']))
    {
        echo $_SESSION['user_username'];
    }
    else{
        echo "you are not logged in  ";
    }
}
function output_phone()
{
    if(isset($_SESSION['user_id']))
    {
        echo $_SESSION['phone'];
    }
    else{
        echo "you are not logged in  ";
    }
}
function output_email(){
    if(isset($_SESSION['user_id']))
    {      
        echo $_SESSION['email'];
    }
    else{
        echo "you are not logged in  ";
    }
}
function experience(){
    $licenseDateTime = new DateTime($_SESSION['dob']);  
    $currentDate = new DateTime();
    $experience = $currentDate->diff($licenseDateTime)->y;

    if(isset($_SESSION['user_id']))
    {
        echo $experience. 'Years';
    }
    else{
        echo "you are not logged in  ";
    }
}