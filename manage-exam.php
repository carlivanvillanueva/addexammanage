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
    include "../DB_connection.php";
        include "inc/navbar.php";
        include "inc/footer.php";
    ?>
    <?php 
   $exId = $_GET['id'];

   $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exId' ");
   $selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);

   $grade_id = $selExamRow['grade_id'];
   $selGrade = $conn->query("SELECT grade as gradeName FROM class WHERE Classes_id='$grade_id' ")->fetch(PDO::FETCH_ASSOC);
 ?>


<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> MANAGE EXAM
                        </div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-6">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <h4> Exam Information </h4>
                          </div>
                          <div class="card-body">
                           <form method="post" action="query/updateExamExe.php">
                               <div class="form-group">
                                <label>Section</label>
                                <select class="form-control" name="grade_id" required="">
                                  <option value="<?php echo $selExamRow['grade_id']; ?>"><?php echo $selGrade['gradeName']; ?></option>
                                  <?php 
                                    $selAllGrade = $conn->query("SELECT * FROM class ORDER BY Classes_id DESC");
                                    while ($selAllGradeRow = $selAllGrade->fetch(PDO::FETCH_ASSOC)) { ?>
                                      <option value="<?php echo $selAllGradeRow['Classes_id']; ?>"><?php echo $selAllGradeRow['grade']; ?></option>
                                    <?php }
                                   ?>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Exam Title</label>
                                <input type="hidden" name="examId" value="<?php echo $selExamRow['ex_id']; ?>">
                                <input type="" name="examTitle" class="form-control" required="" value="<?php echo $selExamRow['ex_title']; ?>">
                              </div>  

                              <div class="form-group">
                                <label>Exam Description</label>
                                <input type="" name="examDesc" class="form-control" required="" value="<?php echo $selExamRow['ex_description']; ?>">
                              </div>  

                              <div class="form-group">
                                <label>Exam Time limit</label>
                                <select class="form-control" name="examLimit" required="">
                                  <option value="<?php echo $selExamRow['ex_time_limit']; ?>"><?php echo $selExamRow['ex_time_limit']; ?> Minutes</option>
                                  <option value="10">10 Minutes</option> 
                                  <option value="20">20 Minutes</option> 
                                  <option value="30">30 Minutes</option> 
                                  <option value="40">40 Minutes</option> 
                                  <option value="50">50 Minutes</option> 
                                  <option value="60">60 Minutes</option> 
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Display limit</label>
                                <input type="number" name="examQuestDipLimit" class="form-control" value="<?php echo $selExamRow['ex_questlimit_display']; ?>"> 
                              </div>

                              <div class="form-group" align="right">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                              </div> 
                           </form>                           
                          </div>
                      </div>
                   
                  </div>
                  <div class="col-md-6">
                    <?php 
                        $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$exId' ORDER BY eqt_id desc");
                    ?>
                     <div class="main-card mb-3 card">
                          <div class="card-header">
                                <form method="post"
              class="shadow p-3 my-5 form-w" 
              action="query/addQuestionExe.php">
        <h3>Add Question(s) for <?php echo $selExamRow['ex_title']; ?> </h3><hr>
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
            <div>
            <label class="form-label">Question</label>
            <input type="hidden" name="exam_id" value="<?php echo $exId; ?>">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Input Question" autocomplete="off">
            </div>

            <fieldset>
            <legend>Input word for choice's</legend>
            <div class="form-group">
                <label>Choice A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Input choice A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Input choice B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Input choice C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Input choice D" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Correct Answer</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Input correct answer" autocomplete="off">
            </div>
          </fieldset>

          <button type="submit" 
              class="btn btn-primary">
              Add Exam</button>
        </form>
                              </div>
                          </div>
                          <div class="card-body" >
                            <div class="scroll-area-sm" style="min-height: 400px;">
                               <div class="scrollbar-container">

                            <?php 
                               
                               if($selQuest->rowCount() > 0)
                               {  ?>
                                 <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                                        <thead>
                                        <tr>
                                            <th class="text-left pl-1">Question(s) Name</th>
                                            <th class="text-center" width="20%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            
                                            if($selQuest->rowCount() > 0)
                                            {
                                               $i = 1;
                                               while ($selQuestionRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                        <td >
                                                            <b><?php echo $i++ ; ?> .) <?php echo $selQuestionRow['exam_question']; ?></b><br>
                                                            <?php 
                                                              // Choice A
                                                              if($selQuestionRow['exam_ch1'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">A - <?php echo  $selQuestionRow['exam_ch1']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">A - <?php echo $selQuestionRow['exam_ch1']; ?></span><br>
                                                              <?php }

                                                              // Choice B
                                                              if($selQuestionRow['exam_ch2'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                              <?php }

                                                              // Choice C
                                                              if($selQuestionRow['exam_ch3'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                              <?php }

                                                              // Choice D
                                                              if($selQuestionRow['exam_ch4'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                              <?php }

                                                             ?>
                                                            
                                                        </td>
                                                        <td class="text-center">
                                                         <a rel="facebox" href="facebox_modal/updateQuestion.php?id=<?php echo $selQuestionRow['eqt_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                                         <button type="button" id="deleteQuestion" data-id='<?php echo $selQuestionRow['eqt_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                                        </td>
                                                    </tr>
                                               <?php }
                                            }
                                            else
                                            { ?>
                                                <tr>
                                                  <td colspan="2">
                                                    <h3 class="p-3">No Course Found</h3>
                                                  </td>
                                                </tr>
                                            <?php }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                               <?php }
                               else
                               { ?>
                                  <h4 class="text-primary">No question found...</h4>
                                 <?php
                               }
                             ?>
                               </div>
                            </div>


                          </div>
                        
                      </div>
                  </div>
              </div>  
            </div> 
            </div>
               
            </div>

     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 

  }else {
    header("Location: teacher.php");
    exit;
  } 


?>