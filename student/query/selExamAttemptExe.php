<?php 
$student_id = $_SESSION['student_id'];
include '../DB_connection.php';

extract($_POST);

 $selExamAttmpt = $conn->query("SELECT * FROM exam_attempt WHERE student_id='$student_id' AND exam_id='$thisId' ");

 if($selExamAttmpt->rowCount() > 0)
 {
 	$res = array("res" => "alreadyExam", "msg" => $thisId);
 }
 else
 {
 	$res = array("res" => "takeNow");
 }


 echo json_encode($res);

 ?>