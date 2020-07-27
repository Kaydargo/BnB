

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Availability</title>
        <?php include_once 'includes/cdn.php';
        session_start();
        ?>
        
        <link rel="icon" href="images/logo2.png" type="image" >
        
         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
         <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        <link href="css/nav_css.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Celtic+Hand:300" rel="style">
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">

        <script src="dates.js" type="text/javascript"></script>
        
</head>
<body>

   <?php include_once 'includes/header.php';
        ?>  
    <?php
    require_once('includes/database.php');
    
    ?>

<center> <h1>Book Now!</h1> </center>


    <div class="container">
        
        <div class="col-md-11">
            
            <?php 
                //Echo out message saying there are no rooms available - checker.php
            if(isset($_SESSION) && isset($_SESSION['message']))
            {
                echo $_SESSION['message'].'<br>';
                
                unset ($_SESSION['message']);
            }
            ?>
            <form  action="checker.php" method="post" required>
	    <fieldset>
		
                    <div class="form-row">
		    <div class="form-group col-md-6">
                        <label for="checkIn" class="date-title">Check In Date</label>
                        
                          <input name="checkIn" id="datepicker" width="276" required >
                          
                          <script>
               
            $( function() {
               var date = $('#datepicker').datepicker({ dateFormat: 'yyyy-mm-dd' }).val();
              $( "#datepicker" ).datepicker();
            } );
            </script>
                    </div>
                          
                          <div class="form-group col-md-6">
                              <label for="checkOut" class="date-title"> Check Out Dates</label>
                          <input name="checkOut" id="datepicker1" width="276" required>
                          <script>
               
            $( function() {
               var date = $('#datepicker1').datepicker({ dateFormat: 'yyyy-mm-dd' }).val();
              $( "#datepicker1" ).datepicker();
            } );
            </script>
                          </div>
                        
                        <div class="form-group col-md-12">
			<label for="inputRoom"class="date-title">Rooms</label> <br>
			<!-- these simply have the required-->
			<input type="radio" name="roomName" value="Single" required> Single Room<br>
			<input type="radio" name="roomName" value="Double" required> Double Room<br>
			<input type="radio" name="roomName" value="Twin" required> Twin Room<br>
                        <input type="radio" name="roomName" value="Family" required> Family Room<br>
                       
		    </div>

                        
                         <div class="form-group col-md-6">
			<button type="submit" value="submit" name="submit" class="btn btn-light" style="color: white; text-decoration: none; font-family: 'KoHo', sans-serif;" >Check Availability </button>
		    </div>
                        
                        
                        
                    </div>
                    
<!--     --------------------------------------------------------------------------------------------------------------  -->
<hr>
<!--                    <div id="roomdiv" class="form-group col-md-6">
			<label id="roomLabel"class="date-title">Rooms Available</label>
			<select id="roomInput" name="roomInput"  class="form-control" required>
			    <option selected>Please Choose</option>

			</select>
		    </div>-->


	    </fieldset>
	</form>
    
    
    
    
        </div>
        </div>
       
    
        
        
    



<?php include_once 'includes/footer.php';
?>



</body>
</html>
