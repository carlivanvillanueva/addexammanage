<?php 
session_start();
if (isset($_SESSION['student_id'])){

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
    <?php include("DB_connection.php"); ?>
    <?php include("query/selectData.php"); ?>
    <?php 
        include "inc/navbar.php";
     ?>
     <div style="display: flex;">
  <div class="table-responsive">
    <table class="table table-striped table-bordered mt-3">
      <thead>
        <tr>
          <th scope="col">EXAMS</th>
          <th scope="col">Time Taken</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $selTakenExam = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE student_id='$student_id' ORDER BY ea.examat_id  ");

        if($selTakenExam->rowCount() > 0)
        {
          while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td>
                <a href="home.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>"><?php echo $selTakenExamRow['ex_title']; ?></a>
              </td>
              <td>
                <?php echo $selTakenExamRow['time_taken']; ?>
              </td>
            </tr>
          <?php } 
        }    
        else
        { ?>
          <tr>
            <td colspan="2">
              <a href="#" class="pl-3">You are not taking an exam yet</a>
            </td>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
<?php

}else {
	header("Location: ../Studentlogin.php");
	exit;
} 

?>