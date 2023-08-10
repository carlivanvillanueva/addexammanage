<?php 
session_start();
if (isset($_SESSION['teacher_id'])) {

   
      
       include "../DB_connection.php";
       include "../admin/data/teacher.php";

       $teacher_id = $_SESSION['teacher_id'];
       $teacher = getTeacherById($teacher_id, $conn);

       if ($teacher == 0) {
         header("Location: teacher.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Edit Teacher</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    include "inc/navbar.php";
    include "inc/footer.php";
    include "../DB_connection.php";
    ?>
    <div class="container mt-5">
<a href="home.php?page=manage-exam"
           class="btn btn-dark">Go Back</a>
<form method="post"
              class="shadow p-3 my-5 form-w" 
              action="query/addQuestionExe.php">
        <h3>Add Question </h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
       
   
        <?php } ?>
            <div class="mb-3">
            <div>
            <label class="form-label">Question</label>
            <input type="hidden" name="exam_id" value="<?php echo $exId; ?>">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Input Question" autocomplete="off">
            </div>

            <fieldset>
            <legend>Input word for choice's</legend>
            <div class="form-group">
                <label>Choice A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Input choice A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Input choice B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Input choice C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Input choice D" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Correct Answer</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Input correct answer" autocomplete="off">
            </div>
          </fieldset>

          <button type="submit" 
              class="btn btn-primary">
              Add Exam</button>
        </form>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
<?php 

  }else {
    header("Location: teacher.php");
    exit;
  } 


?>