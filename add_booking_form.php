<?php
require('includes/database.php');

include 'includes/headerAdmin.php';
?>
<html>
    <head>
           <head>
        <meta charset="UTF-8">
        <title>Add Booking</title>
        <link rel="icon" href="images/logo2.png" type="image" >
        <?php include_once 'includes/cdn.php';?>
          <link href="css/nav_css.css" rel="stylesheet" type="text/css"/>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
         <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
         <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Muli:100,300" rel="style">
	<link href="https://fonts.googleapis.com/css?family=Celtic+Hand:300" rel="style">
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
         

       
    </head>
    </head>
<div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Add Booking</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">
        <form action="add_booking.php" method="post" id="add_booking_form">
          <div class="form-group">

            
            <label>Client Id:</label>
            <input type="input" name="clientID" class="form-control" >
            <br>
            
            <?php ?>
            
              <label>Room Id:</label>
              <input type="input" name="roomID" class="form-control" placeholder="Room ID">
            <br>
            
            <label>Total Price:</label>
            <input type="input" name="totalPrice" class="form-control" placeholder="Add price" >
            <br>
            
             <label>Check In:</label>
            <input type="input" name="checkIn" placeholder='Add check In date' id="datepicker" class="form-control">
            <script>        
            $( function() {
               var date = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
              $( "#datepicker" ).datepicker();
            } );
            </script><br>
            
            <label>Check Out:</label>
            <input type="input" name="checkOut" placeholder='Add check Out date' id="datepicker1" class="form-control">
            <script>        
            $( function() {
               var date = $('#datepicker1').datepicker({ dateFormat: 'yy-mm-dd' }).val();
              $( "#datepicker1" ).datepicker();
            } );
            </script><br>


            <label>&nbsp;</label>
            <button type="submit" value="Add reservation" class="btn btn-primary">Submit</button>
            <br>
            </div>
        </form>
               
            </div>
     
</div><!-- End row -->

</div>           

<?php
include 'includes/footer.php';
?>
            