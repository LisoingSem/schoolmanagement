<?php
      include('connection.php');
?>

<?php

      if(isset($_POST['btn_save'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

            $sql = " SELECT gmail FROM users WHERE gmail = '$email' ";
            $result = $mysql->query($sql);
            $count = $result->num_rows;

            if($count == 0){
                  $sql = "INSERT INTO users (`name`, `gmail`,`password`)
                            VALUES('$name', '$email', '$password_hashed')";

                  if ($mysql->query($sql)) {
                        $_SESSION['sms_success'] = 'Inserted successfully.';
                        header('location: login.php');
                  } else {
                        header('location: login.php');
                        $_SESSION['sms_error'] = 'Something wrong!';
                        
                  }      
            }else{
                  $_SESSION['sms_error'] = 'Email already existed, Please try another Email.';
                  header('location: register.php');
            }
            
      } else {
            $_SESSION['error_sms'] = 'Wrong';
            header('location: register.php');
      }

?>