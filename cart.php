<?php
include("includes/db.php");
include("functions/functions.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MY SHOP</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
	
<body>
	
	<!--main cointainer status-->
	<div class="main_wrapper">
	
	<!--header starts-->
	<div class="header_wrapper">
<a href="index.php"><img src="images/image2.png" style="float:left"></a>
 <img src="images/kashmir_mall.giF" style="float:right">
	</div>
	<!--header ends-->
		
	<!--navagation bar starts-->
	<div id="navbar">
	
	<ul id="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="all_products.php">All products</a></li>
	<li><a href="my_account.php">My account</a></li>
	<li><a href="user_register.php">sign up</a></li>
	<li><a href="cart.php">shoping cart</a></li>
	<li><a href="contact.php">contact us</a></li>
	
     </ul>
	 
	 <div id="form">
	    <form method="get" action="result.php" enctype="multipart/form-data">
		
        <input type="text" name="user_query" placeholder="search a product"/>
		<input type="submit" name="search" value="search"/>
      
	  </form>		
	 </div>
   </div>
   <!--navagation bar ends-->
	
	<div class="content_wrapper">
		
		<div id="left_sidebar">
			
		<div id="sidebar_title">category</div>
		
            <ul id="cats">

			 <?php getcats(); ?>
		</ul>
			
			<div id="sidebar_title">brands</div>
			<ul id="cats">
		   <?php getbrands(); ?>
		
		
		</ul>
			
			</div>
		<div id="right_content">
			<?php cart();?>
		
		<div id="headline">
			<div id="headline_content">
			<b>welcome guest!</b>
			<b style="color:yellow;">shopping cart</b>
			<span>- total items: <?php items(); ?> - total Price:<?php total_price();?></span>
				
				
				</div>
			  </div>
		<div id="products_box">
		<form action="cart.php" method="post" enctyp="multipart/form-data">
			<table width="700" align="center" bgcolor="#0099cc;">
				
			<tr align="center">
				<td>Remove</td>
				<td>products(s)</td>
				<td>quantity</td>
				<td>total price</td>
			</tr>
			<?php
			$ip_add=getRealIpAddr();
	$total=0;
	$sel_price= "select *from cart where ip_add='$ip_add'";
	$run_price=mysqli_query($db,$sel_price);
	while($record=mysqli_fetch_array($run_price)){
		
		$pro_id=$record['p_id'];
		$pro_price="select *from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		while($p_price=mysqli_fetch_array($run_pro_price)){
			
			$product_price=array($p_price['product_price']);
			$product_title=$p_price['product_title'];
			$product_image=$p_price['product_img1'];
			$only_price=$p_price['product_price'];                                                                                     
			
		$value=array_sum($product_price);
			$total+=$value;
	

	
	

	?>

	
			<tr>
			    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
				<td><?php echo $product_title;?><br><img src="admin_area/product_images/<?php echo $product_image;?>" height="80" width="80"></td>
			    <td><input type="text" name="qty" value"1" size="2"/></td>
				<?php
				   if(isset($_POST['update']))
				   {
					   $qty=$_POST['qty'];
					   $insert_qty="update cart set qty='$qty' where ip_add='$ip_add'";
					   $run_qty=mysqli_query($con, $insert_qty);
					   $total=$total*$qty;
					   
				   }
				
				
				?>
			    <td><?php echo $only_price;?></td>
			</tr>
		<?php }}?>
				<tr>
				<td colspan="3" align="right"><b>sub total:</b></td>
				<td><b><?php echo $total;?></td>
				</tr>
				<tr align="center">
				<td colspan="2"><input type ="submit" name="update" value="update cart"/></td>
				<td><input type="submit" name="continue" value="continue shopping" /></td>
				<td><button><a href="checkout.php" style="text-decoration: none; color: #000;">checkout</a></button></td>
				</tr>
				
			</table>
			
			</form>
 <?php
			
	function updatecart()		
	{
		global $con;
if(isset($_POST['update']))
{
	foreach($_POST['remove'] as $removie_id)
	{
		$delete_products="delete from cart where p_id='$removie_id'";
		$run_delete=mysqli_query($con,$delete_products);
		if($run_delete)
		{
			echo"<script>window.open('cart.php','_self')</script>";
			
		}
		
		
	}
	
	
}

if(isset($_POST['continue']))
{
	
	echo"<script>window.open('index.php','_self')</script>";
	
}
			}
echo @ $up_cart= updatecart();
			
			?>
			
				
		
		</div>
		
		
		
		
		
		</div>
			
			
	content area</div>
	
		
	<div class="footer">
	
	<h1 style="color:#000; padding-top:20px; text-align:center">&copy; 2017-by xahoor_bhat</h1>
	</div>
		
		
		
		
	
	</div>
	<!--main cointainer status-->
</body>
</html>