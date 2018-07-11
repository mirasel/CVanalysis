<?php include('../connect.php');?>
<?php
  session_start();
  if (isset($_POST['cvsubmit'])) {
    $canid = $_GET['canid'];
    $jobid = $_GET['id'];
    $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
    $email= mysqli_real_escape_string($db,$_POST['email']);
    $mobile = mysqli_real_escape_string($db,$_POST['mobile']);
    $address = mysqli_real_escape_string($db,$_POST['address']);
    $edutitle = mysqli_real_escape_string($db,$_POST['title']);
    $subject = mysqli_real_escape_string($db,$_POST['subject']);
    $cgpa = mysqli_real_escape_string($db,$_POST['cgpa']);
    $experience = mysqli_real_escape_string($db,$_POST['experience']);
    $skill = mysqli_real_escape_string($db,$_POST['skill']);
    $about = mysqli_real_escape_string($db,$_POST['about']);
    $insert = mysqli_query($db,"insert into cv
                                (candidate_id,job_id,name,email,number,address,edu_title,subject,cgpa,experience,skill,about)
                                values('$canid','$jobid','$fullname','$email','$mobile','$address','$edutitle','$subject','$cgpa','$experience','$skill','$about');");
    if($insert==true){
      echo "<script>alert('Submission complete!!');
            window.location.href='joblist.php';
                  </script>";
        }

  }

 ?>

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

    #shead {
      margin-right: 400px;
    }

    label,
    h3 {
      color: white;
    }

    .input {
      padding: 10px;
      margin: 5px 200px 0px 400px;
    }
  </style>
</head>

<body style="background-image:url('../background.jpg'); background-repeat:no-repeat;background-size:cover;">
  <div class="container-fluid">
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
            <label for="adress" style="margin:5px 0px 0px 15px">Address</label><br>
            <div class="col-sm-7">
              <textarea class="form-control" rows="3" name="address" placeholder="Enter address" required></textarea>
            </div><br><br><br><br>
            <!-- <br><br><h3>Education :</h3><hr id="shead"> -->
            <div class="form-group">
              <label for="title" style="margin:5px 0px 0px 15px">Academic Title</label><br>
              <div class="col-sm-7">
                <select class="form-control" name="title">
                <option value="2">MSc</option>
                <option value="1">BSc</option>
              </select>
              </div>
            </div><br>
            <div class="form-group">
              <label for="subject" style="margin:5px 0px 0px 15px">Subject</label><br>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="subject" placeholder="Enter Subject name" required>
              </div>
            </div><br>
            <div class="form-group">
              <label for="cgpa" style="margin:5px 0px 0px 15px">CGPA</label><br>
              <div class="col-sm-7">
                <input type="number" step="0.01" min="2.00" max="4.00" class="form-control" name="cgpa" placeholder="Enter CGPA" required>
              </div>
            </div><br>
            <div class="form-group">
              <label for="experience" style="margin:5px 0px 0px 15px">Experience</label><br>
              <div class="col-sm-7">
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
            </div><br>
            <div class="form-group">
              <label for="skill" style="margin:5px 0px 0px 15px">Skill</label><br>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="skill" placeholder="Enter your keyskill" required>
              </div>
            </div><br>
            <div class="form-group">
              <label for="write" style="margin:5px 0px 0px 15px">Write Somthing about Yourself</label><br>
              <div class="col-sm-7">
                <textarea class="form-control" rows="5" name="about" placeholder="About Yourself" required></textarea>
              </div>
            </div><br><br><br><br><br>

            <button type="submit" class="btn btn-success" style="margin:10px 0px 0px 150px;" name="cvsubmit">Submit</button>
        </form>
        </div>
      </div>
</body>

</html>
