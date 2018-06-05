<?php
   include("connect.php");
   session_start();
   $errors=array();
   $errors1=array();

   if (isset($_POST['adlogin'])) {
     $adusername = mysqli_real_escape_string($db,$_POST['adusername']);
     $adpassword = mysqli_real_escape_string($db,$_POST['adpwd']);
     $sql = "select * from Adminlogin where username='$adusername' and password='$adpassword';";
     $result=mysqli_query($db,$sql);
     if (mysqli_num_rows($result)==1) {
       header('location: admin/job.php');
     }
     else{
       array_push($errors,"Username or Password is incorrect!!");

     }
   }

   if (isset($_POST['canlogin'])) {
     $canusername = mysqli_real_escape_string($db,$_POST['canusername']);
     $canpassword = mysqli_real_escape_string($db,$_POST['canpwd']);
     $sql1 = "select * from Candidatelogin where username='$canusername' and password='$canpassword';";
     $result1=mysqli_query($db,$sql1);
     if (mysqli_num_rows($result1)==1) {
       header('location: candidate/joblist.php');
     }
     else{
       array_push($errors1,"Username or Password is incorrect!!");

     }
   }
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style media="screen">
    label {
      color: white;
    }
  </style>
</head>

<body style="background-image:url('login.jpg'); background-repeat:no-repeat;background-size:cover;">
  <div class="container-fluid" style=" margin:150px 0px 0px 400px">

    <div class="tab" style="background:#F1F1F1; display:inline-block;float:left; border-radius:4px;margin-left:20px">
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#adminlogin">Admin Login</a></li>
        <li><a data-toggle="pill" href="#candidateLogin">Candidate Login</a></li>
      </ul>
    </div>
    <br>
    <div class="tab-content" style="clear:left">

      <div id="adminlogin" class="tab-pane fade in active" style="margin-top:50px;margin-left:20px">
        <form action="#" method="post">
          <div class="form-group">
            <label for="adusername" style="margin-left:15px;">Admin Username:</label><br>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="adusername" placeholder="Enter Username" value="admin" required>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="adpwd" style="margin:10px 0px 0px 15px">Password:</label><br>
            <div class="col-sm-5">
              <input type="password" class="form-control" name="adpwd" placeholder="Enter Password" required>
            </div>
          </div><br>
          <div style="color:white; margin:5px 0px 0px 15px;background:red; display:inline-block; border-radius:5px;">
            <?php include('errors.php'); ?>
          </div><br>
          <div class="checkbox" style="margin-left:15px;">
            <label><input type="checkbox"> Remember me</label>
          </div>
          <button type="submit" class="btn btn-success" style="margin-left:150px;" name="adlogin">Login</button>
        </form>
      </div>

      <div id="candidateLogin" class="tab-pane fade" style="margin-top:50px;margin-left:20px">
        <form action="#" method="post">
          <div class="form-group">
            <label for="candusername" style="margin-left:15px;">Candidate Username:</label><br>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="canusername" placeholder="Enter Username" required>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="canpwd" style="margin:10px 0px 0px 15px">Password:</label><br>
            <div class="col-sm-5">
              <input type="password" class="form-control" name="canpwd" placeholder="Enter Password" required>
            </div>
          </div><br>
          <div style="color:white; margin:5px 0px 0px 15px;background:red; display:inline-block; border-radius:5px;">
            <?php include('errors1.php'); ?>
          </div><br>
          <div class="checkbox" style="margin-left:15px;">
            <label><input type="checkbox"> Remember me</label>
          </div>
          <button type="submit" class="btn btn-success" style="margin-left:100px;" name="canlogin">Login</button>
          <a class="btn btn-danger" style="margin-left:15px;" href="register.php">Register</a>
        </form>

      </div>
    </div>
  </div>
</body>

</html>
