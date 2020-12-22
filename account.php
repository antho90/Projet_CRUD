<?php
session_start();
require 'inc/function.php';
interdit();
require_once 'inc/db.php';
require_once 'inc/header.php';

$pdostat = $pdo->prepare('SELECT resum.id,resum.titre,resum.synopsis,resum.id_user,users.username FROM resum,users WHERE resum.id_user = users.id AND users.id =?');


$executeIsOk = $pdostat->execute([$_SESSION['auth']->id]);

$resumes = $pdostat->fetchAll();

?>



<h1 class="m_top text_center"> Votre Compte</h1><br><br>

<h2 class="text_center"> Modifier ou supprimer vos publications</h2><br><br>

<h3>Vos récentes publications : </h3><br>

<ul>
  <?php foreach ($resumes as $resume1) : ?>
    <li>
      <?= "$resume1->titre" ?> : <br><br> <?= "$resume1->synopsis" ?><br><br> écrit par : <?= "$resume1->username" ?><br><br>

    </li>
    <a href="modif.php?id=<?php echo $resume1->id ?>" class="btn btn-outline-success my-2 my-sm-0">Modifier</a>
    <a href="suppr.php?id=<?php echo $resume1->id ?>" class="btn btn-outline-danger my-2 my-sm-0">Suppr</a><br><br><br><br>
  <?php endforeach; ?>

</ul>


<?php require 'inc/footer.php';?>