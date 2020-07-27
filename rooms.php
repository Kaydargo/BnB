<html>
    <head>
        <meta charset="UTF-8">
        <title>Our Room</title>
        <link rel="icon" href="images/logo2.png" type="image" >
       <link href="css/lightboxStyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link href="css/nav_css.css" rel="stylesheet" type="text/css"/>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
        <link href="css/nav_css.css" rel="stylesheet" type="text/css"/>
        
        <link href="css/footercss.css" rel="stylesheet" type="text/css"/>
        <?php include_once 'includes/cdn.php';
	?>
        <!--Icons from Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        
        
        <style>
            p{
                display: inline;
                margin-left: 15px;
            }
            </style>

    </head>
    <body>
       
        <?php include_once 'includes/header.php';
               require 'includes/database.php';
	?>
<?php
//write a query to get the dynamic categories (All categories) 
$query = "SELECT * from category ORDER by catID";           
//run my query 
        //prepare the query (PDO)
        $statement = $db -> prepare($query); 
        //bind data if required  (if i need to contrain using a WHERE clause) not needed rn cos we need all categories
        //execute the query
        $statement ->execute();
//create a variable to save the result set ($category)
$category = $statement ->fetchAll();
//close the statement
$statement ->closeCursor();


//get the category id from the URL (if there is one)
$catID = filter_input(INPUT_GET, "catID", FILTER_VALIDATE_INT);
//write a query to get the dynamic room images (all rooms - from the categories ive selected) 
if ($catID != "") {
//query if a value has been passed for category id
    $queryRoom = "SELECT * from rooms WHERE catID = :catID";
} else {
//query if a value has NOT been passed for category id
    $queryRoom = "SELECT * from rooms";
}
//prepare the query (PDO)
        $statement2 = $db -> prepare($queryRoom);
        //bind data if required  (if i need to contrain using a WHERE clause)
        $statement2 -> bindValue(":catID", $catID);
        //execute the query
        $statement2 ->execute();
//create a variable to save the result set ($products)
$room = $statement2 ->fetchAll();     
//close the statement
$statement2 ->closeCursor();

$catName = filter_input(INPUT_GET, "catName");
if ($catName != "") {
    echo 'All Rooms';
} else {
//query if a value has NOT been passed for category id
    $queryTitle = "SELECT catName from category WHERE catID =:catID ORDER BY catName";
}
//prepare the query (PDO)
        $statement3 = $db -> prepare($queryTitle);
        //bind data if required  (if i need to contrain using a WHERE clause)
        $statement3 -> bindValue(":catID", $catID);
        //execute the query
        $statement3 ->execute();
//create a variable to save the result set ($products)
$roomTitle = $statement3 ->fetchAll();     
//close the statement
$statement3 ->closeCursor();

//?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rooms</title>
    </head>
    <body>
        <div class="container">

            <!--dynamic categories (All categories)
            output $categories (from my query above)
            add a link (a tag) around each category name to call this page again (passing through the category id)
            -->
            <div style="text-align: center;">
            <?php
            //get the results from the categories variable(usuing a loop)
            echo "<ul>";
            foreach($category as $categories) : ?>
<!--            //add a list
            //output category name-->
                <?php
            echo " <p class='gal-name gal-button' > <a class='gallery-nav-links' style='text-align:center;' href='rooms.php?catID=" . $categories['catID'] . "'>";
            //will reload
            echo $categories['catName'];
            echo "</a> </p> ";
            //close loop  
            endforeach;
            echo "</ul>";
            ?>
            </div>
            
        <main>
           
            <div class="panel panel-default">   
                <h2 style="font-family: 'KoHo', sans-serif; color:#592724;" ><?php foreach($roomTitle as $roomTitles) : ?> <?php echo $roomTitles['catName']; endforeach; ?></h2>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        foreach ($room as $rooms):
                            ?>
                            <div class="col-md-3">  
                                <a class="lightbox" href="#<?php echo $rooms['roomID'] ?>">
                                    <?= ($rooms['roomImage'] <> " " ? "<img style='width:200px; height:200px;' src='images/{$rooms['roomImage']}'/>" : "") ?>     
                                </a>
                            </div>               

                        <?php endforeach; ?>   
                        <!-- End of Foreach Statement -->
                        <?php
                        foreach ($room as $rooms):
                            ?>              
                            <div class="lightbox-target" id="<?php echo $rooms['roomID'] ?>">

                                <?= ($rooms['roomImage'] <> " " ? "<img src='images/{$rooms['roomImage']}'/>" : "") ?>
                                <a class="lightbox-close" href="#"></a>
                            </div>                      

                        <?php endforeach; ?>   
                        <!-- End of Foreach Statement -->

                    </div>
                </div>
            </div>
            <br>
           <h2>Amenities</h2>
           <hr>
           <div class="row well">
     <div class="col-sx-4 col-sm-4 col-md-4 col-lg-4">
        <div class="row ">
            <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
                <i class="fas fa-wifi"></i>   
            </div>
            <div class="col-sx-9 col-sm-9 col-md-9 col-lg-9">
                 <p>Wifi</p>
            </div>
        </div>
    </div> 
               
               <div class="col-sx-4 col-sm-4 col-md-4 col-lg-4">
        <div class="row ">
            <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
                <i class="fas fa-bath"></i>  
            </div>
            <div class="col-sx-9 col-sm-9 col-md-9 col-lg-9">
                 <p>Ensuite</p>
            </div>
        </div>
    </div>
               
               <div class="col-sx-4 col-sm-4 col-md-4 col-lg-4">
        <div class="row ">
            <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
               <i class="fas fa-coffee"></i>
            </div>
            <div class="col-sx-9 col-sm-9 col-md-9 col-lg-9">
                 <p>Coffee maker</p>
            </div>
        </div>
    </div>

                    <div class="col-sx-4 col-sm-4 col-md-4 col-lg-4">
        <div class="row ">
            <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
               <i class="fas fa-tv"></i>
            </div>
            <div class="col-sx-9 col-sm-9 col-md-9 col-lg-9">
                 <p>Smart TV</p>
            </div>
        </div>
    </div>
               
                    <div class="col-sx-4 col-sm-4 col-md-4 col-lg-4">
        <div class="row ">
            <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
               <i class="fas fa-car"></i> 
            </div>
            <div class="col-sx-9 col-sm-9 col-md-9 col-lg-9">
                 <p>Parking</p>
            </div>
        </div>
    </div>
               
                     <div class="col-sx-4 col-sm-4 col-md-4 col-lg-4">
        <div class="row ">
            <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
               <i class="fas fa-lock"></i>
            </div>
            <div class="col-sx-9 col-sm-9 col-md-9 col-lg-9">
                 <p>Safe</p>
            </div>
        </div>
    </div>
</div>

              
           
        </main>
        </div>
         <?php include_once 'includes/footer.php';
	?>
    </body>
</html>