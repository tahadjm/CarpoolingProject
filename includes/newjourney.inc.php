<?php
require_once 'config_session.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if "price" field is set in the POST request

    $errors = array();
    $places = $_POST["places"];
    $date = $_POST["date"];
    $destination = $_POST["destination"];
    $departure = $_POST["departure"];
    $destination_time = $_POST["destination_time"];
    $depart_time = $_POST["depart_time"];
    $stop1 = $_POST["stop1"];
    $stop2 = $_POST["stop2"];
    $price = $_POST["price"];
    $username= $_SESSION['user_username'];
    
    

    // Assuming you retrieve driver ID from the session or elsewhere
    $driverID = $_SESSION['user_id']; // Adjust this according to your actual session variable
    
    try {
        require_once 'dbh.inc.php';

        // Format time values


        // Prepare the SQL statement
        $query = "INSERT INTO journey (Deplocation, Deptime, Deslocation, Destime, DriverID, Price,date, stop1, stop2,username)
                  VALUES (:departure, :departure_time, :destination, :destination_time, :driverID, :price, :date,:stop1, :stop2,:username)";
        $statement = $pdo->prepare($query);

        // Bind parameters
        $statement->bindParam(':departure', $departure);
        $statement->bindParam(':departure_time', $departure_time);
        $statement->bindParam(':destination', $destination);
        $statement->bindParam(':destination_time', $destination_time);
        $statement->bindParam(':driverID', $driverID);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':date', $date);

        $statement->bindParam(':stop1', $stop1);
        $statement->bindParam(':stop2', $stop2);
        $statement->bindParam(':username', $username);


        // Execute the query
        $statement->execute();

        // Redirect after successful insertion
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
