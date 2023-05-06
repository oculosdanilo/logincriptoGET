<?php

require "../../ler.php";

$registro = json_decode(ler("../../senhas.txt")[0]);
$achouUser = false;

if (isset($_GET["id"]))
{
  for ($i = 0; $i < count($registro); $i++)
  {
    if ($_GET["id"] == $registro[$i]->id)
    {
      print_r(json_encode($registro[$i]));
      $achouUser = true;
    }
  }
  $achouUser ? print("") : print("Usuário não existe");
}
else
{
  print_r(json_encode($registro));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informações Login</title>
  <link rel="stylesheet" href="../../main.css">
</head>

<body>
  <div class="main"></div>
</body>

</html>