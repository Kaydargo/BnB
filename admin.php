<?php
    require_once('includes/database.php');
    include 'includes/headerAdmin.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
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
<h1 class="mt-4 mb-3">View admin options</h1><hr><br>


<a href="viewReservation.php"><button>View Reservations<br></button></a><br><br>
<a href="viewGallery.php"><button>View Gallery</button></a><br><br>
<a href="viewRooms.php"><button>View Rooms</button></a><br><br>
<a href="viewMessages.php"><button>View Messages</button></a><br><br>
     <a href="viewBookings.php"><button>View Bookings</button></a>
            
            
 </div>     
<?php
include 'includes/footer.php';
?>
            
    </body>
</html>