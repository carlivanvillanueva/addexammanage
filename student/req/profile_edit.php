<<?php 
session_start();
if (isset($_SESSION['student_id'])) {
        

 
    include '../../DB_connection.php';
   include "../data/student.php";

   
    $address = $_POST['address'];
    $date_of_birth = $_POST['date_of_birth'];
    $parent_phone_number = $_POST['guardian_parent_phone_number'];

    $student_id = $_POST['student_id'];
    
   

    $data = 'student_id='.$student_id;

    
  
    if (empty($address)) {
        $em  = "Address is required";
        header("Location: ../Profile_edit.php?error=$em&$data");
        exit;

    }else if (empty($date_of_birth)) {
        $em  = "Date of birth is required";
        header("Location: ../Profile_edit.php?error=$em&$data");
        exit;
   
    }else if (empty($parent_phone_number)) {
        $em  = "Parent phone number is required";
        if(!preg_match('/^[0-9]{11}+$/', $parent_phone_number)){
            $em = "Parent Phone number is invalid!";        
        header("Location: ../Profile_edit.php?error=$em&$data");
        exit;
        }
    }else {


        $sql = "UPDATE students SET
                address=?, date_of_birth=?,guardian_parent_phone_number=?
                WHERE student_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$address,$date_of_birth,$parent_phone_number, $student_id]);
        $sm = "successfully updated!";
        header("Location: ../Profile_edit.php?success=$sm&$data");
        exit;
    }
    
  }else {
    $em = "An error occurred";
    header("Location: ../student.php?error=$em");
    exit;
  }

  