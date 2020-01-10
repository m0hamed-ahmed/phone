<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mobile Shop</title>
    <link rel="stylesheet" href="../Style File/style.css">
    <link rel="stylesheet" href="../Style File/style5.css">
</head>
<body>
  <?php require 'connection.php' ?>
    <header>
      <div class="header-content">
        <div class="logo">
            <a href="../index.php"><h1>Mobile Shop</h1></a>
        </div>
      </div>
    </header>

    <section class="bill">
        <div class="billDiv1">
            <p>Customers who bought phones</p>
            <form method="post">
                <select name="billEachName">
                    <option value="empty">Choose</option>
                    <?php
                        $nameBuy = $conn->prepare("SELECT DISTINCT U.email,U.name from user U,buy B where U.email=B.email");
                        $nameBuy->execute();
                        while($row4 = $nameBuy->fetch())
                        {
                            echo "<option value='".$row4['email']."'>". $row4['name'] ."</option>";
                        }   
                    ?>
                </select><br>
                    <span>
                    <?php
                        if(isset($_POST['billBtn']))
                        {
                            if($_POST['billEachName'] == 'empty')
                            {
                                echo "Name Required" . "<br>";
                            }
                        }
                    ?>
                    </span>
                <input type="submit" name="billBtn" value="Show Bill">
            </form>
        </div>
        <div>
            <?php

            if(isset($_POST['billBtn'])):

                $billEachName = $_POST['billEachName'];

                if($billEachName != 'empty')
                {
                    echo "<div class='bill_container'>";
                        echo "<div>";

                            echo "<div>";
                                echo "Mobile Shop";
                            echo "</div>";

                            echo "<div>";
                                echo "Name: ";
                                $na = $conn->prepare("SELECT name FROM user WHERE email ='$billEachName'");
                                $na->execute();
                                while($row0 = $na->fetch())
                                {
                                    echo $row0['name'] . "<br>";
                                }
                                echo "Account : " . $billEachName;
                            echo "</div>";

                            echo "<div>";
                                $selectName = $conn->prepare("SELECT * FROM buy WHERE email = '$billEachName'");
                                $selectName->execute();
                                echo "<table>";
                                echo "<tr class='tr1'><th>Quantity</th><th>Phone Name</th><th>Price</th><th>Total</th></tr>";
                                while($row3 = $selectName->fetch())
                                {
                                   echo "<tr class='tr2'><th class='th2'>";
                                   echo $row3['quantity'];
                                   echo "</th>";

                                   echo "<th class='th3'>";
                                   echo $row3['phone_name'];
                                   echo "</th>";

                                   echo "<th class='th4'>";
                                   echo $row3['phone_price'];
                                   echo "</th>";

                                   echo "<th class='th5'>";
                                   echo $row3['phone_price'] * $row3['quantity'];
                                   echo "</th></tr>";

                                }
                                echo "<tr class='tr3'><th colspan='4'></th></tr>";
                                echo "<tr class='tr4'><th colspan='4'></th></tr>";
                                echo "<tr class='tr5'><th colspan='2' align='right'>Total</th>";
                                echo "<th colspan='2'>";
                                $totalPriceBill = $conn->prepare("SELECT sum(phone_price*quantity) FROM buy WHERE email = '$billEachName'");
                                $totalPriceBill->execute();
                                while ($row5 = $totalPriceBill->fetch()) {
                                    echo "EGY" . "<br>";
                                    echo $row5['sum(phone_price*quantity)'];
                                }
                                echo "</th></tr>";
                                echo "</table>";

                            echo "</div>";


                        echo "</div>";
                    echo "</div>";

                }
            endif;
            ?>
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