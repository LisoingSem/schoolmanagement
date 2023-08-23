<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $gender = $_POST['gender'];
          $course_id = $_POST['course_id'];
          $phone_number = $_POST['number_phone'];
          $email = $_POST['email'];
  
          $sql = "INSERT INTO teachers (`first_name`, `last_name`,`gender`, `course_id`, `phone_number`, `gmail`)
                              VALUES('$first_name', '$last_name','$gender','$course_id', '$phone_number', '$email')";
          
          if($mysql->query($sql)){
              $_SESSION['success_sms'] = "Teacher inserted successfully.";
              header('location: index.php');
          }else{
              $_SESSION['error_sms'] = "Data not inserte!";
              header('location: index.php');
          }
  
      }else{
            $_SESSION['error_sms'] = "Data not inserte!";
          header('location: index.php');
      }
?>