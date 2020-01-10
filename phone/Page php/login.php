<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Mobile Shop</title>
    <link rel="stylesheet" href="../Style File/style.css">
    <link rel="stylesheet" href="../Style File/style2.css">
</head>
<body>
    <?php require 'connection.php'; ?>
    <?php require 'pdo.php'; ?>
    <header>
      <div class="header-content">
        <div class="logo">
            <a href="../index.php"><h1>Mobile Shop</h1></a>
        </div>
      </div>
    </header>

    <section>
    	<div class="check_out_container">
	    	<div class="title">LOGIN</div>
    		<div class="left">	
                <?php require 'error.php'; ?>
		    	<div class="login">
		    		<form method="post">

			    		<div class="label_input">
			    			<label>E-mail</label><br>
			    			<input type="email" name="email" placeholder="Email" value="<?php echo @$_POST['email']; ?>">
			    		</div>

						<div class="label_input">
			    			<label>Password</label><br>
			    			<input type="password" name="password" placeholder="Password">
			    		</div>

			    		<div class="label_input">
			    			<input type="submit" name="login" value="Login">
			    		</div>

			    		<div class="label_input">
			    			<p>Create A New Account? <a href="registration.php">Registration</a></p>
			    		</div>

			    	</form>
		    	</div>
    		</div>
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