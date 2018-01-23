<!DOCTYPE html>
<?php 
session_start();
$_SESSION["username"]="guest";
?>
<html>
<head>
<title>BuzzKart - a Ecommerce Website</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->


</head>
<body>
<!--header-->
<div class="header">
<div class="container">
		<div class="head">
			<div class=" logo">
				<a href="index.php"><img src="images/logo.jpg" alt=""></a>	
			</div>
		</div>
	</div>
	
			<div class="header-top">
			<div class="container">	
			<div class="col-sm-5 col-md-offset-8 header-login">		
					<ul >
						<li><a><h4><b>welcome <?php echo $_SESSION["username"].","; ?></b></h4></a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
					</ul>
			</div>
			<div class="clearfix"> </div>
			</div>
			</div>
			<div class="clearfix"> </div>
			</div>
			</div>
		 
 
   <!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse col-md-offset-3" >
        <ul class="nav navbar-nav nav_1">
			<li><a class="color" href="ka.php">Kitchen Appliance</a></li>
			<li><a class="color" href="pa.php">Personal Appliances</a></li>
			<li><a class="color" href="ua.php">More Home Appliances</a></li>
        </ul>
    </div>
		
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>
<!--banner-->
<div class="banner">
<div class="container">
<section class="rw-wrapper">
				<h1 class="rw-sentence">
					<span>Buzz Kart</span>
					
				</h1>
</section>
			</div>
</div>
				<!--products-->
		
				<div class="content">
				<div class="container">
				<div class="content-mid">
				<h3>Trending Items</h3>
				<label class="line"></label>	
<?php
sql();
function sql()
{
$con=mysql_connect("localhost","root","")or die("error");
mysql_select_db("ecom");
$sql = "SELECT * FROM product_info;";
$result = mysql_query($sql) ;
if($result==FALSE)
{
	die(mysql_error());
}
$i=1;
while(($row = mysql_fetch_array($result))&&($i<=12))
{
$i=$i+1;
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
echo						"<p ><em class='item_price'>Rs.".$row['product_cost']."</em></p>";
echo						"<div class='block'>";									
echo						"</div>";
echo						"<div class='img item-add'>";
echo						"<form method='post' action='single.php'>";
echo						"<input type='hidden' value='".$row['product_id']."' name='product_id' />";
echo						"<input type='submit' value='About/ADDtoCART' name='info'/>";
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
	<!--//brand-->
	<!--//content-->
	<!--//footer-->
	<div class="footer">
	</div>

</body>
</html>