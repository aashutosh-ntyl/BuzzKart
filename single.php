<?php 
session_start();
$_SESSION['r']="";
qwe();
function qwe()
{
$con=mysql_connect("localhost","root","")or die("error");
mysql_select_db("ecom");
$id=$_POST["product_id"];
$sql = "SELECT * FROM product_info where product_id='$id';";
$result = mysql_query($sql) ;
if($result==FALSE)
{
	die(mysql_error());
}
else
	$row=mysql_fetch_array($result);

?>
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
						echo "<li><a href='cart.php'  ><h5>Cart</h5></a></li>";
						echo "<li><a href='Logout.php'  ><h5>Logout</h5></a></li>";
						}
						else
						{
						echo "<li><a href='login.php' ><h5>Login</h5></a></li>";
						echo "<li><a href='register.php'  ><h5>Register</h5></a></li>";
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
<img class="col-md-offset-0" src="images/back.jpg" alt="">
<div class="single">

<div class="container">
  <div class="col-md-9">
	<div class="col-md-5 grid">		
			    <?php 
				echo "<li data-thumb='".$row['product_clip']."'>";
			    echo "<div class='thumb-image'> <img src='".$row['product_clip']."' class='img-responsive'> </div>";
				?>
			    </li>
	</div>	
		<div class="col-md-7 single-top-in">
			<div class="span_2_of_a1 simpleCart_shelfItem">
				<?php 
				echo "<h3>".$row['product_name']."</h3>";
				echo "<p class='in-para'> ".$row['product_comp']."</p>";
			    echo "<div class='price_single'>";
				echo "<span class='reducedfrom item_price'>Rs.".$row['product_cost']."</span>"; }?>
				<div class="clearfix"></div>
			</div>
			<?php	 
			if($_SESSION['username']!="guest")
			{
			echo "<form method='post' action='single.php'>";
			echo "<input type='hidden' value='".$_POST['product_id']."' name='product_id' />";
			echo "<input type='submit' class='add-to item_add hvr-skew-backward' name='cart' value='Add to Cart'/>";
			echo "</form>";
			}
			?>
<?php
	if(isset($_POST['cart'])) 
	{
		$con=mysql_connect("localhost","root","")or die("error");
		mysql_select_db("ecom");
		$sql = "SELECT * FROM cart_info WHERE pid=".$_POST['product_id']." and user_id='".$_SESSION['email']."'";
		$result = mysql_query($sql);
		if(mysql_num_rows($result)==0)
		{
			$sql = "INSERT INTO cart_info values (".$_POST['product_id'].",'".$_SESSION['email']."')";
			$result = mysql_query($sql) ;
			echo "<h2><b>Item added Succesfully!!</b></h2>";
		}
		else
		{
			echo "<h2><b>Item Already in Cart!!</b></h2>";
		}
	}
	mysql_close();
?>
			
			<div class="clearfix"> </div>
		</div>
		
					</div>
			<div class="clearfix"> </div>
			<!---->
			<div class="tab-head">
			 <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li> 
		</ul>
	</nav>
		<div class="tab-content one">
		<div class="tab-pane active text-style" id="tab1">
		<div class="facts">
			<p >This is Product's description Part where one can specify the details about the above mentioned product in brief.Details May contain color ,power consumption details, company details, warranty details. Description may also contain deescription of product's features.</p>								        
		</div>
		</div>

		

  
  </div>
  <div class="clearfix"></div>
  </div>
			<!---->	
</div>
<!----->

			<!--brand-->
		<div class="container">
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
	</div>	
			</div>
			<!--//brand-->
			</div>
			
		</div>
	<!--//content-->

</script>
</body>
</html>