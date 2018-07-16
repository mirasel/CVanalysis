<?php include("../connect.php");
session_start();
 ?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Candidate CV</title>
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
      margin-left: 300px;
      margin-right: 15px;
    }
    </style>
  </head>
  <body style="background-image:url('../background.jpg'); background-repeat:no-repeat;background-size:cover;color:white;">
      <?php
        $canid = $_GET['id'];
        $jid = $_SESSION['jid'];
        echo"<h1>Curriculum Vitae</h1><hr>";
        echo"<div class=\"view\">";
        $sql = mysqli_query($db,"select * from cv where candidate_id='$canid' and job_id='$jid';");
        if(mysqli_num_rows($sql)==1){
          $r = mysqli_fetch_assoc($sql);
          echo "<pre>Full Name : {$r['name']}</pre>";
          echo "<pre>Email : {$r['email']}</pre>";
          echo "<pre>Number : 0{$r['number']}</pre>";
          echo "<pre>Address : {$r['address']}</pre>";
          if($r['edu_title']==1)
          echo "<pre>Education : BSc in {$r['subject']}
      CGPA : {$r['cgpa']}</pre>";
          else {
            echo "<pre>Education : MSc in {$r['subject']}
      CGPA : {$r['cgpa']}</pre>";
          }
          if($r['experience']>0)
          echo "<pre>Experience : {$r['experience']} year</pre>";
          else {
            echo "<pre>Experience : none</pre>";
          }
          echo "<pre>Key Skill : {$r['skill']}</pre>";
          echo "<pre>{$r['about']}</pre>";

          echo "<a class=\"btn btn-warning but\" href=\"shortedcv.php\">Back</a>";
          echo "<a class=\"btn btn-success\">Email for Interview</a>";
          echo"</div>";

        }
       ?>
  </body>
</html>
