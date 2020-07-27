
<!DOCTYPE html>
<html>
   <html>
    <head>
        <meta charset="UTF-8">
        <title>Contact us</title>
        <link rel="icon" href="images/logo2.png" type="image" >
          <link href="css/nav_css.css" rel="stylesheet" type="text/css"/>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
         <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Muli:100,300" rel="style">
	<link href="https://fonts.googleapis.com/css?family=Celtic+Hand:300" rel="style">
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
        <link href="css/footercss.css" rel="stylesheet" type="text/css"/>
<?php include_once 'includes/cdn.php';?>
       
    </head>

<body>
	<?php include_once 'includes/header.php';
	?> 

	<section id="contact">
	    <div class="container">
		<div class="well well-sm">
		    <header class="section-header">
                        <center><h2 style="font-family: 'KoHo', sans-serif; color:#592724;" >Get in Touch</h2></center>
			
		    </header>


		    <br>
		</div>
		<br>
		<br>
		<div class="row">
		    <div class="col-md-7">
                  
			<div style="width: 100%"><iframe width="100%" height="600" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9609.44323479979!2d-6.041754760434871!3d52.9779120986533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4867b732a3ac6d6b%3A0x1e1c0bc39de7e2d4!2sCorporation+Lands%2C+Wicklow!5e0!3m2!1sen!2sie!4v1541498160699" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google map generator</a></iframe></div><br />
		    </div>

		    <div class="col-md-5">

                        <form id="contact-form" method="post" action="contact_query.php">
			    <br>
			    <br>
			    <div class="form-group">
				<input type="text" class="form-control input-form" name="firstName" value="" placeholder="First Name">
			    </div>
			    <br>
			     <div class="form-group">
				<input type="text" class="form-control input-form" name="lastName" value="" placeholder="Second Name">
			    </div>
			    <br>
			    <div class="form-group">
				<input type="email" class="form-control" name="email" value="" placeholder="E-mail">
			    </div>
			    <br>
			    <div class="form-group">
				<input type="tel" class="form-control" name="phone" value="" placeholder="Phone">
			    </div>
			    <br>
			    <div class="form-group">
				<textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
			    </div>
			    
			    

			    
				<button class="btn btn-outline-secondary" type="submit">Send</button>
			    
			</form>
		    </div>
                    
                </div>
            </div>
        </section>
    <?php include_once 'includes/footer.php';
	?> 

</body>
</html>