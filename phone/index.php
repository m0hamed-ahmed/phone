<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
        <title>Mobile Shop</title>
        <link rel="stylesheet" href="Style File/style.css">
        <link rel="stylesheet" href="Style File/style3.css">
    </head>
    <body>
    <?php require 'Page php/pdo.php'; ?>
        <header>
          <div class="header-content">
            <div class="logo">
                <a href="#"><h1>Mobile Shop</h1></a>
            </div>
            <div class="cartandlinks">
            	<div class="cartandlinks_contain">
	                <div class="cartandlinks_links">
	                	<a href="#">Home</a>
	                	<a href="#links">Category</a>
	                	<a href="#footer">About Us</a>
                        <a href="Page php/bill.php">Bill</a>
	                </div>
	                <div class="cartandlinks_cart">
                        <div class="count"><?php echo $count; ?></div>
	                    <a href="Page php/cart.php">
                            <img src="Picture/Cart/cart.png" width="40px" height="40px">
                        </a>
	                </div>
            	</div>
            </div>
          </div>
        </header>
        
        <article>
            <div class="connect">
            	<div class="slideshow" name="slideshow">
            		<div class="slideshow_name_phone" name="slideshow_name_phone"></div>
            		<div class="slideshow_photo_phone">
            			<img name="slideshow_photo_phone">
            		</div>
            	</div>

            	<div class="links" id="links">
            		<a href='Page php/apple.php' target="product" class="choose">APPLE</a>
            		<a href='Page php/samsung.php' target="product" class="choose">SAMSUNG</a>
            		<a href='Page php/oppo.php' target="product" class="choose">OPPO</a>
            		<a href='Page php/huawei.php' target="product" class="choose">HUAWEI</a>
            	</div>

            	<div>
            		<iframe src="Page php/samsung.php" name="product" scrolling="no"></iframe>
            	</div>

            </div>
        </article>

        <footer id="footer">
        	<div>
        		<div class="footer">
	        			<p>MOBILE SHOP</p>
	        			<a href="#"><img src="Picture/Icons/facebook_icon.png" width="50px" height="50px"></a>
	        			<a href="#"><img src="Picture/Icons/instgram_icon.png" width="50px" height="50px"></a>
	        			<a href="#"><img src="Picture/Icons/twitter_icon.png" width="50px" height="50px"></a>
	        			<a href="#"><img src="Picture/Icons/youtube_icon.png" width="50px" height="50px"></a>

	        		<br><br>
	        		<center><p>All Rights Reserved &copy; By ME</p></center>
        		</div>
        	</div>
        </footer>
        <script src="Javascript File/javascript1.js"></script>
    </body>
</html>