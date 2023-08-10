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
	<title>Teacher</title>
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
              action="query/addExamExe.php">
        <h3>Add Exam</h3><hr>
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
            <label class="form-label">Grade Level</label>
            <select class="form-control" name="courseSelected">
              <option value="0">Select Grade Level</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM class ORDER BY Classes_id");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['Classes_id']; ?>"><?php echo $selCourseRow['grade_code']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">No Course Found</option>
                <?php }
               ?>
            </select>
            </div>

            <div>
            <label class="form-label">Exam Time Limit</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">Select Time</option>
              <option value="10">10 Minutes</option> 
              <option value="20">20 Minutes</option> 
              <option value="30">30 Minutes</option> 
              <option value="40">40 Minutes</option> 
              <option value="50">50 Minutes</option> 
              <option value="60">60 Minutes</option> 
            </select>
            </div>

            <label class="form-label">Question Limit to Display</label>
            <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Input question limit to display">

            <label class="form-label">Exam Title</label>
            <input type="" name="examTitle" class="form-control" placeholder="Input Exam Title" required="">

            <label class="form-label">Exam Description</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="Input Exam Description" required=""></textarea>
            </div> 
          </div>

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