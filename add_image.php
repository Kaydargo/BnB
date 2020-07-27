<?php
// Get the product data
$imageID = filter_input(INPUT_POST, 'imageID', FILTER_VALIDATE_INT);
$image = filter_input(INPUT_POST, 'image');
$imageDescr = filter_input(INPUT_POST, 'imageDescr');
$title = filter_input(INPUT_POST, 'title');
$roomID = filter_input(INPUT_POST, 'roomID', FILTER_VALIDATE_INT);
if ($roomID == "")
{
    $roomID = NULL;
}

// Validate inputs
if ($image== NULL || empty($title)) {
    $error = "Invalid image data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('includes/database.php');
    $query = "INSERT INTO image
                 (imageID, image, imageDescr, title, roomID)
              VALUES
                 (:imageID, :image, :imageDescr, :title, :roomID)";
   $statement = $db->prepare($query);
    $statement->bindValue(':imageID', $imageID);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':imageDescr', $imageDescr);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':roomID', $roomID);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('viewGallery.php');
}
?>