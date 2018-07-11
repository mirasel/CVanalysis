<?php include('../connect.php');?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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

    #head {
      margin: 0px 200px 0px 200px;
    }
    #shead{
      margin-right: 400px;
    }
    label,h3{
      color: white;
    }
    .input{
      padding: 10px;
      margin: 5px 200px 0px 400px;
    }
    </style>
  </head>
  <body style="background-image:url('../background.jpg'); background-repeat:no-repeat;background-size:cover;">
    <div class="container-fluid" >
      <?php
      $id = $_GET['id'];
      $sql=mysqli_query($db,"select designation from Jobdetails where id='$id'");
      if(mysqli_num_rows($sql)==1){
        $row=mysqli_fetch_assoc($sql);
        echo "<h1>Fill Up Your CV Here for ".$row['designation']."</h1>";
      }
       ?>
      <hr id="head">

      <div class="input">
        <form action="#" method="post">
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
            <label for="mobile" style="margin:5px 0px 0px 15px;">Mobile Number:</label><br>
            <div class="col-sm-7">
              <input type="tel" class="form-control" name="mobile" placeholder="Enter Mobile Number" required>
            </div>
          </div><br>
          <div class="form-group">
            <label for="address" style="margin:15px 0px 0px 15px;">Address:</label><br>
            <div class="col-sm-7" style="width:400px;">
              <input type="text" class="form-control" name="adress" placeholder="Enter Adress" required>
            </div>
          </div><br>
          <h3>Education :</h3><hr id="shead">
          <div class="form-group">
            <label for="title" style="margin:5px 0px 0px 15px">Academic Title</label><br>
            <div class="col-sm-7">
              <input type="number" step="0.01" min="2.00" max="4.00" class="form-control" name="cpwd" placeholder="Enter Password" required>
            </div>
          </div><br>
          <div class="form-group">
            <label for="cgpa" style="margin:5px 0px 0px 15px">CGPA</label><br>
            <div class="col-sm-7">
              <input type="number" step="0.01" min="2.00" max="4.00" class="form-control" name="cpwd" placeholder="Enter Password" required>
            </div>
          </div><br>
          <div class="form-group">
            <label for="" style="margin:5px 0px 0px 15px"></label><br>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="cfpwd" placeholder="Enter Password" required>
            </div>
          </div><br>

          <button type="submit" class="btn btn-success" style="margin:10px 0px 0px 150px;" name="registersubmit">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
