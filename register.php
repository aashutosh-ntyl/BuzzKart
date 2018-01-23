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
		</div>
			<!----->
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>
<img class="col-md-offset-0" src="images/back1.jpg" alt="">
<div><h3 class="col-md-offset-3">Register and Shop</h3>
</div>


<!--login-->
<div class="container col-md-offset-2">
		<div class="login">
			<form method="post">
			<div class="col-md-6 login-do">
			<div class="login-mail">
					<input type="text" placeholder="Name" required="" name="name">
					<i  class="glyphicon glyphicon-user"></i>
				</div>
				
				<div class="login-mail">
					<input type="text" placeholder="Phone Number" required="" name="pno">
					<i  class="glyphicon glyphicon-phone"></i>
				</div>
				
				<div class="login-mail">
					<input type="text" placeholder="Email" required="" name="email">
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				
				<div class="login-mail">
					<input type="password" placeholder="Password" required="" name="pass">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				
				<label class="hvr-skew-backward">
					<input type="submit" value="Register" name="reg">
				</label>
			
			</div>
			<div class="clearfix"> </div>
			</form>
		</div>

</div>

<?php
if(isset($_POST['reg'])) {
        onFunc();
}
function onFunc()
{
	$name=$email=$pno=$pass=$emailerr=$nerr=$perr="";
	$con=mysql_connect("localhost","root","")or die("error");
	mysql_select_db("ecom");

	$email = htmlspecialchars($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		$emailerr = "Invalid email format";
	}
	else
	{
		$sql = "SELECT * FROM user_data where userid='$email';";
		$result = mysql_query($sql) ;
		if(mysql_num_rows($result)==1)
			$emailerr="Email already registered.";
	}

	$name=$_POST['name'];
	$match_n=preg_match("/^[a-zA-Z ]*$/",$name);
	if($match_n==0)
		$nerr="Name can only have Alphabets";
	
	$pno=$_POST['pno'];
	$match_p=preg_match("/^[0-9]{10}$/",$pno);
	if($match_p==0)
		$perr="Phone number is of 10 digits";
	
	echo "<h3>$emailerr.$nerr.$perr</h3>";

	if(($match_p==1)&&($emailerr=="")&&($match_n=1))
	{
		$emailerr="";
		$pass=$_POST['pass'];
		$sql = "INSERT INTO user_data values ('$name','".$_POST['email']."','$pass',$pno)";
		$result = mysql_query($sql) ;
		if($result==true)
		{	
			$_SESSION['result']="User Succesfully Registered.";
			header('Location:login.php');
		}
	}
}
?>
<!--//login-->
</body>
</html>