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
			<span>- total items: <?php items(); ?> - total Price:<?php total_price();?>- <a href="cart.php" style="color: #ff0;">Go to cart</a></span>
				
				
				</div>
			  </div>
		<div id="products_box">
			
		<?php 
		getpro();
		getCatPro();
	    getbrandPro();
			
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