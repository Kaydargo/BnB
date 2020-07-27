<?php
require('includes/database.php');
include 'includes/headerAdmin.php';

$roomID = filter_input(INPUT_POST, 'roomID', FILTER_VALIDATE_INT);
$queryRooms = 'SELECT * FROM rooms WHERE roomID = :roomID';
$statement = $db->prepare($queryRooms);
$statement->bindValue(':roomID', $roomID);
$statement->execute();
$room = $statement->fetch();
$statement->closeCursor();

$query1 = 'SELECT DISTINCT catID
          FROM rooms';
$statement1 = $db->prepare($query1);
$statement1->execute();
$rooms = $statement1->fetchAll();
$statement1->closeCursor();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Rooms</title>
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
        <h1 class="mt-4 mb-3">Edit Room</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
              <form action="edit_room.php" method="post"
              id="add_product_form">
                  <div class="form-group">
                      
            <input type="hidden" name="roomID" class="form-control"
                   value="<?php echo $room['roomID']; ?>">

            
            <label>Room Name:</label>
            <input type="input" name="roomName" class="form-control" value="<?php echo $room['roomName'];?>">
            <br>

            <label>Room Image:</label>
            <input type="input" name="roomImage" class="form-control" value="<?php echo $room['roomImage'];?>">
            <br>
            <br>
            
            <label>Category ID: </label>
            <select type="input" name="catID" class="form-control"
                   value="<?php echo $rooms['catID']; ?>">
            <?php foreach ($rooms as $room) : ?>
                <option value="<?php echo $room['catID']; ?>">
                    <?php echo $room['catID']; ?>
                </option>
            <?php endforeach; ?>
            </select>
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
            