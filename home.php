<?php 
session_start();
if (isset($_SESSION['teacher_id'])) {
    include "../DB_connection.php";
    include("inc/navbar.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

  



<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "exam")
     {
       include("req/exam.php");
     }
     else if($page == "result")
     {
       include("req/result.php");
     }
     else if($page == "myscores")
     {
       include("pages/myscores.php");
     }
     
   }
   // Else ang home nga page mo display
   else
   {
     include("pages/home.php"); 
   }


 ?> 


<!-- MAO NI IYA FOOTER -->


<?php

}else {
	header("Location: ../Teacherlogin.php");
	exit;
} 

?>


<!-- UI THEME DIRI -->


<div class="app-main">



<!-- Condition If unza nga page gi click -->
<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "add-course")
     {
     include("pages/add-course.php");
     }
     else if($page == "manage-course")
     
     {
     	include("pages/manage-course.php");
      
     }
     else if($page == "add-module")
     {
      include("pages/add-module.php");
     }

     else if($page == "manage-module")
     {
      include("pages/manage-module.php");
     }

     else if($page == "manage-exam")
     {
      include("pages/manage-exam.php");
     }
     else if($page == "manage-examinee")
     {
      include("pages/manage-examinee.php");
     }
     else if($page == "ranking-exam")
     {
      include("pages/ranking-exam.php");
     }
     else if($page == "feedbacks")
     {
      include("pages/feedbacks.php");
     }
     else if($page == "examinee-result")
     {
      include("pages/examinee-result.php");
     }

       
   }
   // Else ang home nga page mo display
   else
   {
     include("pages/home.php"); 
   }
