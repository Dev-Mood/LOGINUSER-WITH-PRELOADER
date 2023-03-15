<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: homepage.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM data_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: homepage.php");
    }
    else{
      echo
      "<script> alert('Password does not Exist!'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered Yet!'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

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

.login-box {
  width: 400px;
  height: auto;
  padding: 20px;
  border: 1px solid #ccc;
}

</style>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title text-center">Login User</h2>
              <form action="" method="post" autocomplete="off">
                <div class="form-group">
                  <label for="usernameemail">Username or Email:</label>
                  <input type="text" class="form-control" id="usernameemail" name="usernameemail" placeholder="Enter username or email" required>
                </div>
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
              </form>
              <hr>
              <p class="text-center">Don't have an account? <a href="registration.php">Register</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
