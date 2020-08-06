<?php
require "_db_connect.php";

$a = $_POST["Username"];
$b= $_POST["Password"];
$c = $_POST["Confirm"];


$x = "SELECT * FROM sign_up WHERE username='$a'AND  password='$b' AND confirm='$c'";

$result = mysqli_query($conn,$x);

if(mysqli_num_rows($result)>0)
{

    $f = mysqli_fetch_assoc($result);
// if condition will true php script will make the cookie



$information = "$a $b $c";


setcookie("User_Information","$information" ,time()+ 3600,"/");

die("You're Login Crediantils Is Store In Cookie. Please See The Cookie");


}

else
{

die("Invalid Login Creadantionals");

}



?>



