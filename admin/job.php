<?php
   include("../connect.php");
   session_start();
   $joberrors=array();

   if (isset($_POST['jobdetailsubmit'])) {
     $id = mysqli_real_escape_string($db,$_POST['jobid']);
     $designation= mysqli_real_escape_string($db,$_POST['designation']);
     $salary= mysqli_real_escape_string($db,$_POST['salary']);
     $experience = mysqli_real_escape_string($db,$_POST['experience']);
     $qualification = mysqli_real_escape_string($db,$_POST['qualification']);
     $keyskill = mysqli_real_escape_string($db,$_POST['keyskill']);
     $sql = "select * from Jobdetails where id='$id' or designation='$designation';";
     $result=mysqli_query($db,$sql);
     if (mysqli_num_rows($result)==1) {
       array_push($joberrors,"Job ID or Designation is already exists!!");
     }
     else{
       $sql1 = "insert into Jobdetails (id,designation,salary,experience,qualification,keyskill) values ('$id','$designation','$salary','$experience','$qualification','$keyskill');";
       $result1=mysqli_query($db,$sql1);
       if($result1==true){
          echo "<script>alert('Job Details has inserted!!');
                window.location.href='job.php';
          </script>";

        }
       else {
         array_push($joberrors,$result1);
         header('location:job.php');
      }
     }
   }
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Add Job Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style media="screen">
    h1 {
      text-align: center;
      color: white;
      margin-top: 25px;
    }

    hr {
      margin: 0px 200px 0px 200px;
    }

    label {
      color: white;
    }
  </style>
</head>

<body style="background-image:url('../background.jpg'); background-repeat:no-repeat;background-size:cover;">
  <nav class="navbar navbar-inverse" style="border-radius:0px">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WEBer</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="job.php">Job Details</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">View Details<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="navbar-nav"><a href="viewjob.php">View Job Details</a></li>
            <li class="navbar-nav"><a href="">View Apptitude Details</a></li>
            <li class="navbar-nav"><a href="#">View Personality Details</a></li>
          </ul>
        </li>
        <li><a href="apptitude.php">Apptitude Details</a></li>
        <li><a href="personal.php">Personality Details</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <h1>ADD JOB DETAILS</h1>
  <hr>
  <div class="container">

    <form class="form-horizontal" method="post" style="margin:20px 0px 0px 250px;">
      <div class="form-group">
        <label class="control-label col-sm-2" for="jobid">Job ID:</label>
        <div class="col-sm-5">
          <input type="number" min="100" value="100" class="form-control" name="jobid">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="designation">Designation:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="designation" placeholder="Enter Designation" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="salary">Salary:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="salary" placeholder="Enter Salary" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="experience">Experience:</label>
        <div class="col-sm-5">
          <select class="form-control" name="experience">
            <option value="0">Do not require any Experience</option>
            <option value="1">1 Year Experience</option>
            <option value="2">2 Year Experience</option>
            <option value="3">3 Year Experience</option>
            <option value="4">4 Year Experience</option>
            <option value="5">5 Year Experience</option>
            <option value="6">More than 5 Year Experience</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="qualification">Qualification:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="keyskill">Key Skill:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="keyskill" placeholder="Enter Key Skill" required>
        </div>
      </div>
      <div style="color:white; margin:5px 0px 0px 150px;background:red; display:inline-block; border-radius:5px;">
        <?php include('joberrors.php'); ?>
      </div><br>
      <button type="submit" class="btn btn-success" style="margin:10px 0px 0px 290px; padding:10px 20px 10px 20px;" name="jobdetailsubmit">Submit</button>
    </form>
  </div>
</body>

</html>
