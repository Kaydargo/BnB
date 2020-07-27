<?php
include("loginServ.php");
include 'includes/header.php';
?>
 
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<?php include_once 'includes/cdn.php';?>
          <link href="css/nav_css.css" rel="stylesheet" type="text/css"/>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
         <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
         <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Muli:100,300" rel="style">
	<link href="https://fonts.googleapis.com/css?family=Celtic+Hand:300" rel="style">
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
        <link href="css/footercss.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div class="login">
<h1 align="center">Login</h1>
<form action="" method="post" style="text-align:center;">
<input type="text" placeholder="Username" id="username" name="username"><br/><br/>
<input type="password" placeholder="Password" id="userpass" name="userpass"><br/><br/>
<input type="submit" value="Login" name="submit">
</div>
    <br><br><br><br>
<!-- Error Message -->
<span><?php echo $error; ?></span>

</body>
<?php include 'includes/footer.php'; ?>
</html>