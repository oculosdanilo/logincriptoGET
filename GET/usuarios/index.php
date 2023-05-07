<?php

require "../../ler.php";

$registro = json_decode(ler("../../senhas.txt")[0]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informações Login</title>
  <link rel="stylesheet" href="../../main.css">
  <style>
    th {
      color: white;
    }

    div.main {
      width: max-content;
    }
  </style>
</head>

<body>
  <?php
  $registroDecriptado = array();
  for ($i = 0; $i < count($registro); $i++)
  {
    $element = $registro[$i];
    $registroDecriptado[] = array("id" => $element->id, "login" => openssl_decrypt($element->login, "aes256", "1234", 0, "1234567890123456"), "admin" => $element->admin);
  }
  ?>
  <div class="main">
    <?php if (isset($_GET["id"])): ?>
      <h1 class="w-100 text-center">Usuário selecionado: <?= $_GET["id"] ?></h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Login</th>
            <th scope="col">Administrador</th>
          </tr>
        </thead>
        <?php if (isset($registroDecriptado[$_GET["id"]])): ?>
          <tbody>
            <tr>
              <th scope="row"><?= $_GET["id"] ?></th>
              <td><?= $registroDecriptado[$_GET["id"]]["login"] ?></td>
              <td><?= $registroDecriptado[$_GET["id"]]["admin"] == "1" ? "Sim" : "Não" ?></td>
            </tr>
          </tbody>
        </table>
      <?php else: ?>
        </table>
        <p class="w-100 text-center">Usuário não existe</p>
      <?php endif ?>
    <?php else: ?>
      <h1 class="w-100 text-center">Usuários</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Login</th>
            <th scope="col">Administrador</th>
          </tr>
        </thead>
        <tbody id="lista">
        </tbody>
      </table>
    <?php endif ?>
  </div>
  <script>
    const lista = document.getElementById("lista");
    var registro = <?php echo json_encode($registroDecriptado); ?>;
    for (let i = 0; i < registro.length; i++) {
      const element = registro[i];
      lista.innerHTML += `<tr>
                            <th scope="row">${element["id"]}</th>
                            <td>${element["login"]}</td>
                            <td>${element["admin"] == "1" ? "Sim" : "Não"}</td>
                          </tr>`;
    }
  </script>
</body>

</html>