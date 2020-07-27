<?php
require('includes/database.php');
include 'includes/headerAdmin.php';

$clientID = filter_input(INPUT_POST, 'clientID', FILTER_VALIDATE_INT);
$query = 'SELECT * FROM client WHERE clientID = :clientID';
$statement = $db->prepare($query);
$statement->bindValue(':clientID', $clientID);
$statement->execute();
$reserve = $statement->fetch();
$statement->closeCursor();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Client</title>
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
        <h1 class="mt-4 mb-3">Edit Client</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
              <form action="edit_reservation.php" method="post"
              id="add_product_form">
                  <div class="form-group">
                      
<!--                  <label>Client Id:</label>-->
<input type="hidden" name="clientID" class="form-control" value="<?php echo $reserve['clientID']; ?>">
            <br>
            
            <label>First Name:</label>
            <input type="input" name="firstName" class="form-control" value="<?php echo $reserve['firstName']; ?>" >
            <br>
            
            <label>Last Name:</label>
            <input type="input" name="lastName" class="form-control" value="<?php echo $reserve['lastName']; ?>">
            <br>
            
            <label>Email:</label>
            <input type="input" name="email" class="form-control" value="<?php echo $reserve['email']; ?>">
            <br>
            
            <label>Location:</label>
            <input type="input" name="location" class="form-control" value="<?php echo $reserve['location']; ?>" >
            <br>
            
            <label>Phone:</label>
            <input type="input" name="phone" class="form-control" value="<?php echo $reserve['phone']; ?>" >
            <br>
            

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
            