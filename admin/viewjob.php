<?php include('../connect.php');
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>View Job</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style media="screen">
    label{
      color:white;
    }
    h1 {
      text-align: center;
      color: white;
      margin-top: 25px;
    }

    hr {
      margin: 0px 200px 0px 200px;
    }
    .view{
      margin:0px 350px 10px 250px;
      /* padding:30px; */
    }
    pre{
      font-family: sans-serif;
      font-size: 15px;
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
        <li ><a href="job.php">Job Details</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">View Details<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="navbar-nav"><a href="viewjob.php">View Job Details</a></li>
            <li class="navbar-nav"><a href="">View Apptitude Details</a></li>
            <li class="navbar-nav"><a href="#">View Personality Details</a></li>
          </ul>
        </li>
        <li ><a href="aptitude.php">Apptitude Details</a></li>
        <li><a href="personal.php">Personality Details</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <h1>View JOB DETAILS</h1>
  <hr>
<div class="container">


    <form class="form-horizontal" method="post" style="margin:20px 0px 0px 250px;">
      <div class="form-group">
        <label class="control-label col-sm-2" for="jobid">Designations:</label>
        <div class="col-sm-5">
          <select class="form-control" name="selectdesignation">
            <?php $sql = mysqli_query($db, "SELECT designation FROM Jobdetails");
            while ($row = $sql->fetch_assoc()){
              echo "<option value='".$row['designation']."'>". $row['designation'] ."</option>";
                }
                      ?>
          </select>
          <button style="margin-top:5px;" type="submit" class="btn btn-success" name="go">Veiw</button>
        </div>
      </div>

    </form>
    <div class="view">
      <?php
          if (isset($_POST['go'])) {
            $jobdesignation=mysqli_real_escape_string($db,$_POST['selectdesignation']);
            $sql1=mysqli_query($db,"select * from Jobdetails where designation='$jobdesignation';");
            if(mysqli_num_rows($sql1)==1){
              $row=mysqli_fetch_assoc($sql1);
              echo "<pre>Job Id           :  ".$row['id']."</pre>";
              echo "<pre>Designation  :  ".$row['designation']."</pre>";
              echo "<pre>Salary           :  ".$row['salary']."</pre>";
              if($row['experience']>0&&$row['experience']<6){
              echo "<pre>Experience   :  ".$row['experience']." year</pre>";
              }else if($row['experience']==0){
              echo "<pre>Experience   :  Do not required any Experience</pre>";
              }else{
              echo "<pre>Experience   :  More than 5 year Experience</pre>";
              }
              echo "<pre>Qualification :  ".$row['qualification']."</pre>";
              echo "<pre>Key Skill       :  ".$row['keyskill']."</pre>";
              echo "<button style=\"margin:5px 0px 0px 250px;\" type=\"submit\" class=\"btn btn-warning\" name=\"edit\">Edit</button>";
              }
            }
        ?>
    </div>

</body>

</html>
