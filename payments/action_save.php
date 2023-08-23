<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
          $student_id = $_POST['student_id'];
          $course_id = $_POST['course_id'];
          $class_id = $_POST['class_id'];
          $status = $_POST['status'];
  
          $sql = "INSERT INTO payments (`student_id`, `class_id`, `course_id`, `status`)
                                          VALUES('$student_id', '$class_id', '$course_id', '$status') ";
          
          if($mysql->query($sql)){
              $_SESSION['success_sms'] = "Payment inserted successfully.";
              header('location: index.php');
          }else{
              $_SESSION['error_sms'] = "Data not insert!";
              header('location: index.php');
          }
  
      }else{
            $_SESSION['error_sms'] = "Something Error!";
          header('location: index.php');
      }
?>