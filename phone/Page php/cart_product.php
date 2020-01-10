<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Mobile Shop</title>
    <link rel="stylesheet" href="../Style File/style.css">
</head>
<body>

<?php
// =============================================================================================
	require 'connection.php';
	require 'pdo.php';
	echo "<table border='0px' class='cart_product_table'>";
	echo "<tr>";
	echo "<th>NUM</th>";
	echo "<th style='width:20%'>PHONE NAME</th>";
	echo "<th>IMAGE</th>";
	echo "<th>PRICE</th>";
	echo "<th style='width:20%'>QUANTITY</th>";
	echo "<th>ACTION</th>";
	echo "<th style='width:18%'>TOTAL</th>";
	echo "</tr>";
	$selceAll = $conn->prepare('SELECT * FROM phone');
	$selceAll->execute();
	$i=1;
	while($row1 = $selceAll->fetch())
	{
		echo "<tr>";
		echo "<th>" . $i++ . "</th>";
		echo "<th>" . $row1['phone_name'] . "</th>";
		echo "<th><img src='".$row1['phone_image']."' class='cart_image'></th>";
		echo "<th> EGY " . $row1['phone_price'] . ".00";
		echo "<input type='hidden' id='price' value='".$row1['phone_price'] ."'></input>";
		echo "</th>";
		echo "<th>";


		echo "<form method='post'>";
		echo "<input type='number' name='quantity' value='".$row1['quantity']."' id='quantity' min='1' max='100'>";
		echo "<input type='hidden' name='hidden_name_phone' value='".$row1['phone_name']."'>";
		echo "<input type='submit' name='edit' value='Edit'>";
		echo "</form></th>";


		echo "<th>
		<form method='post'>
			<div class='up_image_delete'>
				<img src='../Picture/Action/delete.png' class='image_delete'>
				<input type='submit' name='delete' value='Delete'>
				<input type='hidden' name='hidden_name_phone' value='".$row1['phone_name']."'>
			</div>
		</form>
		</th>";
		echo "<th><div id='cart_quantity_total'>" .$row1['phone_price'] * $row1['quantity'] ."</div></th>";
		echo "</th>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<td></td><td></td><td></td><td></td><td></td>";
	echo "<td colspan='2'>
	<div class='cart_product_total_price_egy'>
	<div class='cart_product_total_price'>TOTAL PRICE:</div>
	<div class='cart_product_egy'>EGY</div>
	</div>
	</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td></td><td></td><td></td><td></td><td></td><td></td>";
	echo "<td><div class='cart_product_money'>";
	$totalPrice = $conn->prepare("SELECT sum(phone_price*quantity) FROM phone");
	$totalPrice->execute();

	while($row2 = $totalPrice->fetch())
	{
		 echo $row2['sum(phone_price*quantity)'];
	}
	echo "</div></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td></td><td></td><td></td><td></td><td></td>";
	echo "<td colspan='2'><div class='checkout'>";
	echo "<a href='login.php'>Check Out</a>";
	echo "</div></td>";

	echo "</tr>";

	echo "</table>";

// =============================================================================================

	if(isset($_POST['delete']) && isset($_POST['hidden_name_phone']))
	{
		$delete = $conn->prepare('DELETE FROM phone WHERE phone_name = ?');
		$delete->bindParam(1,$_POST["hidden_name_phone"]);
		$delete ->execute();
		header("Location: cart.php");
	}

// =============================================================================================

	if(isset($_POST['edit']))
	{
		$new_quantity = $_POST['quantity'];
		$phone_name   = $_POST['hidden_name_phone'];

		$update = $conn->prepare("UPDATE phone SET quantity = ? WHERE phone_name = ?");
		$update->bindParam(1,$new_quantity);
		$update->bindParam(2,$phone_name);
		$update->execute();
		header("Location: cart.php");
	}

// =============================================================================================

?>
<script>

	if(document.getElementsByTagName("tr").length == 4)
	{
		var cart_contain = document.getElementById("cart_contain").innerHTML =
		 "<div class='cart_empty'>" +
		 "<img src='../Picture/cart/page_empty.png'>" +
		 "</div>";
	}
// =============================================================================================

</script>
</body>
</html>
