<?php 
$student_id = $_SESSION['student_id'];

// Select Data sa nilogin nga examinee
$selExmneeData = $conn->query("SELECT * FROM students WHERE student_id='$student_id' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['grade'];


        
// Select and tanang exam depende sa course nga ni login 
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE grade_id='$exmneCourse' ORDER BY ex_id DESC ");


//

 ?>