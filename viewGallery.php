<?php
    require_once('includes/database.php');
    include 'includes/headerAdmin.php';

//     Get category ID
    if (!isset($resID)) {
        $resID = filter_input(INPUT_GET, 'resID', 
                FILTER_VALIDATE_INT);
        if ($resID == NULL || $resID == FALSE) {
            $resID = 1;
        }
    }

    // Get all categories
    $queryAllImages = 'SELECT * FROM image
              ORDER BY imageID';
    $statement2 = $db->prepare($queryAllImages);
    $statement2->execute();
    $image = $statement2->fetchAll();
    $statement2->closeCursor();
?>
<!DOCTYPE html>
<html>
     <head>
        <meta charset="UTF-8">
        <title>Wicklow Country house B&B</title>
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
<h1 class="mt-4 mb-3">View Images</h1><hr><br>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
            <!-- display a table of products -->
            <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Image ID</th>
                    <th>Image</th>
                    <th>Image Description</th>
                    <th>Title</th>
                    <th>Room ID</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($image as $images) : ?>
                <tr>
                    <td><?php echo $images['imageID']; ?></td>
                    <td><?= ($images['image'] <> " " ? "<img style='width:150px; height:150px;' src='images/{$images['image']}'/>" : "") ?>  </td>
                    <td><?php echo $images['imageDescr']; ?></td>
                    <td><?php echo $images['title']; ?></td>
                     <td><?php echo $images['roomID']; ?></td>
                    <td><form action="edit_image_form.php" method="post"
                              id="edit_image_form">
                        <input type="hidden" name="imageID"
                               value="<?php echo $images['imageID']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                    <td><form action="delete_image.php" method="post"
                              id="delete_image_form">
                        <input type="hidden" name="imageID"
                               value="<?php echo $images['imageID']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                    
                </tr>
                <?php endforeach; ?>
            </table>
            
            <table>
            <td><form action="add_image_form.php" method="post"
                              id="add_image_form">
                        <input type="hidden" name="imageID"
                               value="<?php echo $images['imageID']; ?>">
                        <input type="submit" value="Add new image">
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