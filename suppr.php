<?php
require_once 'inc/function.php';
require_once 'inc/db.php';
require_once 'inc/header.php';
if (!empty($_POST)) {

   $titre = $_POST['titre'];
   $synopsis = $_POST['synopsis'];

   $pdo->prepare('DELETE FROM resum WHERE id=?')->execute([$_GET['id']]);

   $_SESSION['flash']['success'] = "Votre résumé a bien été supprimer";
   header('Location: actu.php');
   exit();
}

$req = $pdo->prepare('SELECT resum.titre,resum.synopsis,resum.id_user,users.id FROM resum,users WHERE resum.id = ?');
$req->execute([$_GET['id']]);
$film = $req->fetch();
if ($film && $_SESSION['auth']->id === $film->id_user) {


?>

<div class="center">
   <h1> Supprimer votre publication</h1><br><br>

   <form action="" method="post">
      <div class="form-group w">
         <input value="<?php echo $film->titre ?>" type="text" readonly name="titre" placeholder="Changer le tire" class="form-control" />
      </div>

      <form action="" method="post">
         <div class="form-group w">
            <textarea rows="8" readonly name="synopsis" placeholder="Changer le synopsis" class="form-control"><?php echo $film->synopsis ?></textarea>
         </div>
         <button class="btn btn-outline-danger w">Suppr</button>

      </form>
</div>
   <?php require 'inc/footer.php';
} else {

   $_SESSION['flash']['danger'] = "Ce film n'existe pas ou vous n'y avez pas accès";
   header('Location: resume.php');
}




   ?>