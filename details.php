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
		<div id="details_page">
			
		
		<div id="headline">
			<div id="headline_content">
			<b>welcome guest!</b>
			<b style="color:yellow;">shopping cart</b>
			<span>- items: -Price:</span>
				
				
				</div>
			  </div>
		<div id="products_box">
			
		<?php 
			
		if(isset($_GET['pro_id'])){
		$product_id=$_GET['pro_id'];
		$get_products="select  *from products where product_id='$product_id'";
  
$run_products= mysqli_query($db, $get_products);
		
while($row_products=mysqli_fetch_array($run_products)){
				
	  $pro_id=$row_products['product_id'];
      $pro_title=$row_products['product_title'];
	  $pro_cat=$row_products['cat_id'];
	  $pro_brand=$row_products['brand_id'];	
 $pro_desc=$row_products['product_description'];
	  $pro_price=$row_products['product_price'];
	  $pro_image1=$row_products['product_img1']; 
	  $pro_image2=$row_products['product_img2']; 
	  $pro_image3=$row_products['product_img3']; 
	
		echo "
		  <div id='single_product'>
		  
		 <h3>$pro_title</h3>
		  
		  <img src='admin_area/product_images/$pro_image1' width='auto' height='200'/>
		  
		   <img src='admin_area/product_images/$pro_image2' width='auto' height='200'/>
		   
		    <img src='admin_area/product_images/$pro_image3' width='auto' height='200'/><br>
		  
		 <p><b>price: INR $pro_price</b></p>
		  <p>$pro_desc</p>
        
			<a href='index.php?add_cart=$pro_id'><buttom style='float:left;'>go back</button></a>

		  <a href='index.php?add_cart=$pro_id'><buttom style='float:right;'>add to cart</button></a>		  
		  </div>
		  ";

	}
		}
					
			
			
			
		?>	
		</div>
		
		
		
		
		
		</div>
			
			
	</div>
	
		
	<div class="footer">
	
	<h1 style="color:#000; padding-top:20px; text-align:center">&copy; 2017-by xahoor_bhat</h1>
	</div>
		
		
		
		
	
	</div>
	<!--main cointainer status-->
</body>
</html>