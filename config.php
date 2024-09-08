<?php
// Database connection settings
$host = 'localhost';
$username = 'u362815274_root';
$password = 'Yash@281307';
$db = 'u362815274_my';

// Create connection
$conn = mysqli_connect($host, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are set
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])) {
        // Sanitize form data
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Insert data into database
        $sql = "INSERT INTO messages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

        if (mysqli_query($conn, $sql)) {
            // echo "Data inserted successfully";
            include 'thanks.php';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<p>All fields are required!</p>";
    }
} else {
    echo "<p>Form submission method not allowed!</p>";
}

// Close connection
mysqli_close($conn);
?>
