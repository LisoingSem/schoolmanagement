
<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $course_id = $_POST['course_id'];
            $phone_number = $_POST['number_phone'];
            $gmail = $_POST['email'];
            $status = $_POST['status'];
      
            $sql = " UPDATE teachers SET 
                        `first_name` = '$first_name',
                        `last_name` = '$last_name',
                        `course_id` = '$course_id',
                        `gmail` = '$gmail',
                        `phone_number` = '$phone_number',
                        `status` = '$status' 
                        WHERE `id` = $id ";

            if($mysql->query($sql)){
                  $_SESSION['success_sms'] = "Teacher Updated successfully.";
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