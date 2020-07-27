<?php
// Get the product data
$roomID = filter_input(INPUT_POST, 'roomID', FILTER_VALIDATE_INT);
$roomName = filter_input(INPUT_POST, 'roomName');
$roomImage = filter_input(INPUT_POST, 'roomImage');
$catID = filter_input(INPUT_POST, 'catID');
// Validate inputs
if ($roomID == NULL || $roomID == FALSE || $roomImage== NULL || empty($roomName)) {
    $error = "Invalid image data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('includes/database.php');
    $queryRooms = 'UPDATE rooms
              SET 
                  roomName=:roomName,
                  roomImage=:roomImage,
                  catID = :catID
               WHERE roomID = :roomID';
    $statement = $db->prepare($queryRooms);
    $statement->bindValue(':roomName', $roomName);
    $statement->bindValue(':roomImage', $roomImage);
    $statement->bindValue(':catID', $catID);
    $statement->bindValue(':roomID', $roomID);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('viewRooms.php');
}
?>