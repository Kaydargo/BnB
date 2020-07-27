<html>
    <head>
        <meta charset="UTF-8">
        <title>Booking Information</title>
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
        <?php include_once 'includes/header.php'; ?>
        <?php require_once('includes/database.php');
        ?>
            
                <div class="container">
                <h2>Thank you for booking  <span><?php echo $_POST["firstName"];?></span> </h2><hr>
                
                     <?php
                          
require_once('includes/database.php');
?>
                
<br><br>
                
                <form>
                
                <fieldset>
                    
                      <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><strong>First Name: </strong></label>
<!--                    Posts information stored in firstname variable, taken from index.php-->
                    <span><?php echo $_POST["firstName"];?></span>
                    </div>
                          
                      <div class="form-group col-md-6">
                    <label><strong>Last Name: </strong></label>
                    <!--  Posts information stored in lastname variable, taken from index.php-->
                    <span><?php echo $_POST["lastName"];?></span>
                    </div> 
                          
                    <div class="form-group col-md-6">
                 <!--  Posts information stored in country variable, taken from index.php-->
                 <label><strong>Phone Number: </strong></label>
                    <span><?php echo $_POST["phone"];?></span>
                    </div>   
                          <div class="form-group col-md-6">
                    <label><strong>Email: </strong></label>
                    <span><?php echo $_POST["email"];?></span>
                    </div>
                          
                      <div class="form-group col-md-6">
                 <label><strong>Location: </strong></label>
                    <span><?php echo $_POST["location"];?></span>
                    </div> 
                    
                    <div class="form-group col-md-6">
                        <!--  Posts information stored in street Line 2 variable, taken from index.php-->
                    <label><strong>Check In: </strong></label>
                    <span><?php echo $_POST["checkIn"];?></span>
                    </div>    
                          
                            <div class="form-group col-md-6">
                        <!--  Posts information stored in street Line 2 variable, taken from index.php-->
                    <label><strong>Check Out: </strong></label>
                    <span><?php echo $_POST["checkOut"];?></span>
                    </div>   
                          
                            <div class="form-group col-md-6">
                        <!--  Posts information stored in street Line 2 variable, taken from index.php-->
                    <label><strong>Total Price: </strong></label>
                    <span><?php echo '€'.$_POST["totalPrice"];?></span>
                    </div>   

                   
</div>
                </fieldset>

            </form>


<center> <i class="fas fa-check" id="checkmark"></i><br>
                <p>Thank you for booking a stay at our B&B. We look forward to meeting you, if you have any questions or would like to change your booking please don't hesitate to <a href="contact_form.php" style="color:black; text-decoration:underline"> contact us!</a></p></center>

<center>                	
<p>Please keep a copy of this page for your records, this is only a reservation. Payment is due on arrival at B&B</p></center>
<br>
<button onclick="myFunction()" class="btn btn-light home-button" style="color: white; text-decoration: none; font-family: 'KoHo', sans-serif;">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script><br>
                </div>
        

<?php include_once 'includes/footer.php';
?>
        </body>