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
						<li><a><h4><b>welcome <?php echo $_SESSION["username"].","; ?></b></h4></a></li>
						<li><a href="main.php"><h3><b>Home</b></h3></a></li>
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
<div><h3 class="col-md-offset-3">Reset Password</h3>
</div>


<!--login-->
<div class="container col-md-offset-2">
		<div class="login">
			<form method="post">
			<div class="col-md-6 login-do">
			<div class="login-mail">
					<input type="password" placeholder="previous password" required="" name="prepass">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				
				<div class="login-mail">
					<input type="password" placeholder="new password" required="" name="newpass">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				
				<div class="login-mail">
					<input type="password" placeholder="re-enter new password" required="" name="newpass2">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				
				<label class="hvr-skew-backward">
					<input type="submit" value="submit" name="sub">
				</label>
			
			</div>
			<div class="clearfix"> </div>
			</form>
		</div>

</div>

<?php
if(isset($_POST['sub'])) {
        onFunc();
}
function onFunc()
{
	$_SESSION['result']="";
	$prepass=$newpass=$newpass2="";

	$prepass=$_POST["prepass"];
	$newpass=$_POST["newpass"];
	$newpass2=$_POST["newpass2"];

	if($prepass!=$newpass)
	{
		if($newpass==$newpass2)
		{
		$con=mysql_connect("localhost","root","")or die("error");
		mysql_select_db("ecom");
		$id=$_SESSION['email'];
		$sql = "UPDATE user_data SET userpass=$newpass where userpass='$prepass' AND userid='$id'";
		$result = mysql_query($sql) ;
		if($result==TRUE)
		{
			$_SESSION['result']="Password Successfully Changed.";
		}
		}
		else
		{
			$_SESSION['result']="New Passwords doesn't Match.";
		}
	}
	else
	{
		$_SESSION['result']="New Password cannot be same as previous password.";
	}	
}
unset($_POST);
?>
<h3 class='col-md-offset-5'><?php echo $_SESSION['result'];$_SESSION['result']="";?></h3>
<!--//login-->
</body>
</html>