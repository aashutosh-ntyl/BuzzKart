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
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<!--header-->
<div class="header">
<div class="container">
		<div class="head">
			<div class=" logo">
				<?php
						if($_SESSION['username']!="guest")
						{
						echo "<a href='main.php'><img src='images/logo.jpg' alt=''></a>";
						}
						else
						{
						echo "<a href='index.php'><img src='images/logo.jpg' alt=''></a>";
						}
						?>
			</div>
		</div>
	</div>
<div class="header-top">
		<div class="container">
				
			<div class="col-sm-5 col-md-offset-8 header-login">		
					<ul >
						<li><a><h4><b>welcome <?php echo $_SESSION["username"].","; ?></b></h4></a></li>
						<?php
						if($_SESSION['username']!="guest")
						{
						echo "<li><a href='cart.php' ><h5>Cart</h5></a></li>";
						echo "<li><a href='Logout.php' ><h5>Logout</h5></a></li>";
						}
						else
						{
						echo "<li><a href='login.php' ><h5>Login</h5></a></li>";
						echo "<li><a href='register.php' ><h5>Register</h5></a></li>";
						}
						?>
					</ul>
			</div>
				<div class="clearfix"> </div>
		</div>
		</div>
		
		<div class="container">
		
			<div class="head-top">
			
		 
 
   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse col-md-offset-3" >
        <ul class="nav navbar-nav nav_1">
            <?php 
			if($_SESSION['username']!="guest"){ echo "<li><a class='color' href='main.php'>Home</a></li>";}
			else {echo "<li><a class='color' href='index.php'>Home</a></li>";}
			?>  
			<li><a class="color" href="ka.php">Kitchen Appliance</a></li>
			<li><a class="color" href="pa.php">Personal Appliances</a></li>
			<li><a class="color" href="ua.php">More Home Appliances</a></li>
			<?php 
			if($_SESSION['username']!="guest")
			{
				echo "<li><a href='cp.php'>Change Password</a></li>";
			}
			?>
        </ul>
     </div><!-- /.navbar-collapse -->
			</div>
			</div>				
			</div>		
						<!----->
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>
<!--banner-->
<img class="col-md-offset-2" src="images/ua.jpg" alt="">
<!--//products-->
<div class="content">
<div class="container">
<div class="content-mid">
<h3>Other Home Appliances</h3>
<label class="line"></label>	
<?php
sql();
function sql()
{
$con=mysql_connect("localhost","root","")or die("error");
mysql_select_db("ecom");
$sql = "SELECT * FROM product_info where product_type='utility';";
$result = mysql_query($sql) ;
if($result==FALSE)
{
	die(mysql_error());
}
while($row = mysql_fetch_array($result))
{
echo						"<div class='col-md-3 item-grid simpleCart_shelfItem'>";
echo						"<div class=' mid-pop'>";
echo						"<div class='pro-img'>";
echo						"<img src='".$row['product_clip']."' class='img-responsive' alt=''>";
echo						"</div>";
echo						"<div class='mid-1'>";
echo						"<span>".$row['product_comp']."</span>";
echo						"<h6><a>".$row['product_name']."</a></h6>";
echo						"</div>";
echo						"<div class='mid-2'>";
echo						"<p><em class='item_price'>Rs.".$row['product_cost']."</em></p>";
echo						"<div class='block'>";									
echo						"</div>";
echo						"<div class='img item-add'>";
echo						"<form method='post' action='single.php'>";
echo						"<input type='hidden' value='".$row['product_id']."' name='product_id' />";
echo						"<input type='submit'  value='About/ADDtoCART' name='info'/>";
echo						"</form>";
echo						"</div>";
echo						"<div class='clearfix'></div>";
echo						"</div>";
echo						"<div class='clearfix'></div>";
echo						"</div>";
echo						"</div>";
}
mysql_close();
}
?>
<div class="clearfix"></div>
</div>
</div>
</div>	
<!--brand-->
			
			<!--//brand-->
			</div>
			
		</div>
	<!--//content-->
	<!--//footer-->
	<div class="footer">
	<div class="brand">
				<div class="col-md-3 brand-grid">
					<img src="images/ic.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic1.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic2.jpg" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic3.jpg" class="img-responsive" alt="">
				</div>
				<div class="clearfix"></div>
			</div>
	</div>	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

</body>
</html>