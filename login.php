<?php
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
     require_once 'inc/db.php';
     require_once 'inc/function.php';
     $req = $pdo->prepare('SELECT * FROM users WHERE username = :username');
     $req->execute(['username' => $_POST['username']]);
     $user = $req->fetch();
     if (password_verify($_POST['password'], $user->password)) {
          session_start();
          $_SESSION['auth'] = $user;
          $_SESSION['flash']['success'] = 'Vous êtes connecté';
          header('Location: home.php');
          exit();
     } else {
          $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
     }
}

?>
<?php require 'inc/header.php'; ?>

<h1>Connexion </h1>

<form action="" method="POST">

     <div class="form-group">
          <label for="">Pseudo</label>
          <input type="text" name="username" class="form-control" />
     </div>

     <div class="form-group">
          <label for="">Mot de passe</label>
          <input type="password" name="password" class="form-control" />
     </div>

     <button type="submit" class="btn btn-primary">Se connecter</button>

</form>

<?php require 'inc/footer.php'; ?>