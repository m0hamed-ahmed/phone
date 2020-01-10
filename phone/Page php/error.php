<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../Style File/style2.css">
</head>
<body>
	<?php 
		require 'connection.php';
		require 'pdo.php';
		if(count($error)>0)
		{
			foreach($error as $val)
			{
				echo "<div class='error'>";
					echo $val . "<br>";
				echo "</div>";
			}
		}

		if(count($error2)>0)
		{
			foreach($error2 as $val)
			{
				echo "<div class='error'>";
					echo $val . "<br>";
				echo "</div>";
			}
		}
	 ?>
</body>
</html>