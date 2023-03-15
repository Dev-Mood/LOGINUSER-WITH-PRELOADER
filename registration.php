<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $fullname = $_POST["fullname"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM data_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO data_user VALUES('','$fullname','$username','$email','$password','$confirmpassword)";
      mysqli_query($conn, $query);
      echo
      "<script> alert('You Have Successfully Registered!'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('2.png');
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .form-box {
            width: 400px;
            height: auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-box h2 {
            font-size: 32px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-box form label {
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .form-box form input[type="text"],
        .form-box form input[type="email"],
        .form-box form input[type="password"] {
            width: 100%;
            height: 50px;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #f5f5f5;
            font-size: 18px;
        }
        
        .form-box form button[type="submit"] {
            width: 100%;
            height: 50px;
            margin-top: 20px;
            border-radius: 5px;
            border: none;
            background-color: #1E90FF;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        
        .form-box form button[type="submit"]:hover {
            background-color: #0080FF;
            cursor: pointer;
        }
        
        .form-box form a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #1E90FF;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        
        .form-box form a:hover {
            color: #0080FF;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Registration</h2>
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
      <label for="fullname">Full Name : </label>
      <input type="text" name="fullname" id = "fullname" required value=""> <br>
      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
  </body>
</html>