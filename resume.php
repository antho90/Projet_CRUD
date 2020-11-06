<?php 
require_once 'inc/function.php'; 
session_start();

 
        if(!empty($_POST)){

            $errors = array();
            require_once 'inc/db.php';

            if(empty($_POST['titre']) || !preg_match('/^[a-zA-Z0-9_\pL\pM\p{Zs}.-]+$/u', $_POST['titre'])){

                $errors['titre'] = "Le titre n'est pas valide";
            }else{
                   $req = $pdo->prepare('SELECT id FROM resum WHERE titre = ?');
                   $req->execute([$_POST['titre']]);
                   $user = $req->fetch();

            }

            if(empty($_POST['synopsis'])){

                $errors['synopsis'] = "Vous devez ecrire votre résumé";

            }
               if(empty($errors)){
                   
                   $req = $pdo->prepare("INSERT INTO resum SET titre = ?, synopsis = ?");
                   $synopsis = ($_POST['synopsis']);
                   $req->execute( [$_POST['titre'] , $synopsis]);
                   $_SESSION['flash']['success']= " Résumé envoyer! ";
                   header('Location: actu.php');
                   exit();

               } 

 
        }

?>




<?php require 'inc/header.php'; ?>

    <h1> Résumés films et séries</h1>

       <?php if(!empty($errors)): ?>
          <div class="alert alert-danger">
            <p>Vous n'avez pas rempli le formulaire correctement</p>
              <ul>
                  
                    <?php foreach($errors as $errors): ?>
                     <li><?=$errors; ?></li>
                    <?php endforeach; ?>
                </ul>
          </div>
      <?php endif; ?>

       <form action="" method="POST">

          <div class="form-group">
              <label for="">Nom film/série</label>
            <input type="text" name="titre" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="">Résumé</label>
            <input type="text" name="synopsis" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary">Poster</button>

    </form>

<?php require 'inc/footer.php'; ?>
