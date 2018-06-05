<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>AddDetails</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <li class="navbar-nav"><a href="#">View Apptitude Details</a></li>
            <li class="navbar-nav"><a href="#">View Personality Details</a></li>
          </ul>
        </li>
        <li class="active"><a href="apptitude.php">Apptitude Details</a></li>
        <li><a href="personal.php">Personality Details</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="../login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

</body>

</html>
