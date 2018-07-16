<?php include('../connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Shorted CV</title>
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
  .view{
    margin:20px 350px 10px 250px;
    /* padding:30px; */
  }

  #head {
    margin: 0px 200px 0px 200px;
  }

  #shead {
    margin-right: 400px;
  }

  label,
  h3 {
    color: white;
  }
  pre{
    font-family: sans-serif;
    font-size: 15px;
  }
  .but{
    margin-left: 600px;
  }
  </style>
</head>
<body style="background-image:url('../background.jpg'); background-repeat:no-repeat;background-size:cover;">
<div class="rasel">
  <?php
  function customSort($a,$b)
  {
 //check cgps
      if ($a['experience']==$b['experience'])
      {
          if($a['edu_title']==$b['edu_title'])
          {
            if ($a['cgpa']==$b['cgpa']) {
              return 0;
            }
            return($a['cgpa']>$b['cgpa'])?-1:1;
          }
          return($a['edu_title']>$b['edu_title'])?-1:1;

      }
      return ($a['experience']>$b['experience'])?-1:1;
    }

   $allRow = array();
    $jobid = $_SESSION['jid'];
    $jobname= $_SESSION['jname'];
    echo " <h1>Shorted CV lists for {$jobname}</h1><hr>";
    $sql = $db->query("select * from cv where job_id='$jobid';");
    while($row = mysqli_fetch_assoc($sql))
    {
      array_push($allRow, $row);
    }

    usort($allRow, "customSort");
    echo "<div class=\"view\">";
    foreach ($allRow as $key) {
      echo "<pre>{$key['name']}<a class=\"btn btn-success but\" href=\"viewcv.php?id={$key['candidate_id']}\">View CV</a></pre>";
    }
    echo "</div>"
     ?>
     <a class="btn btn-warning" style="margin-left:600px;" href="viewjob.php">Back</a>
</div>

</body>

</html>
