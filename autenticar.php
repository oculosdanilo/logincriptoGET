<?php
  require 'cripto.php';
  function autenticar($logins) {
    $existe = false;
    $i = 0;
    while ($i < count($logins)) {
      $usernameDB = cripto($logins[$i]->login);
      if ($usernameDB == $_POST['username']) {
        $usernameDigitado = $_POST['username'];
        $senhaDB = cripto($logins[$i]->senha);
        if ($senhaDB == $_POST['senha']) {
          $str = $_POST['username'] . $_POST['senha'];
          $token = md5($str);
          setcookie("username", $_POST['username'], time()+20*24*60*60);
          setcookie("admin", $logins[$i]->admin, time()+20*24*60*60);
          setcookie("token", $token, time()+20*24*60*60);
          return "<script>window.location.href = 'home.php';</script>";
        } else {
          return "<script>window.location.href = '?reg=erro2';</script>";
        }
        $existe = true;
        break;
      }
      $i++;
    }
    if (!$existe) {
      echo "<script>window.location.href = '?reg=erro1';</script>";
    }
  }
?>