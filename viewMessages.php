<?php
    require_once('includes/database.php');
    include 'includes/headerAdmin.php';

    // Get all categories
    $queryAllMsg = 'SELECT * FROM message
              ORDER BY messageID';
    $statement2 = $db->prepare($queryAllMsg);
    $statement2->execute();
    $msg = $statement2->fetchAll();
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
<h1 class="mt-4 mb-3">View Messages</h1><hr><br>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">

               <section>
            <!-- display a table of products -->
            <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Message ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Message Date</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($msg as $msgs) : ?>
                <tr>
                    <td><?php echo $msgs['messageID']; ?></td>
                    
                    <td><?php echo $msgs['firstName']; ?></td>
                    <td><?php echo $msgs['lastName']; ?></td>
                     <td><?php echo $msgs['email']; ?></td>
                     <td><?php echo $msgs['phone']; ?></td>
                     <td><?php echo $msgs['message']; ?></td>
                     <td><?php echo $msgs['messageDate']; ?></td>
                    <td><form action="deleteMessage.php" method="post"
                              id="delete_message">
                        <input type="hidden" name="messageID"
                               value="<?php echo $msgs['messageID']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                    
                </tr>
                <?php endforeach; ?>
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