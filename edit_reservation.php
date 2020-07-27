<?php
// Get the reservation data
$clientID = filter_input(INPUT_POST, 'clientID', FILTER_VALIDATE_INT);
$firstName=filter_input(INPUT_POST,'firstName');
$lastName=filter_input(INPUT_POST,'lastName');
$email=filter_input(INPUT_POST,'email');
$location=filter_input(INPUT_POST,'location');
$phone=filter_input(INPUT_POST,'phone');

// Validate inputs
if ( $email== NULL || $firstName== NULL || $lastName== NULL || empty($email)) {
    $error = "Invalid reservation data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('includes/database.php');
    $query = 'UPDATE client
              SET 
                   firstName=:firstName,
                   lastName=:lastName,
                   email=:email,
                   location=:location,
                   phone=:phone
               WHERE clientID = :clientID';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':clientID', $clientID);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('viewReservation.php');
}
?>