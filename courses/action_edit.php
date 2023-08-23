
<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $status = $_POST['status'];
      
            $sql = " UPDATE courses 
                        SET `name` = '$name',
                        `price` = '$price',
                        `status` = '$status' 
                        WHERE `id` = $id ";

            if($mysql->query($sql)){
                  $_SESSION['success_sms'] = "Course Updated successfully.";
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