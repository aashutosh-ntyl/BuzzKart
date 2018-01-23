<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>BuzzKart - a Ecommerce Website</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />	
<link href="css/bstyle.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->

</head>
<body>

<div class="header-top">
		<div class="container">
				
			<div class="header-login">		
					<ul >
						<li><a href="index.php"><h3><b>Home</b></h3></a></li>
					</ul>
					
			</div>
				<div class="clearfix"> </div>
		</div>
		</div>	
		
		 
 
   <!-- Collect the nav links, forms, and other content for toggling -->
  

</nav>
			</div>
			<!----->
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>
<img class="col-md-offset-0" src="images/back1.jpg" alt="">
<div><h3 class="col-md-offset-5">Login and Shop</h3>
</div>


<!--login-->
<div class="container">
		<div class="login">
		
			<form method="post" >
					<div class="col-md-6 login-do">
					<h3 class="col-md-offset-4">Existing User ??</h3>
					<label class="line"></label>
					<div class="login-mail">
					<input type="text" placeholder="Email" required="" name="email"/>
					<i  class="glyphicon glyphicon-envelope"></i>
					</div>
					<div class="login-mail">
					<input type="password" placeholder="Password" required="" name="password"/>
					<i class="glyphicon glyphicon-lock"></i>
					</div>
					<label class="hvr-skew-backward">
					<input type="submit" value="login" name="log"/>
					</label>
					<a href="fp.php" class=" hvr-skew-backward col-md-offset-4">Forgot Password</a>
					</div>
					
					<div class="col-md-6 login-do">
					<h3 class="col-md-offset-4">New User ??</h3>
					<label class="line"></label>
					<a href="register.php" class=" hvr-skew-backward col-md-offset-4">Register</a>
					</div>
			<div class="clearfix"> </div>
			</form>
		</div>

</div>

<!--//login-->

<?php
if(isset($_SESSION['result']))
	{
		echo "<h3 class='col-md-offset-4'>".$_SESSION['result']."</h3>";
		unset($_SESSION['result']);
	}
	if(isset($_POST['log'])) {
        onFunc();
    }
	function onFunc()
	{
	$con=mysql_connect("localhost","root","")or die("error");
	mysql_select_db("ecom");
	$num=$_POST['email'];
	$sql = "SELECT * FROM user_data where userid='$num';";
	$result = mysql_query($sql) ;
	if($result==FALSE)
	{
		die(mysql_error());
	}
	
	
	$row = mysql_fetch_array($result);
	if ($row==null)
		echo "<h3 class='col-md-offset-4'>Email is not registered.Please Register First.</h3>";
	else
	{
	$num=$_POST["password"];
	if($num==$row["userpass"])
		{
			$_SESSION['username']=$row["username"];
			$_SESSION['email']=$row["userid"];
			header("Location:main.php");
		}
	
	else
		echo "<h3 class='col-md-offset-4'>Password is wrong</h3>";
	}
	mysql_close();
	}
?>

</body>
</html>
