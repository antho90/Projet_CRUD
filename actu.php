<?php 
   require 'inc/function.php';
   require_once 'inc/db.php';

       $pdostat = $pdo->prepare('SELECT * FROM resum');


       $executeIsOk = $pdostat->execute();

        $resumes = $pdostat->fetchAll();
         
?>

   <?php require 'inc/header.php'; ?>

      <h1> Actu films et séries</h1><br><br>

        <h2> Découvrer les films et séries à l'actu</h2><br>
              
                <ul>
                    <?php foreach ($resumes as $resume1): ?>
                       <li>
                           <?= "$resume1->titre" ?> : <br><br> <?= "$resume1->synopsis" ?><br><br> écrit par :   <?= "$resume1->nom_post" ?><br><br>

                        </li>

                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Modifier</button>
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Supr</button>
                    <?php endforeach; ?>

                </ul>
    

    <?php require 'inc/footer.php'; ?>