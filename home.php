<?php 
 session_start();
   require 'inc/function.php';
   interdit();
   ?>

   <?php require 'inc/header.php'; ?>

      <h1> Accueil</h1>

    <?php debug($_SESSION); ?>

    <?php require 'inc/footer.php'; ?>