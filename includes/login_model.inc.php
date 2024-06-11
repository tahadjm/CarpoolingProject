<?php

declare(strict_types=1);

function get_driver_email(string $email, object $pdo){
    $query = "SELECT * FROM driver WHERE Email = :Email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":Email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_passenger_email(string $email, object $pdo){
    $query = "SELECT * FROM passenger WHERE Email = :Email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":Email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
?>
