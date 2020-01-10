<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Mobile Shop</title>
    <link rel="stylesheet" href="../Style File/style.css">
    <link rel="stylesheet" href="../Style File/style4.css">
</head>
<body>
  <?php require 'connection.php' ?>
  <?php require 'pdo.php'; ?>
    <header>
      <div class="header-content">
        <div class="logo">
            <a href="../index.php"><h1>Mobile Shop</h1></a>
        </div>
      </div>
    </header>

    <section class="cart_contain">
    	<div id="cart_contain">
			<?php require 'connection.php' ?>
			<?php require 'cart_product.php' ?>
		</div>
	</section>

    <footer id="footer">
    	<div>
    		<div class="footer">
        			<p>MOBILE SHOP</p>
        			<a href="#"><img src="../Picture/Icons/facebook_icon.png" width="50px" height="50px"></a>
        			<a href="#"><img src="../Picture/Icons/instgram_icon.png" width="50px" height="50px"></a>
        			<a href="#"><img src="../Picture/Icons/twitter_icon.png" width="50px" height="50px"></a>
        			<a href="#"><img src="../Picture/Icons/youtube_icon.png" width="50px" height="50px"></a>
              
        		<br><br>
        		<p>DESIGNED BY </p><br>
        		<ul>
        			<li>Mohamed Ahmed Mohamed Ahmed</li>
        			<li>Abdelrhman Salah Elmashtoly</li>
        			<li>Mohamed Yahia</li>
        		</ul>
    		</div>
    	</div>
    </footer>
</body>
</html>