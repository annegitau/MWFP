<?php
	session_start();
	//connecting to database
	$db = mysqli_connect("localhost" , "root" ,"" , "mobilewebfinal");
	
	if (isset($_POST['login_btn'])){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		
		$password = md5($password);
		$sql ="SELECT * FROM users WHERE username='$username' AND password= '$password'";
		$result = mysqli_query($db, $sql);
		
		if(mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "you are now logged in";
			$_SESSION['username'] = $username;
			header ("location: home.php");
		}else{
			$_SESSION['message'] = "Username/Password combition incorrect";
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Place searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<meta name="format-detection" content="telephone=no">
		<meta name="msapplication-tap-highlight" content="no">
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

		<!-- Path to your custom app styles-->
		<link rel="stylesheet"  href="css/jquery.mobile.structure.css" />
		<link rel="stylesheet" href="css/jquery.mobile.theme.css" />
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
            
		<script src="scripts/jquery.js"></script>
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="scripts/platformOverrides.js"></script>
        <script type="text/javascript" src="scripts/index.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript"src="js/materialize.min.js"></script>
		<!-- your scripts here -->
		
		<script src="scripts/jquery.mobile.js"></script>
        
		
        <title>CakieLink</title>
        
    </head>
  <body>
	<div>
		<nav>
			<div class="navbar-wrapper container">
				<ul class="left">
					<li><a href="index.php" class="brand-logo">CakieLink</a></li>
				</ul>
				<ul class="right">
					<li><a href="signup.php">Sign Up</a> </li>
				</ul>
            </div>
        </nav>
	<div class ="header">
		<center><div class="brand-logo"><img src="logo.png"></div></center>
	</div>
	<?php 
			if (isset($_SESSION['message'])){
				echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}
		?>
    </div><!--header-->
	<div class="container" data-role="content" style="text-shadow: none">
            <div class="row">
                <div class="col s12 ">
                    <div class="card-panel">
                        <div class="row">
                             <form method ="post" action="home.php">
								<table>
									<tr>
										<td>Username :</td>
										<td><input type="text" name="username" class="textInput"></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="password" name="password" class="textInput"></td>
									</tr>
									<tr>
										<td></td>
										<td><input type="submit" name="login_btn" value="Login"></td>
									</tr>
								</table>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--content-->	        			
  </body>
</html>