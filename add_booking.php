<?php
// Get the product data


$clientID = filter_input(INPUT_POST, 'clientID', FILTER_VALIDATE_INT);
$roomID = filter_input(INPUT_POST, 'roomID', FILTER_VALIDATE_INT);
$totalPrice = filter_input(INPUT_POST, 'totalPrice', FILTER_VALIDATE_FLOAT);
$checkIn = filter_input(INPUT_POST, 'checkIn');
$checkOut = filter_input(INPUT_POST, 'checkOut');

$date1 = explode("/",$checkIn);
$date2 = explode("/",$checkOut); 

$dateIn = $date1[2].'-'.$date1[0].'-'.$date1[1];
$dateOut = $date2[2].'-'.$date2[0].'-'.$date2[1];

    require_once('includes/database.php');

    
    $queryBooking= ' INSERT INTO  reservationroom
                (clientID, roomID, totalPrice, checkIn, checkOut)
              VALUES
                 (:clientID, :roomID, :totalPrice, :checkIn, :checkOut)';
    $statement = $db->prepare($queryBooking);
    $statement->bindValue(':clientID', $clientID);
    $statement->bindValue(':roomID', $roomID);
    $statement->bindValue(':totalPrice', $totalPrice);
    $statement->bindValue(':checkIn', $checkIn);
    $statement->bindValue(':checkOut', $checkOut);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('viewBookings.php');
