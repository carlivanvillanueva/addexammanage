<?php 
session_start();
if (isset($_SESSION['student_id'])) {
{
      
       include "../DB_connection.php";
       include "../admin/data/subject.php";
       include "../admin/data/grade.php";
       include "data/student.php";
       $subjects = getAllSubjects($conn);
       $grades = getAllGrades($conn);
       $student_id = $_SESSION['student_id'];
       $student = getStudentById($student_id, $conn);

       if ($student == 0) {
         header("Location: index.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
     ?>
        <form method="post"
              class="shadow p-3 mt-5 form-w " 
              action="req/profile_edit.php">
        <h3>Edit Profile
          <a href="Upload.php" button type="submit" class="btn justify-content-md-end btn-primary btn btn-lg ">Upload Files
          </button> </a>
        
       
        </h3><hr>
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
          <label class="form-label">LRN</label>
          <input type="text" 
                 class="form-control bg-secondary text-white"
                 value="<?=$student['lrn']?>"
                 name="lrn"
                 maxlength="12" max="999999999999" readonly>
        <?php } ?>
        <div class="mb-3  ">
          <label class="form-label">First name</label>
          <input type="text" 
                 class="form-control bg-secondary text-white"
                 value="<?=$student['first_name']?>" 
                 name="fname" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Last name</label>
          <input type="text" 
                 class="form-control bg-secondary text-white"
                 value="<?=$student['last_name']?>"
                 name="lname" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['address']?>"
                 name="address">
        </div>
        <div class="mb-3">
          <label class="form-label">Religion</label>
          <input type="text" 
                 class="form-control bg-secondary text-white"
                 value="<?=$student['religion']?>"
                 name="religion" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Date of birth</label>
          <input type="date" 
                 class="form-control"
                 value="<?=$student['date_of_birth']?>"
                 name="date_of_birth">
        </div>
      
                
          <label class="form-label">Gender</label><br>
          <input type="radio"
                 value="Male"
                 <?php if($student['gender'] == 'Male') echo 'checked';  ?> 
                 name="gender" disabled> Male
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio"
                 value="Female"
                 <?php if($student['gender'] == 'Female') echo 'checked';  ?> 
                 name="gender"disabled> Female 
        </div>

        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" 
                 class="form-control bg-secondary text-white"
                 value="<?=$student['username']?>"
                 name="username" readonly>
        </div>
        <input type="text"
                value="<?=$student['student_id']?>"
                name="student_id"
                hidden>

        <div class="mb-3">
          <label class="form-label">Grade</label>
          <div class="row row-cols-5" >
            <?php 
            $grade_ids = str_split(trim($student['grade']));
            foreach ($grades as $grade){ 
              $checked =0 ;
              foreach ($grade_ids as $grade_id ) {
                if ($grade_id == $grade['grade_id']) {
                   $checked =1;
                }
              }
            ?>
            <div class="col">
              <input type="radio"
                     name="grade" disabled
                     <?php if($checked) echo "checked"; ?>
                     value="<?=$grade['grade_id']?>">
                     <?=$grade['grade_code']?>-<?=$grade['grade']?>
            </div>
            <?php } ?>
             
          </div>
        </div>

        <div class="mb-3">
        
        </div>
        <br><hr>

        <div class="mb-3">
          <label class="form-label">Parent/Guardian First Name</label>
          <input type="text" 
                 class="form-control bg-secondary text-white"
                 value="<?=$student['guardian_parent_first_name']?>"
                 name="parent_fname" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Parent/Guardian Last Name</label>
          <input type="text" 
                 class="form-control bg-secondary text-white"
                 value="<?=$student['guardian_parent_last_name']?>"
                 name="parent_lname" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Parent Phone Number</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['guardian_parent_phone_number']?>"
                 name="guardian_parent_phone_number"
                 maxlength="11">
        </div>
      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

  
  
      
    </script>

</body>
</html>
<?php 
    
  }else {
    header("Location: index.php");
    exit;
  }

?>