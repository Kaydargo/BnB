<?php
require_once('includes/database.php');

// Get IDs
$roomID = filter_input(INPUT_POST, 'roomID', FILTER_VALIDATE_INT);

// Delete the product from the database

    $deleteRoom = "DELETE FROM rooms WHERE roomID = :roomID";
    $statement = $db->prepare($deleteRoom);
    $statement->bindValue(':roomID', $roomID);
    $statement->execute();
    $statement->closeCursor();


// display the gallery images page
include('viewRooms.php');
?>
