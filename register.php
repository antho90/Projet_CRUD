<?php require 'inc/header.php'; ?>

    <?php 
        if(!empty($_POST)){

            $errors = array();
            require_once 'inc/db.php';

            if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){

                $errors['username'] = "Votre pseudo n'est pas valide";
            }else{
                   $req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
                   $req->execute([$_POST['username']]);
                   $user = $req->fetch();
                  if($user){

                    $errors['username'] = 'Ce pseudo est déjà pris';
                  }


            }

            if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){

                $errors['password'] = "Vous devez rentrer un mot de passe valide";

            }
               if(empty($errors)){
                   
                   $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?");
                   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                   $req->execute([$_POST['username'], $password]);
                   die('Notre comptes a bien été créé');

               } 

            
            debug($errors);
        }

?>

    <h1> S'inscrire </h1>

       <?php if(!empty($errors)): ?>
          <div class="alert alert-danger">
            <p>Vous n'avez pas rempli le formulaire correctement</p>
              <ul>
                  
                    <?php foreach($errors as $error): ?>
                     <li><?=error; ?></li>
                    <?php endforeach; ?>
                </ul>
          </div>
     
       <form action="" method="POST">

          <div class="form-group">
              <label for="">Pseudo</label>
            <input type="text" name="username" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="">Mot de passe</label>
            <input type="password" name="password" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="">Confirmez votre mot de passe</label>
            <input type="password" name="password_confirm" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary">M'inscrire</button>

    </form>

<?php require 'inc/footer.php'; ?>
