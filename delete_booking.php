<?php
// Delete a booking based on the ID passed in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dental_booking";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the booking
    $sql = "DELETE FROM bookings WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Booking deleted successfully";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }

    // Close the connection
    $conn->close();

    // Redirect back to the DB view page
    header("Location: view_db.php");
    exit();
}
?>
