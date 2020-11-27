<?php

  session_start();

  $user_nick = $_SESSION['user']['nick'];
  $user_materials = $_SESSION['user']['materials'];
  $user_buildings = $_SESSION['user']['buildings'];
  $user_settlers = $_SESSION['user']['settlers'];
  $user_premium_days = $_SESSION['user']['premium_days'];

 ?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Game</title>
    <script src="https://kit.fontawesome.com/8baf17eccf.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <h1 style="display:inline-block;">Witaj Wojowniku</h1>
    <?php
      echo '<h1 style="display:inline-block; color: blue; margin-left: 10px;">'.$user_nick.'</h1>';
     ?>
    <br>

    <table style="text-align:center;">
      <tr>
        <th style="padding: 15px;">Materiały <i class="fas fa-gem fa-1x"></i></th>
        <th style="padding: 15px;">Budynki <i class="fas fa-users fa-1x"></i></th>
        <th style="padding: 15px;">Osadnicy <i class="fas fa-users fa-1x"></i></th>
      </tr>
      <tr>
        <td><?php echo $user_materials ?></td>
        <td><?php echo $user_buildings ?></td>
        <td><?php echo $user_settlers ?></td>
      </tr>
    </table>
    <br>

    <?php
      if ($user_premium_days == 1)
        echo "<p>Pozostało Ci jeszcze ".$user_premium_days." dzień konta premium</p>";
      else {
        echo "<p>Pozostało Ci jeszcze ".$user_premium_days." dni konta premium</p>";
      }
    ?>

  </body>
</html>
