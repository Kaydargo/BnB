<?php
// Get the product data
$clientID = filter_input(INPUT_POST, 'clientID', FILTER_VALIDATE_INT);
$roomID = filter_input(INPUT_POST, 'roomID', FILTER_VALIDATE_INT);
$totalPrice = filter_input(INPUT_POST, 'totalPrice', FILTER_VALIDATE_FLOAT);
$checkIn = filter_input(INPUT_POST, 'checkIn');
$checkOut = filter_input(INPUT_POST, 'checkOut');
// Validate inputs
if (empty($totalPrice)|| empty($checkIn) || empty($checkOut)) {
    $error = "Invalid booking data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('includes/database.php');
    $query = 'UPDATE reservationroom
              SET 
                   roomID=:roomID,
                   totalPrice=:totalPrice,
                   checkIn=:checkIn,
                   checkOut=:checkOut
               WHERE clientID = :clientID';
    $statement = $db->prepare($query);
    $statement->bindValue(':clientID', $clientID);
    $statement->bindValue(':roomID', $roomID);
    $statement->bindValue(':totalPrice', $totalPrice);
    $statement->bindValue(':checkIn', $checkIn);
    $statement->bindValue(':checkOut', $checkOut);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('viewBookings.php');
}
