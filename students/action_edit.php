
<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $number_phone = $_POST['phone_number'];
            $course_id = $_POST['course_id'];
            $gender = $_POST['gender'];
            $status = $_POST['status'];
      
            $sql = " UPDATE students 
                        SET `first_name` = '$first_name',
                        `last_name` = '$last_name',
                        `gender` = '$gender',
                        `phone_number` = '$number_phone',
                        `course_id` = '$course_id',
                        `status` = '$status' 
                        WHERE `id` = $id ";

            if($mysql->query($sql)){
                  $_SESSION['success_sms'] = "Student Updated successfully.";
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