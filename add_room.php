<?php
// Get the product data
$roomID = filter_input(INPUT_POST, 'roomID', FILTER_VALIDATE_INT);
$roomName = filter_input(INPUT_POST, 'roomName');
$roomImage = filter_input(INPUT_POST, 'roomImage');
$catID = filter_input(INPUT_POST, 'catID');
// Validate inputs
if ( $roomImage== NULL || empty($roomName)) {
    $error = "Invalid room data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('includes/database.php');
    $queryRooms = 'INSERT INTO rooms
               (roomID, roomName, roomImage, catID)
              VALUES
                 (:roomID, :roomName, :roomImage, :catID)';
    $statement = $db->prepare($queryRooms);
    $statement->bindValue(':roomID', $roomID);
    $statement->bindValue(':roomName', $roomName);
    $statement->bindValue(':roomImage', $roomImage);
    $statement->bindValue(':catID', $catID);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('viewRooms.php');
}
?>