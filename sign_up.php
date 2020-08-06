<?php

require "_db_connect.php";

$create_Databse = "create  database test";
mysqli_query($conn,$create_Databse);

$create_Table = "CREATE TABLE `test`.`sign_up` ( `username` TEXT NOT NULL , `password` VARCHAR(20) NOT NULL , `confirm` VARCHAR(20) NOT NULL ) ENGINE = InnoDB;";

mysqli_query($conn,$create_Table);
// you can change the value with you're database name
$servename = "127.0.0.1";
$username = "root";
$password = "";
$database_name = "test";
$conn = mysqli_connect($servename,$username,$password,$database_name);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$a =$_POST["Username"];
$b = $_POST["Password"];
$c = $_POST["Confirm"];


//  Protect The Website From The xss

$sanitize_Username = htmlspecialchars($a);
$Sanitize_Password = htmlspecialchars($b);
$sanitize_Confirm  = htmlspecialchars($c);


// Make The hashes

// $Password_Hash = password_hash($b, PASSWORD_DEFAULT);


}
else
{
  die("<strong>REQUEST MUST BE POST</strong>");
}
// check if passwd is == to confirm password

if($b==$c)
{

    $data = "INSERT INTO `sign_up` (`username`, `password`, `confirm`) VALUES ('$sanitize_Username', '$Sanitize_Password', '$sanitize_Confirm');";
    mysqli_query($conn,$data);
    echo "
    <title>SIGN_UP</title>
    ";

    echo '

    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
      <div class="alert alert-Success alert-dismissible fade show" role="alert">
      <strong>Well Done!</strong> All Information Is Saved In Our System Thanks. And Now You Can Login From  <a href="/test/login.html">Click Here </a></strong>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
      </head>
      <body>
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>
    </html>';
}  
else
{
    die('

    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
      
      </head>
      <body>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Do not match the Password! </strong>&nbsp;
      <p>Confirm password Must be Same.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>
    </html>


    ');
}

?>


