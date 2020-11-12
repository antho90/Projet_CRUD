<?php 
    require_once 'inc/function.php';
    require_once 'inc/db.php';
 require_once 'inc/header.php'; 
      if(!empty($_POST)){
       
               $titre= $_POST['titre'];
               $synopsis= $_POST['synopsis'];

                  $pdo->prepare('UPDATE resum SET titre=?, synopsis=? WHERE id=?')->execute( [$titre, $synopsis, $_GET['id']]);

                    $_SESSION['flash']['success'] = "Votre résumé a bien été modifier";
                    header('Location: actu.php');
      }

  $req = $pdo->prepare('SELECT resum.titre,resum.synopsis,resum.id_user,users.id FROM resum,users WHERE resum.id = ?');
  $req->execute([$_GET['id']]);
  $film =$req->fetch();
   if($film && $_SESSION['auth']->id === $film->id_user){

  
?>

      <h1> Modifier votre publication</h1><br><br>
          
          <form action="" method="post">
             <div class="form-group">
                  <input value="<?php echo $film->titre ?>" type="text" name="titre" placeholder="Changer le tire" class="form-control"/>
             </div>

             <form action="" method="post">
             <div class="form-group">
                  <textarea name="synopsis" placeholder="Changer le synopsis" class="form-control"><?php echo $film->synopsis ?></textarea>
             </div>
               <button class="btn btn-outline-success">Valider</button>

            </form>
   
    <?php require 'inc/footer.php'; 
   }else{

      $_SESSION['flash']['danger'] = "Ce film n'existe pas ou vous n'y avez pas accès";
      header('Location: account.php');
   }
         
         
         
         
         ?>