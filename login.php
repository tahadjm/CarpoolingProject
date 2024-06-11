<?php
// Include the database connection file
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement to check user credentials
    $sql = "SELECT * FROM users WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, login successful
            echo "Login successful";
            // Redirect to the user's dashboard or home page
            // header("Location: dashboard.php");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid email or password";
        }
    } else {
        // User not found
        echo "User not found";
    }

    // Close database connection
    $conn->close();
}
?>
