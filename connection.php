<?php

      define('HOST_NAME', 'localhost');
      define('USER_NAME', 'root');
      define('PASSWORD', '');
      define('DATABASE', 'schollmanagement');
      // connect to database
      $mysql = new mysqli(HOST_NAME, USER_NAME, PASSWORD, DATABASE);
  
      // Check connection
      if($mysql->connect_errno) {
          echo "Failed to connect to MySQL: " . $mysql->connect_error;
          exit();
      }

      session_start();
      
?>