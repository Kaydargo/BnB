<?php
require('includes/database.php');
include 'includes/headerAdmin.php';

$imageID = filter_input(INPUT_POST, 'imageID', FILTER_VALIDATE_INT);
$query = 'SELECT * FROM image WHERE imageID = :imageID';
$statement = $db->prepare($query);
$statement->bindValue(':imageID', $imageID);
$statement->execute();
$image = $statement->fetch();
$statement->closeCursor();


$query1 = 'SELECT *
          FROM rooms';
$statement1 = $db->prepare($query1);
$statement1->execute();
$room = $statement1->fetchAll();
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
        <h1 class="mt-4 mb-3">Edit Images</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
              <form action="edit_image.php" method="post"
              id="add_product_form">
                  <div class="form-group">
                      
            <input type="hidden" name="imageID" class="form-control"
                   value="<?php echo $image['imageID']; ?>">

            
            <label>Image:</label>
            <input type="input" name="image" class="form-control"
                   value="<?php echo $image['image']; ?>">
            <br>

            <label>Image Description:</label>
            <input type="input" name="imageDescr" class="form-control"
                   value="<?php echo $image['imageDescr']; ?>">
            <br>

            <label>Title:</label>
            <input type="input" name="title" class="form-control"
                   value="<?php echo $image['title']; ?>">
            <br>
            
            <label>Room ID:</label>           
            <select type="input" name="roomID" class="form-control"
                   value="<?php echo $image['roomID']; ?>">
              <option value="">0
                </option>
            <?php foreach ($room as $rooms) : ?>
                <option value="<?php echo $rooms['roomID']; ?>">
                    <?php echo $rooms['roomID']; ?>
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
            