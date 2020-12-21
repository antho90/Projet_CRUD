<?php
require 'inc/function.php';
require_once 'inc/db.php';


$pdostat = $pdo->prepare('SELECT resum.id,resum.titre,resum.synopsis,resum.id_user,users.username FROM resum,users WHERE resum.id_user = users.id');


$executeIsOk = $pdostat->execute();

$resumes = $pdostat->fetchAll();

?>

<?php require 'inc/header.php'; ?>

<h1> Actu films et séries</h1><br><br>

<h3> Découvrer les films et séries à l'actu</h3><br><br>

<ul>
    <?php foreach ($resumes as $resume1) : ?>
        <li><span class="b">
                <?= "$resume1->titre" ?> : <br><br>
            </span>
            <?= "$resume1->synopsis" ?><br><br> écrit par :
            <?= "$resume1->username" ?><br><br>

        </li>

    <?php endforeach; ?>

</ul>


<?php require 'inc/footer.php'; ?>