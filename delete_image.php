<?php
require_once('includes/database.php');

// Get IDs
$imageID = filter_input(INPUT_POST, 'imageID', FILTER_VALIDATE_INT);

// Delete the product from the database

    $deleteImage = "DELETE FROM image WHERE imageID = :imageID";
    $statement = $db->prepare($deleteImage);
    $statement->bindValue(':imageID', $imageID);
    $statement->execute();
    $statement->closeCursor();


// display the gallery images page
include('viewGallery.php');
?>
