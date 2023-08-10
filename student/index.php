<?php 
session_start();
if (isset($_SESSION['student_id']))
{
       include "../DB_connection.php";
       include "data/student.php";
       include "data/subject.php";
       include "../admin/data/grade.php";

       $student_id = $_SESSION['student_id'];

       $student = getStudentById($student_id, $conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student - Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/cbfa8b25c9.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        include "inc/navbar.php";
     ?>
     <?php 
        if ($student != 0) {
     ?>
     <div class="d-flex p-2 inline-flex-column mx-auto">
         <div class="card" style="width: 22rem;">
          <img src="../img/student-<?=$student['gender']?>.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$student['username']?></h5>
            <h5 class="card-title text-center"><?=$student['lrn']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">First name: <?=$student['first_name']?></li>
            <li class="list-group-item">Last name: <?=$student['last_name']?></li>
            <li class="list-group-item">Username: <?=$student['username']?></li>
            <li class="list-group-item">Address: <?=$student['address']?></li>
            <li class="list-group-item">Date of birth: <?=$student['date_of_birth']?></li>
            <li class="list-group-item">Religion: <?=$student['religion']?></li>
            <li class="list-group-item">Gender: <?=$student['gender']?></li>

            <li class="list-group-item">Grade: 
                 <?php 
                      $grade = $student['grade'];
                      $g = getGradeById($grade, $conn);
                      echo $g['grade_code'].'-'.$g['grade'];
                  ?>
            </li>
            <br>
            <li class="list-group-item">Parent first name: <?=$student['guardian_parent_first_name']?></li>
            <li class="list-group-item">Parent last name: <?=$student['guardian_parent_last_name']?></li>
            <li class="list-group-item">Parent phone number: <?=$student['guardian_parent_phone_number']?></li>
          </ul>
        </div>
  <div class="black-fill-dashboard">
      <div class="container d-flex inline-flex-column mt-5 m-5 pb-5"> 
        <div class="container text-center inline-flex-column mt-5 m-5 pb-5">
        <div class="row row-cols-4">
          <a href="myclass.php" 
             class="col btn btn-dark  m-3 py-5">
            <i class="fa-sharp fa-solid fa-chalkboard-user fs-1" aria-hidden="true"></i><br>
            <h5>Myclass</h5>
          </a> 
          <a href=".php" class="col btn btn-dark  m-3 py-5">
          <i class="fa fa-users fs-1"></i><br>
            <h5>Assignment</h5>
          </a> 
          <a href="exams.php" class="col btn btn-dark m-3 py-5">
          <i class="fa fa-clipboard-list fs-1" aria-hidden="true"></i><br>
            <h5>Quiz and Exam</h5>
          </a> 
          <a href="grade.php" class="col btn btn-dark m-3 py-5">
          <i class="fa fa-bars-progress fs-1" aria-hidden="true"></i><br>
            <h5>Grades</h5>
          </a> 
          <a href=".php" class="col btn btn-dark m-3 py-5">
          <i class="fa fa-users-rectangle fs-1" aria-hidden="true"></i><br>
            <h5>Announcement</h5>
          </a> 
          <a href=".php" class="col btn btn-dark m-3 py-5">
          <i class="fa fa-bars-progress fs-1" aria-hidden="true"></i><br>
            <h5>Downloadable Materials</h5>
          </a> 
          </a> 
        </div>
    </div>
</div>

     </div>
     <?php 
        }else {
          header("Location: student.php");
          exit;
        }
     ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
        });
    </script>
</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 


?>
