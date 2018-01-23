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
						<li><a href="cart.php"  ><h5>Cart</h5></a></li>
						<li><a href="Logout.php"  ><h5>Logout</h5></a></li>
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
            <li><a class="color" href="main.php">Home</a></li>
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
<img class="col-md-offset-1" src="images/cart.jpg" alt="">


<?php
		$con=mysql_connect("localhost","root","")or die("error");
		mysql_select_db("ecom");
		$id=$_SESSION['email'];
		$sql = "SELECT pid FROM cart_info where user_id='$id';";
		$result = mysql_query($sql) ;
		if(mysql_num_rows($result)==0)
		{
			echo	"<h1 class='col-md-offset-5'> Cart is Empty </h1>";
		}
		else
		{
			echo "<h1 class='col-md-offset-5'> Your Cart </h1>";
			echo "<div class='container'>";
			echo "<table>";
			echo "<tr>";
			echo "<th class='table-grid'>Item</th>";		
			echo "<th>ID</th>";
			echo "<th>Delivery </th>";
			echo "<th>Subtotal</th>";
			echo "<th>Quantity</th>";
			echo "</tr>";
		while($row = mysql_fetch_array($result))
		{
			$sql = "SELECT * FROM product_info where product_id=".$row['pid'].";";
			$result2= mysql_query($sql) ;
			if($result2==FALSE)
			{
				die(mysql_error());
			}
			$row2 = mysql_fetch_array($result2);
			
			echo "<tr class='cart-header'>";
			echo "<td class='ring-in'><a href='single.html' class='at-in'><img src=".$row2['product_clip']." class='img-responsive' alt=''></a>";
			echo "<div class='sed'>";
			echo "<h5><a>".$row2['product_name']."</a></h5>";
			echo "<p>".$row2['product_comp']."</p>";
			echo "</div>";
			echo "<div class='clearfix'> </div>";
			echo "<td>".$row2['product_id']."</td>";
			echo "<td>NO FREE SHIPPING</td>";
			echo "<td class='item_price'>Rs.".$row2['product_cost']."</td>";
			echo "<td><form method='post' action='buy.php'>";
			echo "<select name='quan'>";
			echo "<option value='1' selected>1</option>";
			echo "<option value='2'>2</option>";
			echo "<option value='3'>3</option></select></td>";
			echo "<td><input type='hidden' name='pid' value='".$row2['product_id']."'/><input type='submit' class='hvr-skew-backward' name='buy' value='Buy'/></form>";
			echo "<form method='post'><input type='submit' class='hvr-skew-backward' name='remove' value='Remove'/><input type='hidden' name='pid' value='".$row2['product_id']."'/></form></td>";
			echo "</tr>";
			$result2=null;
		}
		}
?>		  
	</table>
	</div>
<?php
if(isset($_POST['remove']))
{
		$pid=$_POST['pid'];
		$sql = "DELETE FROM cart_info where pid='$pid' AND user_id='$id';";
		if(mysql_query($sql))
			header('Refresh:0');
}
?>
<!--//login-->
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