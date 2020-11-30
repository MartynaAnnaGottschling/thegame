<?php

  session_start();

  // if user is not logged in redirect to game panel
  if (isset($_SESSION['logged_user'])){
    header('Location: game.php');
    exit();
  }

 ?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Game</title>
  </head>
  <body>
    <h1>Wikingowie i Słowianie</h1>
    <h3 style="display:inline-block;margin:auto 2%;">Wybierz swój lud</h2>
    <h3 style="display:inline-block;margin:auto 2%;">Zbuduj osadę</h3>
    <h3 style="display:inline-block;margin:auto 2%;">Zbierz wojsko</h3>
    <h2 style="display:inline-block;margin:auto 2%;">Przetrwaj!</h2>

    <form class="" action="login.php" method="post">
      <p> Login: <input type="text" name="login" value=""> </p>
      <p> Hasło: <input type="password" name="password" value=""> </p>
      <input type="submit" value="Zaloguj">
    </form>
    <br>

    <?php
      if(isset($_SESSION['error_login'])) echo $_SESSION['error_login'];

     ?>
  </body>
</html>
