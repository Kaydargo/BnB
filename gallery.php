<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Gallery</title>
        <link rel="icon" href="images/logo2.png" type="image" >

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <link href="css/nav_css.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link href="css/footercss.css" rel="stylesheet" type="text/css"/>
        <?php include_once 'includes/cdn.php';
        ?>
        <script src="js/jQuery.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
                 
    </head>

    <?php
    require_once('includes/database.php');
    require_once('includes/header.php');
    ?>

    <body>

        <?php
//Selects all images, their id and userid with the tag animated
        require('includes/functions.php');
        ?>
        <!-- Page Content -->
        <div class="container" style="text-align: center;">

            <h1 class="galhead" >Gallery</h1>

            <p class="gal-name gal-buttons" >   <a href="#houseImages" class="gallery-nav-links " class="gal-name-link" > House</a> </p>
           <p class="gal-name gal-buttons" > <a href="#gardenImages" class="gallery-nav-links gal-name-link"> Garden</a> </p>
          <p class="gal-name gal-buttons" >  <a href="#roomImages" class="gallery-nav-links gal-name-link"> Rooms</a></p>


            <br><br>
            <br><br><br>    

            <!--Image slider for House  -->

            <h2 id="houseImages">House</h2>
            <hr class="divline">
            <div class="container">
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="carousel slide media-carousel" id="media1">
                            <div class="carousel-inner">

                                <div class="item active" >
                                    <div class="row"> 


<?php $counter = 0; ?>
                                        <?php foreach ($houses as $house): ?>
                                            <?php
                                            $counter++; //increase counter number
                                            if ($counter > 4) {
                                                break;
                                            }
                                            ?>  

                                            <div class="col-md-3">
    <?= ($house['image'] <> " " ? "<img style='width:250px; height:250px; margin-top:10px;' src='images/{$house['image']}'/>" : "") ?>


                                            </div>   
<?php endforeach; ?> 


                                    </div>
                                </div>


                                <div class="item">
                                    <div class="row">


                                        <?php $counter1 = 0; ?><?php foreach ($houses1 as $house1): ?>
                                            <?php
                                            $counter1++; //increase counter number
                                            if ($counter1 > 4) {
                                                break;
                                            }
                                            ?>  
                                            <div class="col-md-3">

                                            <?= ($house1['image'] <> " " ? "<img style='width:250px; height:250px; margin-top:10px;' src='images/{$house1['image']}'/>" : "") ?>

                                            </div>   
<?php endforeach; ?> 

                                    </div>
                                </div>

                            </div>

                            <a data-slide="prev" href="#media1" class="left carousel-control">&lt;</a>
                            <a data-slide="next" href="#media1" class="right carousel-control">&gt;</a>
                        </div>                          
                    </div>
                </div>
            </div>

                <!--Image slider for garden  -->
                <br><br><br>

                <h2 id="gardenImages">Garden</h2>
                <hr class="divline">
                <div class="container">
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="carousel slide media-carousel" id="media2">
                                <div class="carousel-inner">


                                    <div class="item active" >
                                        <div class="row">

                                            <?php $counter3 = 0; ?>
                                            <?php foreach ($gardens as $garden): ?>
                                                    <?php
                                                    $counter3++; //increase counter number
                                                    if ($counter3 > 4) {
                                                        break;
                                                    }
                                                    ?>
                                                <div class="col-md-3">
    <?= ($garden['image'] <> " " ? "<img style='width:250px; height:250px; margin-top:10px;' src='images/{$garden['image']}'/>" : "") ?>

                                                </div>   
<?php endforeach; ?> 


                                        </div>
                                    </div>


                                    <div class="item">
                                        <div class="row">

<?php $counter4 = 0; ?>
                                            <?php foreach ($gardens1 as $garden1): ?>
                                                <?php
                                                $counter4++; //increase counter number
                                                if ($counter4 > 4) {
                                                    break;
                                                }
                                                ?><div class="col-md-3">
    <?= ($garden1['image'] <> " " ? "<img style='width:250px; height:250px;margin-top:10px;' src='images/{$garden1['image']}'/>" : "") ?>

                                                </div>   
<?php endforeach; ?> 


                                        </div>
                                    </div>

                                </div>
                                <a data-slide="prev" href="#media2" class="left carousel-control">&lt;</a>
                                <a data-slide="next" href="#media2" class="right carousel-control">&gt;</a>
                            </div>                          
                        </div>
                    </div>
                </div>


                <!--Image slider for Rooms  -->
                <br><br><br>    
                <h2 id="roomImages">Rooms</h2>
                <hr class="divline">
                <div class="container">
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="carousel slide media-carousel" id="media3">
                                <div class="carousel-inner">


                                    <div class="item active" >
                                        <div class="row">

                                            <?php $counter6 = 0; ?>
<?php foreach ($rooms as $room): ?>
    <?php
    $counter6++; //increase counter number
    if ($counter6 > 4) {
        break;
    }
    ?>
                                                <div class="col-md-3">
                                                <?= ($room['image'] <> " " ? "<img style='width:250px; height:250px; margin-top:10px;' src='images/{$room['image']}'/>" : "") ?>
                                                                             
                                                </div>   
                                            <?php endforeach; ?> 


                                        </div>
                                    </div>


                                    <div class="item">
                                        <div class="row">

<?php $counter7 = 0; ?>
<?php foreach ($rooms1 as $room1): ?>
    <?php
    $counter7++; //increase counter number
    if ($counter7 > 4) {
        break;
    }
    ?><div class="col-md-3">
    <?= ($room1['image'] <> " " ? "<img style='width:250px; height:250px; margin-top:10px;' src='images/{$room1['image']}'/>" : "") ?>

                                                </div>   
<?php endforeach; ?> 


                                        </div>   
                                    </div>

                                    <a data-slide="prev" href="#media3" class="left carousel-control">&lt;</a>
                                    <a data-slide="next" href="#media3" class="right carousel-control">&gt;</a>
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>

        </div>
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php include_once 'includes/footer.php'; ?>
                </body>
                </html>