
<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
            $id = $_POST['id'];
            $student_id = $_POST['student_id'];
            $course_id = $_POST['course_id'];
            $class_id = $_POST['class_id'];
            $status = $_POST['status'];
      
            $sql = " UPDATE payments SET
                        `student_id` = '$student_id',
                        `class_id` = '$class_id',
                        `course_id` = '$course_id',
                        `status` = '$status' 
                        WHERE `id` = $id ";

            if($mysql->query($sql)){
                  $_SESSION['success_sms'] = "Payment Updated successfully.";
                  header('location: index.php');
            }else{
                  $_SESSION['error_sms'] = "Data not update!";
                  header('location: index.php');
            }
      
      }else{
            $_SESSION['error_sms'] = "Something Error!";
            header('location: index.php');
      }
?>