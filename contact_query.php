<?php
    include ('includes/database.php');
       
$messageID = filter_input(INPUT_POST, 'messageID'); 
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$message = filter_input(INPUT_POST, 'message');

// Validate inputs
if ( $firstName == null || $lastName == null || $email == null || $phone == null || $message == null) {
    $error = "Invalid contact data. Check all fields and try again.";
    include('error.php');
} 

else {
    require_once('includes/database.php');

    // Add the product to the database 
    $query = "INSERT INTO message ( messageID, firstName, lastName,  email, phone , message)
    VALUES (:messageID, :firstName, :lastName, :email, :phone, :message )";
    $statement = $db->prepare($query);
    $statement->bindValue(':messageID', $messageID);
    $statement->bindValue(':firstName', $firstName);
     $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':message', $message);
    $statement->execute();
    $statement->closeCursor();
    
    header("Location:thank_you_contact.php");
}
?>