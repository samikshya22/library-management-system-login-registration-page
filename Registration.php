<?php
include('config.php');
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    $duplicate=mysqli_query($conn, "SELECT * FROM register WHERE username ='$username' OR email ='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has Already Taken');</script>";
    }
    else{
        if($password==$confirmpassword){
            $query ="Insert INTO register VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Sucessful');</script>";
            header("location:login.php");
        }
        else{
            echo
            "<script> alert('password doesnot match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
    </head>
    <body>
        <h2>Registration</h2>
        <form class="" action="" method="post" autocomplete="off">
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" required value=""><br> 
            <label for="username">Username :</label>
            <input type="text" name="username" id="name" required value=""><br>
            <label for="email">Email :</label> 
            <input type="email" name="email" id="email" required value=""><br>
            <label for="password">Password:</label> 
            <input type="password" name="password" id="password" required value=""><br>
            <label for="confirmpassword">Confirm Password:</label> 
            <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
            <button type="submit" name="submit">Register</button>
        </form>
        <br>
        <a href="login.php">login</a>
    </body>
</html>