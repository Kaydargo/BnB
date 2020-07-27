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
if ( $image== NULL || empty($title)) {
    $error = "Invalid image data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('includes/database.php');
    $query = 'UPDATE image
              SET 
              
                  image=:image,
                  imageDescr=:imageDescr,
                  title = :title,
                  roomID= :roomID
               WHERE imageID = :imageID';
    $statement = $db->prepare($query);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':imageDescr', $imageDescr);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':roomID', $roomID);
    $statement->bindValue(':imageID', $imageID);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('viewGallery.php');
}
?>