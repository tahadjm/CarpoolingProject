<?php

declare(strict_types=1);

function is_email_wrong(bool|array $result){
    if($result == false){
        return true;
    }
    else{
        return false;
    }
}

function is_pwd_wrong(string $user_password, string $hashed_password): bool {

     if($user_password==$hashed_password){
        return true;
     }
     else{
        return false;
     }
}
function is_input_empty($email, $pwd){
    if(empty($email) || empty($pwd)){
        return true;
    }
    else{
        return false;
    }
}

