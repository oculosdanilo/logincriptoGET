<?php

require "../../ler.php";

$registro = json_decode(ler("../../senhas.txt")[0]);
$achouUser = false;

if (isset($_GET["id"])) {
  for ($i=0; $i < count($registro); $i++) { 
    if ($_GET["id"] == $registro[$i]->id) {
      print_r(json_encode($registro[$i]));
      $achouUser = true;
      return;
    }
  }
  $achouUser ? print("") : print("Usuário não existe");
} else {
  print_r(json_encode($registro));
}

?>