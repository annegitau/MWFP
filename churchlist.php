<?php
	session_start();
	//connecting to database
	$db = mysqli_connect("localhost" , "root" ,"" , "mobilewebfinal");
	
	if (isset($_POST['register_btn'])){
		$id = mysql_real_escape_string($_POST['Id']);
		$church = mysql_real_escape_string($_POST['Church']);
		$location = mysql_real_escape_string($_POST['Location']);
		$phonenumber = mysql_real_escape_string($_POST['Contact']);
        $sql = "INSERT INTO church(Id,Church,Location,Contact,) VALUES($id,$church,$location,$phonenumber)";
        $results = mysql_query("SELECT * FROM church");
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
					<li class="brand-logo">Church Link</li>
				</ul>
				<ul class="right">
					<li><a href="logout.php">Logout</a> </li>
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
                            <table>
                                <thead>
                                    <th>Id</th>
                                    <th>Church</th>
                                    <th>Location</th>
                                    <th>Contact</th>
                                    <th>Rate Service</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> Christ Grace Power Ministry </td>
                                        <td> Oyarifa </td>
                                        <td> +233244335364 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 2 </td>
                                        <td> 
Presbyterian Church Of Ghana</td>
                                        <td> pantang </td>
                                        <td> +233269876576 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 3 </td>
                                        <td> king's dominion chapel int'l </td>
                                        <td> pantang </td>
                                        <td> +233548757364 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 4 </td>
                                        <td> 
ICGC Holy Ghost Temple </td>
                                        <td> Adenta </td>
                                        <td> +233207584736 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 4 </td>
                                        <td> 
Victory Presbyterian Church,  </td>
                                        <td> Adentan-Fafraha </td>
                                        <td> +233572937485 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 6 </td>
                                        <td> HighCity Church - Fire Chapel </td>
                                        <td> Ashongman </td>
                                        <td> +233506878695 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 6 </td>
                                        <td>Atomic Hills Presbyterian Church </td>
                                        <td> Estate </td>
                                        <td> +233268958374 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 8 </td>
                                        <td> 
PCG-Shalom Congregation</td>
                                        <td> Haatso </td>
                                        <td> +233547685846 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 9 </td>
                                        <td> 
Headquarters of Christ</td>
                                        <td> Haatso </td>
                                        <td> +233578574637 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 10 </td>
                                        <td> HighCity Church - Sandra Chapel </td>
                                        <td> Agbogba </td>
                                        <td> +233268978654 </td>
                                        <td>  </td>
                                    </tr>
                                    <tr>
                                        <td> 11 </td>
                                        <td>
Adenta Estates Worship Centre - The Church of Pentecost </td>
                                        <td> Adenta </td>
                                        <td> +233248675647 </td>
                                        <td>  </td>
                                    </tr>
                                
                            </tbody>
                            
                        </table>
                            
                            
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