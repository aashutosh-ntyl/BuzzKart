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
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<!--header-->
<div class="header">
<div class="container col-md-offset-0">
		<div class="head">
			<div class=" logo">
				<a href='main.php'><img src='images/logo2.jpg' alt=''></a>
			</div>
		</div>
	</div>
	<div class="header-top">
		<div class="container">	
			<div class="col-sm-5 col-md-offset-0 header-login">		
					<ul >
						<li><a><h4><b>welcome <?php echo $_SESSION['username']; ?></b></h4></a></li>
					</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>	
</div>	
<?php
		$con=mysql_connect("localhost","root","")or die("error");
		mysql_select_db("ecom");
			$sql = "SELECT * FROM product_info where product_id=".$_POST['pid'].";";
			$result2= mysql_query($sql) ;
			if($result2==FALSE)
			{
				die(mysql_error());
			}
			$row2 = mysql_fetch_array($result2);
			echo "<div class='container col-md-offset-1'>";
			echo "<table>";
			echo "<tr>";
			echo "<th>Item</th>";		
			echo "<th>ID</th>";
			echo "<th>Delivery </th>";
			echo "<th>SubTotal</th>";
			echo "<th>Quantity</th>";
			echo "<th>Total</th>";
			echo "</tr>";
			echo "<tr class='cart-header'>";
			echo "<td class='ring-in'><a class='at-in'><img src=".$row2['product_clip']." class='img-responsive' alt=''></a>";
			echo "<div class='sed'>";
			echo "<h5><a>".$row2['product_name']."</a></h5>";
			echo "<p>".$row2['product_comp']."</p>";
			echo "</div>";
			echo "<div class='clearfix'> </div>";
			echo "<td>".$row2['product_id']."</td>";
			echo "<td>Rs.400</td>";
			echo "<td class='item_price'>Rs.".$row2['product_cost']."</td>";
			echo "<td>".$_POST['quan']."</td>";
			$q=(int)$_POST['quan'];
			$st=$row2['product_cost']*$q;
			$t=400+$st;
			echo "<td class='item_price'>Rs.$t</td>";
			echo "</tr>";
			$result2=null;
?>		  
	</table>
	</div>
<!--//login-->
<h3 class='col-md-offset-2'><b> Shipping Details </b></h3>
	<div class="col-md-offset-2">
		<label></label>
			<form method="post" action="#">
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
					<input type="text" placeholder="Hno/Street/Colony" required="" name="add1">
					<i  class="glyphicon glyphicon-envelope"></i>
					<input type="text" placeholder="City" required="" name="add2">
					<i  class="glyphicon glyphicon-envelope"></i>
					<input type="text" placeholder="State" required="" name="add3">
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				
				<div class="login-mail">
					<input type="text" placeholder="pincode" required="" name="pin">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<label class="hvr-skew-backward">
					<input type="submit" value="Proceed To Pay" name="proceed">
				</label>
			
			</div>
			</form>
		</div>

</div>
	
	
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