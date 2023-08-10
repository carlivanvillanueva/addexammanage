<?php 
 include '../../DB_connection.php';

 extract($_POST);

 $selGrade = $conn->query("SELECT * FROM exam_tbl WHERE ex_title='$examTitle' ");



 if($courseSelected == "0")
 {
 	$res = array("res" => "noSelectedCourse");
 }
 else if($timeLimit == "0")
 {
 	$res = array("res" => "noSelectedTime");
 }
 else if($examQuestDipLimit == "" && $examQuestDipLimit == null)
 {
 	$res = array("res" => "noDisplayLimit");
 }
 else if($selGrade->rowCount() > 0)
 {
	$res = array("res" => "exist", "examTitle" => $examTitle);
	$sm1 = "Exam registered exist";
    header("Location: ../add-exam.php?success=$sm1");
 }
 else
 {
    
	$insExam = $conn->query("INSERT INTO exam_tbl(Classes_id,ex_title,ex_time_limit,ex_questlimit_display,ex_description) VALUES('$courseSelected','$examTitle','$timeLimit','$examQuestDipLimit','$examDesc') ");
	if($insExam)
	{
		$res = array("res" => "success", "examTitle" => $examTitle);
		$sm = "New Exam registered successfully";
    	header("Location: ../add-exam.php?success=$sm");
	}
	else
	{
		$res = array("res" => "failed", "examTitle" => $examTitle);
	}


 }




 echo json_encode($res);
 ?>