<?php 
session_start();

if (isset($_SESSION['student_id'])){

 ?>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>
<?php 
  include("inc/navbar.php");
  include("query/selectData.php");
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student - Profile</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- MAIN CSS NIYA -->
    
    <link href="css/sweetalert.css" rel="stylesheet">
    <link href="css/facebox.css" rel="stylesheet">
</head>
<body>


<div class="table-responsive">
              <table class="table table-striped table-bordered mt-3  ">
                <thead>
                  <tr>
                    
                    <th scope="col">EXAMS</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                
<?php 
    
                 
                    if($selExam->rowCount() > 0)
                    {
          
    ?><tr>
                                 
                              
                        <?php }

                    else
                    { ?>
                        <a href="#">
                            <i class="metismenu-icon"></i>No Exam's @ the moment
                        </a>
                    <?php }
                

 


      
            
        if($selExam->rowCount() > 0)
        {
            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?> 
            <td>
                    <?php 
                        $lenthOfTxt = strlen($selExamRow['ex_title']);
                        if($lenthOfTxt >= 23)
                        { ?>
                            <?php echo substr($selExamRow['ex_title'], 0, 20);?>.....
                        <?php }
                        else
                        {
                            echo $selExamRow['ex_title'];
                        }
                     ?>
                     </td>
                     <td>
    <button id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>">Start</button>
</td>
                   </tr>
            <?php }
        }
     
        else
        { ?>
            <a href="#">
                <i class="metismenu-icon"></i>No Exam's @ the moment
            </a>
        <?php }
        ?>

<script>
    document.getElementById("startQuiz").addEventListener("click", function() {
        var examId = this.getAttribute("data-id");
        window.location.href = "home.php?examId=" + examId;
         // Replace "newPage.php" with the actual URL of the destination page
    });
</script>

</body>
</html>
<?php

}else {
	header("Location: ../Studentlogin.php");
	exit;
} 

?>