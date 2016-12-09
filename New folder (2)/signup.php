<?php
	session_start();
	//connecting to database
	$db = mysqli_connect("localhost" , "root" ,"" , "mobilewebfinal");
	
	if (isset($_POST['register_btn'])){
		session_start();
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$phonenumber = mysql_real_escape_string($_POST['phonenumber']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password']);
		
		if ($password == $password2){
			//create user
			$password = md5($password);
			$sql = "INSERT INTO users(username, email,phonenumber,password) VALUE('$username' , '$email' , '$phonenumber' , '$password')";
			mysqli_query($db, $sql);
			$_SESSION ['message']= "You are now logged in";
			$_SESSION['username']= $username;
			header("location: login.php"); //redirecting to loogin page
		}else{
			$_SESSION ['message']= "The two passwords don't match";
			//fail
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ChurckLink</title>
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
    </head>
  <body>
	<div>
		<nav>
			<div class="navbar-wrapper container">
				<ul>
					<li><a href="index.php" class="brand-logo">Church Link</a></li>
				</ul>
				<ul class="right">
					<li><a href="login.php">Login</a> </li>
				</ul>
            </div>
        </nav>
     <!--div class ="header">
		<center><div class="brand-logo"><img src="logo.png"></div></center>
	</div-->
    </div><!--header-->
	        <div class="container" data-role="content" style="text-shadow: none">
            <div class="row">
                <div class="col s12 ">
                    <div class="card-panel">
                        <div class="row">
                            <form method ="post" action="signup.php">
								<table>
									<tr>
										<td>Username :</td>
										<td><input type="text" name="username" class="textInput"></td>
									</tr>									<tr>
										<td>Email:</td>
										<td><input type="email" name="email" class="textInput"></td>
									</tr>
									<tr>
										<td>Phone Number: </td>
										<td><input type="number" name="phonenumber" class="textInput"></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="password" name="password" class="textInput"></td>
									</tr>
									<tr>
										<td>Password Again</td>
										<td><input type="password" name="password2" class="textInput"></td>
									</tr>
									<tr>
										<td></td>
										<td><input type="submit" name="register_btn" value="Register"></td>
									</tr>
								</table>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--content-->
      <script>
			var userAgent = navigator.userAgent + '';
			if (userAgent.indexOf('iPhone') > -1) {
				document.write('<script src="js/lib/cordova-iphone.js"></sc' + 'ript>');
				var mobile_system = 'iphone';
			} else if (userAgent.indexOf('Android') > -1) {
				document.write('<script src="js/lib/cordova-android.js"></sc' + 'ript>');
				var mobile_system = 'android';
			} else {
				var mobile_system = '';
			}
		</script>

  </body>
</html>