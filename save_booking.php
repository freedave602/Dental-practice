<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root"; // Your DB username
$password = ""; // Your DB password
$dbname = "dental_booking"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data from POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $service = $_POST['service'];

    // Debugging: Display the received POST data
    echo "<pre>";
    print_r($_POST); // This shows the received form data
    echo "</pre>";

    // Prepare the SQL query to insert the data into the database
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, date, service) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $date, $service);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // Redirect to the confirmation page after a successful submission
        header("Location: confirmation.html");
        exit();
    } else {
        // If an error occurred, display the error message
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form wasn't submitted via POST, show an error
    echo "Error: Form submission failed.";
}
?>
