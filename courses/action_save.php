<?php
      include('../config.php');

      // check if user click button save 
      if(isset($_POST['btn_save'])){
          $name = $_POST['name'];
          $price = $_POST['price'];
  
          $sql = "INSERT INTO courses (`name`, `price`)
                              VALUES('$name', '$price')";
          
          if($mysql->query($sql)){
              $_SESSION['success_sms'] = "Course inserted successfully.";
              header('location: index.php');
          }else{
              $_SESSION['error_sms'] = "Data not inserte!";
              header('location: index.php');
          }
  
      }else{
            $_SESSION['error_sms'] = "Something Error!";
          header('location: create.php');
      }
?>