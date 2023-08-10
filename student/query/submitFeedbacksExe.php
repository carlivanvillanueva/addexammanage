<?php 
	session_start();
	include '../../DB_connection.php';
 extract($_POST);


$exmneSess = $_SESSION['examineeSession']['student_id'];

 $selMyFeedbacks = $conn->query("SELECT * FROM feedbacks_tbl WHERE student_id='$exmneSess' ");

 if($selMyFeedbacks->rowCount() >= 3)
 {
 	$res = array("res" => "limit");
 }
 else
 {
 	$date = date("F d, Y");
 	$insFedd = $conn->query("INSERT INTO feedbacks_tbl(student_id,fb_exmne_as,fb_feedbacks,fb_date) VALUES('$exmneSess','$asMe','$myFeedbacks','$date') ");

 	if($insFedd)
 	{
 		$res = array("res" => "success");
 	}
 	else
 	{
 		$res = array("res" => "failed");
 	}
 }


 echo json_encode($res);
 ?>