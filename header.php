<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">GAME STORE</a>
  </div>
</nav>
<div class="container">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="http://localhost/project_uas_game/">GAME STORE</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if( isset($_SESSION['login']) ) : ?>
            <li class="nav-item">
                <span class="nav-link active">Halo, <?= $_SESSION['username']; ?> (<?= $_SESSION['role']; ?>)</span>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger btn-sm text-white ms-lg-3 px-3" href="http://localhost/project_uas_game/Auth/logout">Logout</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link btn btn-light btn-sm text-primary fw-bold px-3" href="http://localhost/project_uas_game/Auth">Login</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>