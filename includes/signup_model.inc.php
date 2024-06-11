<?php

declare(strict_types=1);

function get_username(string $username, object $pdo){
    $query = "SELECT Username FROM driver WHERE Username=:Username UNION SELECT Username FROM passenger WHERE Username=:Username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":Username", $username); 
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(string $email, object $pdo){
    $query = "SELECT Email FROM driver WHERE Email=:Email UNION SELECT Email FROM passenger WHERE Email=:Email;"; 
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":Email", $email); 

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function set_passenger_user(object $pdo, string $username, string $email, string $password, string $gender, string $accountType, string $phone) {
    $query = "INSERT INTO passenger (Username, Email, pwd, Gender, AccountType, phone_number) VALUES (:Username, :Email, :Password, :Gender, :AccountType, :Phone)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":Username", $username); 
    $stmt->bindParam(":Email", $email); 
    $stmt->bindParam(":Password", $password); 
    $stmt->bindParam(":Gender", $gender); 
    $stmt->bindParam(":AccountType", $accountType);
    $stmt->bindParam(":Phone", $phone); 

    $stmt->execute();
}

function set_driver_user(object $pdo, string $username, string $email, string $password, string $gender, string $accountType, string $phone, string $DOB, string $DOl) {
    $query = "INSERT INTO driver (Username, Email, pwd, Gender, AccountType, phone_number, DOB, DOl) VALUES (:Username, :Email, :Password, :Gender, :AccountType, :Phone, :DOB, :DOl)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":Username", $username); 
    $stmt->bindParam(":Email", $email); 
    $stmt->bindParam(":Password", $password); 
    $stmt->bindParam(":Gender", $gender); 
    $stmt->bindParam(":AccountType", $accountType);
    $stmt->bindParam(":Phone", $phone); 
    $stmt->bindParam(":DOB", $DOB);
    $stmt->bindParam(":DOl", $DOl); 

    $stmt->execute();
}
