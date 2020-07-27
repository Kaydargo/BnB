<?php
require('includes/database.php');
include 'includes/headerAdmin.php';

$clientID = filter_input(INPUT_POST, 'clientID', FILTER_VALIDATE_INT);
$query = 'SELECT * FROM reservationroom WHERE clientID = :clientID';
$statement = $db->prepare($query);
$statement->bindValue(':clientID', $clientID);
$statement->execute();
$reserve = $statement->fetch();
$statement->closeCursor();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Booking</title>
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
 <div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Edit Booking</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
              <form action="edit_booking.php" method="post"
              id="add_product_form">
                  <div class="form-group">
                      
<!--                  <label>Client Id:</label>-->
<input type="hidden" name="clientID" class="form-control" value="<?php echo $reserve['clientID']; ?>">

<!--<label>Room Id:</label>-->
<input type="hidden" name="roomID" class="form-control" value="<?php echo $reserve['roomID']; ?>">
            
            <label>Total Price:</label>
            <input type="input" name="totalPrice" value="<?php echo $reserve['totalPrice']; ?>" class="form-control">
            <br>
            
             <label>Check In:</label>
            <input type="input" name="checkIn" value="<?php echo $reserve['checkIn']; ?>"  id="datepicker" class="form-control">
            <script>        
            $( function() {
               var date = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
              $( "#datepicker" ).datepicker();
            } );
            </script><br>
            
            <label>Check Out:</label>
            <input type="input" name="checkOut" value="<?php echo $reserve['checkOut']; ?>"  id="datepicker1" class="form-control">
            <script>        
            $( function() {
               var date = $('#datepicker1').datepicker({ dateFormat: 'yy-mm-dd' }).val();
              $( "#datepicker1" ).datepicker();
            } );
            </script><br>


            <label>&nbsp;</label>
            <input type="submit" value="Save Changes" class="btn btn-primary">
            <br>
            </div>
        </form>
        </section>
               
            </div>
      
</div><!-- End row -->
</div>           

<?php
include 'includes/footer.php';
?>
            