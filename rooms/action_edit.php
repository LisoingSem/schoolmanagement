
<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $teacher_id = $_POST['teacher_id'];
            $floor_id = $_POST['floor_id'];
            if($_POST['teacher_id'] == 0){
                  $status = 0;
            }else{
                  $status = 1;
            }
      
            $sql = " UPDATE rooms 
                        SET `name` = '$name',
                        `floor_id` = '$floor_id',
                        `teacher_id` = '$teacher_id',
                        `status` = '$status' 
                        WHERE `id` = $id ";

            if($mysql->query($sql)){
                  $_SESSION['success_sms'] = "Rooms Updated successfully.";
                  header('location: index.php');
            }else{
                  $_SESSION['error_sms'] = "Data not updated!";
                  header('location: index.php');
            }
      
      }else{
            $_SESSION['error_sms'] = "Something Error!";
            header('location: index.php');
      }
?>