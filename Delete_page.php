<?php
// Include database connection
include 'dbconn.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete statement
    $sql = "DELETE FROM students WHERE id = $id";

    // Execute the query
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}

// Close the connection
$connection->close();
?>
