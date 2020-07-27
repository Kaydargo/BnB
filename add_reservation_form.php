<?php
require('includes/database.php');

include 'includes/headerAdmin.php';
?>
<html>
    <head>
           <head>
        <meta charset="UTF-8">
        <title>Add Client</title>
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
        <h1 class="mt-4 mb-3">Add Client</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">
        <form action="add_reservation.php" method="post" id="add_product_form">
          <div class="form-group">

            
<!--            <label>Res Id:</label>-->
            <input type="hidden" name="clientID" class="form-control" placeholder="Add Client code" >
            <br>
            
            <label>First Name:</label>
            <input type="input" name="firstName" class="form-control" placeholder="Add first name" >
            <br>
            
            <label>Last Name:</label>
            <input type="input" name="lastName" class="form-control" placeholder="Add last name" >
            <br>
            
            <label>Email:</label>
            <input type="input" name="email" class="form-control" placeholder="Add email" >
            <br>
            
            <label>Location:</label>
            <input type="input" name="location" class="form-control" placeholder="Add location" >
            <br>
            
            <label>Phone:</label>
            <input type="input" name="phone" class="form-control" placeholder="Add phone number" >
            <br>

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
            