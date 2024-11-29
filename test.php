<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "POST request received successfully!";
    print_r($_POST); // Display received data
} else {
    echo "Please use a POST request.";
}
?>
