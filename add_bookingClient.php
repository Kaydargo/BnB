<?php
    require_once('includes/database.php');
    $clientID = filter_input(INPUT_POST, 'clientID', FILTER_VALIDATE_INT);
$roomID = filter_input(INPUT_POST, 'roomID', FILTER_VALIDATE_INT);
$totalPrice = filter_input(INPUT_POST, 'totalPrice', FILTER_VALIDATE_FLOAT);
$checkIn = filter_input(INPUT_POST, 'checkIn');
$checkOut = filter_input(INPUT_POST, 'checkOut');
$firstName=filter_input(INPUT_POST,'firstName');
$lastName=filter_input(INPUT_POST,'lastName');
$email=filter_input(INPUT_POST,'email');
$location=filter_input(INPUT_POST,'location');
$phone=filter_input(INPUT_POST,'phone');

    $queryClient = 'INSERT INTO client
                (clientID,firstName,lastName,email,location,phone)
              VALUES
                 (:clientID,:firstName,:lastName,:email,:location,:phone)';
    $statement1 = $db->prepare($queryClient);
    $statement1->bindValue(':clientID', $clientID);
    $statement1->bindValue(':firstName', $firstName);
    $statement1->bindValue(':lastName', $lastName);
    $statement1->bindValue(':email', $email);
    $statement1->bindValue(':location', $location);
    $statement1->bindValue(':phone', $phone);
    $statement1->execute();
    $last_id = $db->lastInsertId();
    //lastinsertID() AFTER STATEMENT IS EXECUTED!!!! - WILL GIVE YOU THE CLIENT ID 
    $statement1->closeCursor();
    
    $queryBooking = 'INSERT INTO reservationroom
                (clientID,roomID,totalPrice,checkIn,checkOut)
              VALUES
                 (:clientID,:roomID,:totalPrice,:checkIn,:checkOut)';
    $statement2 = $db->prepare($queryBooking);
    $statement2->bindValue(':clientID', $last_id);
    $statement2->bindValue(':roomID', $roomID);
    $statement2->bindValue(':totalPrice', $totalPrice);
    $statement2->bindValue(':checkIn', $checkIn);
    $statement2->bindValue(':checkOut', $checkOut);
    $statement2->execute();

    $statement2->closeCursor();
    
    include('displayBooking.php');
    ?>
