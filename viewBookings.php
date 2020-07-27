<?php
    require_once('includes/database.php');
    include 'includes/headerAdmin.php';

    // Get all categories
    $queryAllReservations = 'SELECT * FROM reservationroom
              ORDER BY clientID';
    $statement2 = $db->prepare($queryAllReservations);
    $statement2->execute();
    $book = $statement2->fetchAll();
    $statement2->closeCursor();
//    
//     $queryAllRes = 'SELECT * FROM clients
//              ORDER BY clientID';
//    $statement3 = $db->prepare($queryAllRes);
//    $statement3->execute();
//    $res = $statement3->fetchAll();
//    $statement3->closeCursor();
?>
<!DOCTYPE html>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <title>View Bookings</title>
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
    <body>

 <div class="container">
<!--Page Heading -->
<h1 class="mt-4 mb-3">View Bookings</h1><hr><br>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">

               <section>
            <!-- display a table of products -->
            <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Client ID</th>
                    <th>Room ID</th>
                    <th>Total Price</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($book as $books) : ?>
                <?php // foreach ($res as $reserve) : ?>
                <tr>
                    <td><?php echo $books['clientID']; ?></td>
                    <td><?php echo $books['roomID']; ?></td>
                    <td><?php echo $books['totalPrice']; ?></td>
                    <td><?php echo $books['checkIn']; ?></td>
                    <td><?php echo $books['checkOut']; ?></td>
                    <td><form action="edit_booking_form.php" method="post"
                              id="edit_booking_form">
                        <input type="hidden" name="clientID"
                               value="<?php echo $books['clientID']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                    <td><form action="delete_booking.php" method="post"
                              id="delete_booking">
                        <input type="hidden" name="clientID"
                               value="<?php echo $books['clientID']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                    
                </tr>
                <?php endforeach; ?>
                 <?php // endforeach; ?>
            </table>
            
            <table>
            <td><form action="availability.php" method="post"
                              id="add_booking_form">
                        <input type="submit" value="Add new Booking">
                    </form></td>
                    </table>
                    
            
        </section>
               
            </div> 
</div><!-- End row -->
 
</div>     
        

        
<?php
include 'includes/footer.php';
?>
            
    </body>
</html>