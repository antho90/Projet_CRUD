<?php 
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>A l'eau Ciné</title>
</head>
<body>
    

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">A l'eau Ciné</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="home.php">Accueil</a></li>
       <?php if(isset($_SESSION['auth'])):?>

          <li class="nav-item"><a class="nav-link" href="logout.php">Se déconnecter</a></li>
          <li class="nav-item"><a class="nav-link" href="resume.php">Résumés</a></li>

       <?php else: ?>
      <li class="nav-item"><a class="nav-link" href="register.php">S'inscrire</a></li>

        <li class="nav-item"><a class="nav-link" href="login.php">Se connecter</a></li>
        
       <?php endif; ?>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

    <div class="container">

      <?php if(isset($_SESSION['flash'])): ?>
         <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type; ?>">
 
                <?= $message; ?>
            </div>
          <?php endforeach; ?>
          <?php unset($_SESSION['flash']); ?>
      <?php endif; ?>