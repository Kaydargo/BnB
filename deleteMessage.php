<?php
require_once('includes/database.php');

// Get IDs
$messageID = filter_input(INPUT_POST, 'messageID', FILTER_VALIDATE_INT);

// Delete the product from the database

    $deleteMsg = "DELETE FROM message WHERE messageID = :messageID";
    $statement = $db->prepare($deleteMsg);
    $statement->bindValue(':messageID', $messageID);
    $statement->execute();
    $statement->closeCursor();


// display the gallery images page
include('viewMessages.php');
?>
