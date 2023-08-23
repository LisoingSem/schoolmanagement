<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
            $name = $_POST['name'];
            $teacher_id = $_POST['teacher_id'];
            if($_POST['teacher_id'] != 0){
                  $staus = 1;
            }else{
                  $staus = 0;
            }
            $floor_id = $_POST['floor_id'];
  
          $sql = "INSERT INTO rooms (`name`, `floor_id`,`teacher_id`, `status`)
                              VALUES('$name', '$floor_id', '$teacher_id', '$staus')";
          
          if($mysql->query($sql)){
              $_SESSION['success_sms'] = "Rooms inserted successfully.";
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