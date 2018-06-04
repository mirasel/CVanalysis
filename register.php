<?php
   include("connect.php");
   session_start();
   $regierror=array();
   if (isset($_POST['registersubmit'])) {
     $cusername = mysqli_real_escape_string($db,$_POST['cusername']);
     $cname=mysqli_real_escape_string($db,$_POST['fullname']);
     $cemail=mysqli_real_escape_string($db,$_POST['email']);
     $cpassword = mysqli_real_escape_string($db,$_POST['cpwd']);
     $cpassword1=mysqli_real_escape_string($db,$_POST['cfpwd']);
     if($cpassword!=$cpassword1){
      array_push($regierror,"The two password doesn't match!!");

    }else{
      $sql = mysqli_query($db,"select * from Candidatelogin where username='$cusername';");
      if(mysqli_num_rows($sql)==1){
        array_push($regierror,"Username is already exist!! Pick another one!!");
      }else{
        $sql1 = mysqli_query($db,"insert into Candidatelogin(username,fullname,email,password) values ('$cusername','$cname','$cemail','$cpassword');");
        if($sql1==true){
          echo "<script>alert('Register complete!!');
                window.location.href='login.php';
          </script>";
        }
      }
    }
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Candidate Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style media="screen">
    h1 {
      text-align: center;
      color: white;
      margin-top: 35px;
    }

    hr {
      margin: 0px 200px 0px 200px;
    }
    label {
      color: white;
    }
    .input{
      padding: 10px;
      margin: 5px 200px 0px 400px;
    }
    </style>
  </head>
  <body style="background-image:url('login.jpg'); background-repeat:no-repeat;background-size:cover;">
    <div class="container-fluid" >
      <h1>CANDIDATE REGISTER</h1><hr>
      <div class="input">
        <form action="#" method="post">
          <div class="form-group">
            <label for="cusername" style="margin-left:15px;">Username:</label><br>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="cusername" placeholder="Enter username" required>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="fullname" style="margin:5px 0px 0px 15px;">Full Name:</label><br>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="fullname" placeholder="Enter your full name" required>
            </div>
          </div><br>
          <div class="form-group">
            <label for="email" style="margin:5px 0px 0px 15px;">Email:</label><br>
            <div class="col-sm-7">
              <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
          </div><br>
          <div class="form-group">
            <label for="cpwd" style="margin:5px 0px 0px 15px">Password:</label><br>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="cpwd" placeholder="Enter Password" required>
            </div>
          </div><br>
          <div class="form-group">
            <label for="cfpwd" style="margin:5px 0px 0px 15px">Confirm Password:</label><br>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="cfpwd" placeholder="Enter Password" required>
            </div>
          </div><br>
          <div style="margin:15px 0px 0px 15px; background-color:red; display:inline-block;border-radius:4px;">
              <?php include('regierror.php') ?>
          </div><br>
          <button type="submit" class="btn btn-success" style="margin:10px 0px 0px 150px;" name="registersubmit">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
