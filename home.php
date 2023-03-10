<!DOCTYPE html>
<html>
  <head>
    <title>Homepage</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  </head>
  <body>
    <div class="main">
      <h1>Olá, <?=$_COOKIE['username']?>!</h1>
      <?php if ($_COOKIE['admin'] == 1): ?>
        <p>Você é um administrador</p>
      <?php else: ?>
        <p>Você não é um administrador</p>
      <?php endif; ?>
    </div>
  </body>
</html>