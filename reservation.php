

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reservation</title>
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
                
    $query = 'SELECT *
          FROM category
          ORDER BY catID';
$statement = $db->prepare($query);
$statement->execute();
$cat = $statement->fetchAll();
$statement->closeCursor();
            ?>
            
            <form  action="add_bookingClient.php" method="post" required>
	    <fieldset>
                <label for="inputRoom" class="date-title" >Your Dates </label><br>
                
                <?php 
                echo 'Check In: '.  $_SESSION['dateIn'].'<br>';
                       echo 'Check Out: '.$_SESSION['dateOut'].'<br>'; 
        $date1 = new DateTime($_SESSION['dateIn']);
        $date2 = new DateTime($_SESSION['dateOut']);
                       $interval = $date1->diff($date2);
                       $days = $interval->format("%a");
                       echo 'Your stay is for '.$interval->format('%R%a nights');
        ?>
                <br><br>
                <label for="inputRoom" class="date-title" >Would you like to change your dates? </label><br>
                <button type="button" class="btn btn-light"> <a href="availability.php" style="color: white; text-decoration: none; font-family: 'KoHo', sans-serif;">Change Dates </a> </button>
                
            <input type="hidden" name="checkIn" value= "<?php echo $_SESSION['dateIn'] ?>" class="form-control">
            <input type="hidden" name="checkOut" value= "<?php echo $_SESSION['dateOut'] ?>" class="form-control">


                
<!--                
                <br><br>
                <label for="inputRoom" class="date-title" >Select your room type </label>
                <select name="roomID" class="form-control">
            <?php foreach($cat as $cats) : ?>
                <option value="<?php echo $cats['price']; ?>">
                    <?php echo $cats['catName'].' - '. $cats['price']; ?>
                </option>
            <?php endforeach; ?>
            </select>
                <br>-->
<br><br>
                <label for="inputRoom" class="date-title" >Select your room Number </label>
                <select name="roomID" class="form-control">
            <?php foreach($_SESSION['booking'] as $bookings) : ?>
                <option value="<?php echo $bookings['roomID']; ?>">
                    <?php echo $bookings['roomID']; ?>
                </option>
            <?php endforeach; ?>
            </select>
                <br>
                
                <label for="totalPrice" class="date-title" >Your Price: €</label>        

            <?php 
            if ($_SESSION['roomName'] == "Double")
            {
                
                //Double
                $totalPrice=85.00 *$days; echo $totalPrice; 
                
            }
            
            else if ($_SESSION['roomName'] == "Family")
            {
                //Family
                $totalPrice=100.00 *$days; echo $totalPrice; 
            }
            
            else if ($_SESSION['roomName'] == "Twin")
            {
                //Twin
                $totalPrice=85.00 *$days; echo $totalPrice; 
            }
            
            else 
            {
                //Single
                $totalPrice=60.00 *$days; echo $totalPrice; 
            }
                
            
            ?>
                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice ?>">
            
                
                <div class="form-row">
		    <div class="form-group col-md-6">
			<label for="inputName" class="date-title" >First Name</label>

			<!--the pattern below means that the user can only enter letters-->
			<!--the name is important as it is what will be used to be echo on the display page-->
			<input type="text" class="form-control" id="firstName" name="firstName" pattern="[a-zA-Z\s]*" placeholder="John"  required>
		
		    </div>
		    <div class="form-group col-md-6">
			<label for="inputSurname"class="date-title">Surname</label>
			<input type="text" class="form-control" id="lastName" name="lastName" pattern="[a-zA-Z\s]*" placeholder="Smith"  required>
		    </div>
                    
		</div>
                
                
                
                
                <div class="form-row" >
                    <input type="hidden" name="clientID" class="form-control" >
            <br>
                       <div class="form-group col-md-6">
			<label for="inputPhone"class="date-title">Phone Number</label>
			<!--the pattern below means that the user can  enter only numbers and only in a specific way that matches irish phone numbers-->
			<input type="text" class="form-control" id="inputPhone" name="phone" placeholder="0873505222" pattern="08[35679]\d{7}" data-toggle="tooltip" title="Numbers Only! Must be 10 digits" required>
		    </div>
		    <div class="form-group col-md-6">
			<label for="inputEmail"class="date-title">Email</label>
			<!--the pattern below means that the user can  enter letters and numbers, that there must be an @ with text after, then a . and then 2 to 3 letters-->
			<input type="email" class="form-control" id="inputEmail" name="email"  placeholder="name@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" data-toggle="tooltip" title="Letters,numbers & symbols. Must contain @ and com/.ie!" required />
		    </div>
                        <div class="form-group col-md-6">
			<label for="inputLocation"class="date-title">Location</label>
			<input type="text" class="form-control" id="location" name="location" pattern="[a-zA-Z\s]*" placeholder="New York"  required>
		    </div>
                        
                    </div>
                </div>
                    
		
                
		<div class="col-md-12">
                    <button type="submit" value="submit" name="submit" class="btn btn-light" style="color: white; text-decoration: none; font-family: 'KoHo', sans-serif;" >Book Now </button> 
                <!--<button type="submit" name="submit" class="btn btn-outline-success">Send</button>
		  <!--  <button type="reset" id="cancel" class="btn btn-outline-danger" >Cancel</button>-->

		</div>

	    </fieldset>
	</form>
    
    
    
    
    
        </div>
       
    
        
        
    



<?php include_once 'includes/footer.php';
?>



</body>
</html>
