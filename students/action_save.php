<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $number_phone = $_POST['number_phone'];
            $course_id = $_POST['course_id'];
            $gender = $_POST['gender'];
      
            $sql = "INSERT INTO students (`first_name`, `last_name`,`gender`,`phone_number`, `course_id`)
                                    VALUES('$first_name', '$last_name','$gender', '$number_phone', '$course_id')";
          
            if($mysql->query($sql)){
                  $sql_payment = " INSERT INTO payments (`student_id`, `course_id`, `status`)
                                                VALUES('$id', '$course_id', '0')";
                  $mysql->query($sql_payment);
                  $_SESSION['success_sms'] = "Student inserted successfully.";
                  header('location: index.php');
            }else{
                  $_SESSION['error_sms'] = "Data not inserted!";
                  header('location: index.php');
            }
  
      }else{
            $_SESSION['error_sms'] = "Something Error!";
          header('location: index.php');
      }
?>