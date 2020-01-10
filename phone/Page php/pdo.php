<?php

	require 'connection.php';

    $count_quantity = $conn->prepare("SELECT sum(quantity) FROM phone");
    $count_quantity->execute();
    while($row = $count_quantity->fetch())
    {
    	$count= $row['sum(quantity)'];
    }

// =================================================================================

    $addOrNo = TRUE;
	if(isset($_POST['add_to_cart'])):
		$name_phone  = $_POST['name_phone'];
		$price_phone = $_POST['price_phone'];
		$image_phone = $_POST['image_phone'];

		$check_phone = $conn->prepare("SELECT phone_name FROM phone");
		$check_phone->execute();
		while($row0 = $check_phone->fetch())
		{
			if($row0['phone_name'] == $name_phone)
			{
				echo "<script>alert('This Phone Alredy Found In Cart')</script>";
				$addOrNo = FALSE;
				break;
			}
		}
		if($addOrNo == TRUE)
		{
			$insert = $conn->prepare('INSERT INTO phone VALUES (?,?,?,1)');
			$insert->bindParam(1,$name_phone);
			$insert->bindParam(2,$price_phone);
			$insert->bindParam(3,$image_phone);
			$insert->execute();

			echo "<script>alert('Added To Cart')</script>";
		}
	endif;

// =================================================================================

	$error = array();
	$done  = "";
    if(isset($_POST['register'])):
        $name      = $_POST['name'];
        $email     = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if(empty($name))
            array_push($error,"Username is required");
        if(empty($email))
            array_push($error,"Email is required");
        if(empty($password1))
            array_push($error,"Password is required");
        if($password1 != $password2)
            array_push($error , "The Two Password do not match");

        if(count($error) ==0)
        {
            // encrypt passwprd
            $eccript_password = md5($password1);
            $insert_user = $conn->prepare("INSERT INTO user VALUES (?,?,?)");
            $insert_user->bindParam(1,$name);
            $insert_user->bindParam(2,$email);
            $insert_user->bindParam(3,$eccript_password);
            $insert_user->execute();

			$done =
			"<div style='
			width: 92%;
		    margin: 0px auto;
		    padding: 10px;
		    border: 1px solid #3c763d;
		    color: #3c763d;
		    background: #dff0d8;
		    border-radius: 5px;
		    margin-top:10px;
		'>Account Created ^_^</div>";
		sleep(1);
		header("location:login.php");
        }
    endif;

// =================================================================================


    $error2 = array();
    $found = FALSE;
    if(isset($_POST['login'])):
    	$email    = $_POST['email'];
    	$password = $_POST['password'];

    	if(empty($email))
    		array_push($error2 , "Email is required");
    	if(empty($password))
    		array_push($error2 , "Password is required");

    	if(count($error2) ==0)
    	{
            $eccript_password2 = md5($password);
    		$login_user = $conn->prepare("SELECT * FROM user");
    		$login_user->execute();
    		while($row1 = $login_user->fetch())
    		{
    			if($row1['email'] == $email && $row1['password']==$eccript_password2)
    			{
    				$found = TRUE;
    				break;
    			}
    		}
    		if($found == TRUE)
    		{
                $storeBuy = $conn->prepare("SELECT * FROM phone");
                $storeBuy->execute();
                while($row2 = $storeBuy->fetch())
                {
                    $insertBuy = $conn->prepare("INSERT INTO buy VALUES(?,?,?,?,?)");
                    $insertBuy->bindParam(1,$row1['email']);
                    $insertBuy->bindParam(2,$row2['phone_name']);
                    $insertBuy->bindParam(3,$row2['phone_price']);
                    $insertBuy->bindParam(4,$row2['phone_image']);
                    $insertBuy->bindParam(5,$row2['quantity']);
                    $insertBuy->execute();
                }
				$checkOut = $conn->prepare('DELETE FROM phone');
				$checkOut->execute();
    			sleep(1);
    			header("location:bill.php");
    		}
    		else
    		{
    			array_push($error2,"The Email or Password Are Not Valid");
    		}
    	}
    endif;

// =================================================================================