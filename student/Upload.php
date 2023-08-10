<?php 
session_start();
{
      
       include "../DB_connection.php";
       include "data/student.php";
       $student_id = $_SESSION['student_id'];
      

       if ($student_id == 0) {
         header("Location: index.php");
         exit;
       }
       $sql="SELECT * FROM students WHERE student_id={$_SESSION["student_id"]}";
       $res=$db->query($sql);
   
       if($res->num_rows>0)
       {
         $row=$res->fetch_assoc();
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
      
      }
       if(isset($_POST["form-submit"]))
       {
       
	
			
			
         $target="../img/";
         $target_file=$target.basename($_FILES['form_137']["name"]);
         $target_files=$target.basename($_FILES['1x1_picture']["name"]);
         $target_filess=$target.basename($_FILES['birth_cert']["name"]);
         
         if(move_uploaded_file($_FILES['form_137']['tmp_name'],$target_file))
         {
           $sql="UPDATE students set Form_137 ='{$target_file}'where student_id={$_SESSION["student_id"]}";
           $db->query($sql);
           echo "<div class='alert alert-success' role='alert'>Insert Success</div>";
           
         }
         if(move_uploaded_file($_FILES['1x1_picture']['tmp_name'],$target_files))
         {
           $sql="UPDATE students set 1x1_pic ='{$target_files}'where student_id={$_SESSION["student_id"]}";
           $db->query($sql);
           echo "<div class='alert alert-success' role='alert'>Insert Success</div>";
           
         }
         if(move_uploaded_file($_FILES['birth_cert']['tmp_name'],$target_filess))
         {
           $sql="UPDATE students set birth_certificate ='{$target_filess}'where student_id={$_SESSION["student_id"]}";
           $db->query($sql);
           echo "<div class='alert alert-success' role='alert'>Insert Success</div>";
           
         }
        
         
       }
      
     ?>
     
        <form method="post"
              class="shadow p-3 mt-5 form-w " 
              action="Upload.php"
              enctype="multipart/form-data">
        <h3>Upload Files
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
        <form>
        
    <div class="form-group mb-3">
        <label for="form_137">Form 137</label>
        <input type="file" class="form-control-file" name="form_137"  >
        <button type="submit" 
              class="btn btn-primary" name ="form-submit">
              Upload</button>
        
        <?php
        if(!empty($_GET['Form_137']))
        $row =scandir("Upload/");
       echo $row["Form_137"];   
        ?>
     
        
       <?php
         ?> <a href="<?php echo $row["Form_137"]; ?>" download="<?php echo $row["Form_137"]; ?>">
         Download
     </a>
              
        </div>
        <div class="form-group mb-3">
        <label for="form_137">1x1 Picture</label>
        <input type="file" class="form-control-file" name="1x1_picture"  >
        <button type="submit" 
              class="btn btn-primary" name ="form-submit">
              Upload</button>
     
     <?php
        if(!empty($_GET['1x1_pic']))
        $row =scandir("Upload/");
       echo $row["1x1_pic"]; 
        ?>
     
        
       <?php
         ?> <a href="<?php echo $row["1x1_pic"]; ?>" download="<?php echo $row["1x1_pic"]; ?>">
         Download
     </a>
     </div>
          <div class="form-group mb-3">
        <label for="form_137">Birth Certificate</label>
        <input type="file" class="form-control-file" name="birth_cert"  >
        <button type="submit" 
              class="btn btn-primary" name ="form-submit">
              Upload</button>
              <?php
        if(!empty($_GET['birth_certificate']))
        $row =scandir("Upload/");
       echo $row["birth_certificate"]; 

        
        ?> <a href="<?php echo $row["birth_certificate"]; ?>" download="<?php echo $row["birth_certificate"]; ?>">
         Download
           </a>
          
           <?php
          if (empty($_FILES)) {
          $em  = "File not Found";
          exit;
          }
    
  ?>

               
    
        
      
    
    
          
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
       
            });  
          
      
    </script>
</body>
          

</html>
          
          <?
                