<?php 

    // config root path 
      define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/institueManagment');
      define('BASE_URL', 'http://localhost/institueManagment/');
      
      // db
      include_once(ROOT_PATH.'/connection.php');

      // base url function, this will return full path of url (ex: http://localhost/highschool/user/index.php)
      function base_url($uri){
            echo BASE_URL.$uri;
      }

      // check if user not login 
      if(!(isset($_SESSION['is_login']) && $_SESSION['is_login'] == '1')){
            $root_path = BASE_URL.'login.php';
            header("location: $root_path");
      }


    // showing sms 
      $sms = '';
      if(isset($_SESSION['sms']) && $_SESSION['sms']){
            $sms = "<div class='m-1 alert alert-primary' role='alert'>".$_SESSION['sms']."</div>";
            unset($_SESSION['sms']);
      }
    
?>  