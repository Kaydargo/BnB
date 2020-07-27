<?php
    require_once('includes/database.php');
    include 'includes/headerAdmin.php';

//     Get category ID
    if (!isset($roomID)) {
        $roomID = filter_input(INPUT_GET, 'roomID', 
                FILTER_VALIDATE_INT);
        if ($roomID == NULL || $roomID == FALSE) {
            $roomID = 1;
        }
    }

    // Get all categories
    $queryAllRooms = 'SELECT * FROM rooms
              ORDER BY roomID';
    $statement2 = $db->prepare($queryAllRooms);
    $statement2->execute();
    $room = $statement2->fetchAll();
    $statement2->closeCursor();
    
    $queryAllCat = 'SELECT * FROM category
              ORDER BY catID';
    $statement3 = $db->prepare($queryAllCat);
    $statement3->execute();
    $cat = $statement3->fetchAll();
    $statement3->closeCursor();
?>
<!DOCTYPE html>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <title>View Rooms</title>
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
<h1 class="mt-4 mb-3">View Rooms</h1><hr><br>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
            <!-- display a table of products -->
            <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Room ID</th>
                    <th>Room Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($room as $rooms) : ?>
                <tr>
                    <td><?php echo $rooms['roomID']; ?></td>
                    <td><?php echo $rooms['roomName']; ?></td>
                    <td><?= ($rooms['roomImage'] <> " " ? "<img style='width:150px; height:150px;' src='images/{$rooms['roomImage']}'/>" : "") ?>  </td>
                    <td><?php echo $rooms['catID']; ?></td>
                    
                    
                    <td><form action="edit_room_form.php" method="post"
                              id="edit_room_form">
                        <input type="hidden" name="roomID"
                               value="<?php echo $rooms['roomID']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                    <td><form action="delete_room.php" method="post"
                              id="delete_room">
                        <input type="hidden" name="roomID"
                               value="<?php echo $rooms['roomID']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                    
                </tr>
                <?php endforeach; ?>
            </table>
            
            <table>
            <td><form action="add_room_form.php" method="post"
                              id="add_room_form">
                        <input type="hidden" name="roomID"
                               value="<?php echo $room['roomID']; ?>">
                        <input type="submit" value="Add new Room">
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