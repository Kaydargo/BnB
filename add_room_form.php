<?php
require('includes/database.php');
include 'includes/headerAdmin.php';

$query = 'SELECT *
          FROM rooms
          ORDER BY roomID';
$statement = $db->prepare($query);
$statement->execute();
$room = $statement->fetchAll();
$statement->closeCursor();

$query1 = 'SELECT *
          FROM category';
$statement1 = $db->prepare($query1);
$statement1->execute();
$cat = $statement1->fetchAll();
$statement1->closeCursor();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Images</title>
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
        <h1 class="mt-4 mb-3">Add Rooms</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
              <form action="add_room.php" method="post"
              id="add_room_form">
                  <div class="form-group">
                      
            <input type="hidden" name="roomID" class="form-control">

            
            <label>Room Name:</label>
            <input type="input" name="roomName" class="form-control">
            <br>

            <label>Room Image:</label>
            <input type="file" name="roomImage" class="form-control">
            <br>

            <label>Category ID:</label>
            <select name="catID" class="form-control">
                <?php foreach ($cat as $cats) : ?>
                <option value="<?php echo $cats['catID']; ?>">
                    <?php echo $cats['catID']; ?>
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
            