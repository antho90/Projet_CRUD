<?php 
 function debug($variable){

      echo '<pre>' .print_r($variable,true) .'</pre>';
 }

 function interdit(){

     if (!isset($_SESSION['auth'])){
          if(session_status() == PHP_SESSION_NONE){
               session_start();
             }
          $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page!";
          header('Location: login.php');
          exit();
     }
 }