<?php
require_once('includes/database.php');

// Get IDs
$clientID = filter_input(INPUT_POST, 'clientID', FILTER_VALIDATE_INT);

// Delete the product from the database

    $deleteReservation = "DELETE FROM client WHERE clientID = :clientID";
    $statement = $db->prepare($deleteReservation);
    $statement->bindValue(':clientID', $clientID);
    $statement->execute();
    $statement->closeCursor();


// display the gallery images page
include('viewReservation.php');
?>
