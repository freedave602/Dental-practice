<?php
// Establish database connection with correct credentials
$conn = new mysqli("localhost", "root", "", "dental_booking");  // Use "root" for username and "" for the password

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the booking records
$sql = "SELECT id, name, email, phone, date FROM bookings";
$result = $conn->query($sql);

// Initialize an empty array to store the data
$data = array();

if ($result->num_rows > 0) {
    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Convert the data array to JSON and echo it
echo json_encode($data);

// Close the connection
$conn->close();
?>
