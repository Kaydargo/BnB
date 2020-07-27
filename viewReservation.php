<?php
    require_once('includes/database.php');
    include 'includes/headerAdmin.php';

    if (!isset($clientID)) {
        $clientID = filter_input(INPUT_GET, 'clientID', 
                FILTER_VALIDATE_INT);
        if ($clientID == NULL || $clientID == FALSE) {
            $clientID = 1;
        }
    }

    // Get all categories
    $queryAllReservations = 'SELECT * FROM client
              ORDER BY clientID';
    $statement2 = $db->prepare($queryAllReservations);
    $statement2->execute();
    $res = $statement2->fetchAll();
    $statement2->closeCursor();
   
?>
<!DOCTYPE html>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <title>View Reservations</title>
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
<h1 class="mt-4 mb-3">View Clients</h1><hr><br>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">

               <section>
            <!-- display a table of products -->
            <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Client ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($res as $reserve) : ?>
                <tr>
                    <td><?php echo $reserve['clientID']; ?></td>
                    <td><?php echo $reserve['firstName']; ?></td>
                    <td><?php echo $reserve['lastName']; ?></td>
                    <td><?php echo $reserve['email']; ?></td>
                    <td><?php echo $reserve['location']; ?></td>
                    <td><?php echo $reserve['phone']; ?></td>
                    <td><form action="edit_reservation_form.php" method="post"
                              id="edit_reservation_form">
                        <input type="hidden" name="clientID"
                               value="<?php echo $reserve['clientID']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                    <td><form action="delete_reservation.php" method="post"
                              id="delete_reservation">
                        <input type="hidden" name="clientID"
                               value="<?php echo $reserve['clientID']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                    
                </tr>
                <?php endforeach; ?>
            </table>
            
            <table>
            <td><form action="add_reservation_form.php" method="post"
                              id="add_product_form">
                        <input type="hidden" name="clientID"
                               value="<?php echo $reserve['clientID']; ?>">
                        <input type="submit" value="Add new Client">
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