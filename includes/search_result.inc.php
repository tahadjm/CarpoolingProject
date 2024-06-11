<?php

declare(strict_types=1);

function search_result(PDO $pdo, string $depart, string $destination, string $time, string $places): array {
    // Check if any of the parameters are empty


    $sql = "SELECT date, Deplocation, Deslocation, places FROM journey WHERE Deplocation = :depart AND Deslocation = :destination AND date = :time AND places = :places";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':depart', $depart, PDO::PARAM_STR);
    $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
    $stmt->bindParam(':time', $time, PDO::PARAM_STR);
    $stmt->bindParam(':places', $places, PDO::PARAM_STR);

    $stmt->execute();

    $searchResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $searchResult;
}
?>
