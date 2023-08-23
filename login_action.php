<?php
      include('connection.php');
      include('config.php');
?>

<?php

      if(isset($_POST['btn_login'])){
          $email = $_POST['email'];
          $password = $_POST['password'];
            
          $sql = "SELECT * FROM users WHERE gmail = '$email' ";
          $user = $mysql->query($sql);
  
          // check if count row bigger than 0
            if($user->num_rows > 0){
                  $row = $user->fetch_assoc();
                  if(password_verify($password, $row['password'])){
                        $user_sql = "SELECT users.id, users.name, users.status, users.role FROM users WHERE gmail = '$email' LIMIT 1";
                        $result = $mysql->query($user_sql);
                        $user = $result->fetch_object();

                        if($user->status == 1){
                              $_SESSION['user'] = $user;
                              $_SESSION['is_login'] = '1';
                              
                              
                              $_SESSION['success_sms'] = "Welcome $user->name!";
                              
                              if($user->role == 1){
                                    header("location: index.php");
                              }

                        }else{
                              $_SESSION['error_sms'] = " Your account had been banned.";
                              header('location: login.php');
                        }

                  }else{
                        $_SESSION['error_sms'] = 'Inncorrect password';
                        header('location: login.php');
                  }
      }else{
            $_SESSION['error_sms'] = 'Please, Try again or Register new account.';
          header('location: login.php');
      }
}

?>