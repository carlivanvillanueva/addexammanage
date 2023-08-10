<?php 
  include("DB_connection.php");
  include("query/selectData.php");
  include("query/selExamAttemptExe.php");
 ?>
 <!doctype html>
<html lang="en">
<?php 

 ?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="../pics.png" width="150">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"
          id="navLinks">
        <li class="nav-item">
          <a class="nav-link" 
             aria-current="page" 
             href="index.php"><h5>Dashboard</h5></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="Profile_edit.php"><h5>Profile</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="exams.php"><h5>Quiz and Exam</h5></a>
        </li>
          <a class="nav-link" href="grade.php"><h5>Grade</h5></a>
        </li>
          <a class="nav-link" href="pass.php"><h5>Settings</h5></a>
    </li>
      </ul>
      <ul class="navbar-nav me-right mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../Studentlogin.php"><h5>Logout</h5></a>
        </li>
      </ul>
  </div>
    </div>
</nav>