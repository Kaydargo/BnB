<?php

//var_dump($_POST);
require_once 'includes/database.php';

session_start();
    if (isset($_POST)){
        

        
$checkIn = ($_POST["checkIn"]);
$checkOut =($_POST["checkOut"]);
$roomName =($_POST["roomName"]);

echo $checkIn.'<br>';
echo $checkOut. '<br>';

$date1 = explode("/",$checkIn);
$date2 = explode("/",$checkOut); 

$dateIn = $date1[2].'-'.$date1[0].'-'.$date1[1];
$dateOut = $date2[2].'-'.$date2[0].'-'.$date2[1];

echo $dateIn;
echo $dateOut;

    $queryAllBookings = "SELECT roomID,roomName FROM rooms WHERE roomID NOT IN ( SELECT roomID FROM reservationroom WHERE checkIn BETWEEN :dateIn AND :dateOut OR checkOut BETWEEN :dateIn1 AND :dateOut2) AND roomName=:roomName ORDER BY roomID";
    $statement2 = $db->prepare($queryAllBookings);
    $statement2->bindValue(":dateIn", $dateIn);
    $statement2->bindValue(":dateOut", $dateOut);
    $statement2->bindValue(":dateIn1", $dateIn);
    $statement2->bindValue(":dateOut2", $dateOut);
    $statement2->bindValue(":roomName", $roomName);
    $statement2->execute();
    $booking = $statement2->fetchAll();
    $count = $statement2->rowCount();
    $statement2->closeCursor();
    
    //var_dump($booking);
    
    
    
    
            
    if ($count == 0)
    {
        $path= 'availability.php';
        $_SESSION['message']= "There are no rooms available for your chosen dates, please try again with a different date or room type  <br>";
        
    }
    
    else 
    {

        $_SESSION['booking']=$booking;
        $_SESSION['dateIn']=$dateIn;
        $_SESSION['dateOut']=$dateOut;
        $_SESSION['roomName']=$roomName;
         $_SESSION['checkIn']=$checkIn;
        $_SESSION['checkOut']=$checkOut;
        
        $path= 'reservation.php';    
    }
    
    
//    echo $count.'<br>';
//    
//    
//    foreach($booking as $bookings)
//    {
//        echo $bookings['roomID'] . '<br>'; 
//    }
    
    header('location: '.$path);
    
    }   
    
    
    ?> 