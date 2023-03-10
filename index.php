<?php
      if (isset($_POST['username'])) {
       $arquivo = fopen ('senhas.txt', 'r');
      $result = array();
      while(!feof($arquivo)) {
        $result = explode("|", fgets($arquivo));
      }
      fclose($arquivo);
        $logins = json_decode($result[0]);
        existe($logins);
      }

      function existe($logins) {
        $existe = false;
        $i = 0;
        while ($i < count($logins)) {
          $usernameDB = $logins[$i]->login;
          if ($usernameDB == $_POST['username']) {
            $usernameDigitado = $_POST['username'];
            $senhaDB = $logins[$i]->senha;
            if ($senhaDB == $_POST['senha']) {
              setcookie("username", $_POST['username'], time()+20*24*60*60);
              setcookie("admin", $logins[$i]->admin, time()+20*24*60*60);
              echo "<script>window.location.href = 'home.php';</script>";
            } else {
              echo "<script>window.location.href = '?reg=erro2';</script>";
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
<html>
  <head>
    <title>Senhas</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  </head>
  <body>
    <div class="main">
      <h1 class="w-100 text-center">
        LOGIN REPLIT
      </h1>
      <form id="auaumiau" action="#" method="post" class="needs-validation mt-3" novalidate>
      <div class="mb-3" id="warning" style="transition: transform 1s; transform: scaleY(0);">
        <div class='alert alert-success' role='alert'>Para entrar, digite novamente as credenciais.</div>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Nome de usuário:</label>
        <div class="input-group">
          <span class="input-group-text">@</span>
          <input name="username" type="text" class="form-control" id="username" required>
        </div>
      </div>
        <div class="mb-4">
          <label for="senha" class="form-label">Senha:</label>
          <div class="input-group">
           <input name="senha" type="password" class="form-control" id="senha" required />
            <a class="ignoreHref" style="text-decoration: none; cursor: pointer">
              <span class="input-group-text">
                <span class="material-icons" id="verSenha">visibility_off</span>
              </span>
            </a>
          </div>
        </div>
        <div class="d-flex w-100 justify-content-end">
         <button type="submit" class="btn btn-light">Entrar</button>
       </div>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <script type="text/javascript">
      var warning = document.querySelector('#warning')
    if ("<?php echo isset($_GET['reg']) ? $_GET['reg'] : '' ?>" == 'success') {
      warning.style.transform = "scaleY(1)";
      warning.innerHTML = `<div class='alert alert-success' role='alert'>sucesso</div>`;
      setTimeout(function () {
        warning.style.transform = "scaleY(0)";
      }, 6000)
    } else if ("<?php echo isset($_GET['reg']) ? $_GET['reg'] : '' ?>" == 'erro1') {
      warning.style.transform = "scaleY(1)";
      warning.innerHTML = `<div class='alert alert-danger' role='alert'>Usuário não existe!</div>`;
      setTimeout(function () {
        warning.style.transform = "scaleY(0)";
      }, 6000)
    } else if ("<?php echo isset($_GET['reg']) ? $_GET['reg'] : '' ?>" == 'erro2') {
      warning.style.transform = "scaleY(1)";
      warning.innerHTML = `<div class='alert alert-danger' role='alert'>Senha incorreta</div>`;
      setTimeout(function () {
        warning.style.transform = "scaleY(0)";
      }, 6000)
    } else if ("<?php echo isset($_GET['reg']) ? $_GET['reg'] : '' ?>" == 'saida') {
      warning.style.transform = "scaleY(1)";
      warning.innerHTML = `<div class='alert alert-warning' role='alert'>Sessão encerrada</div>`;
      setTimeout(function () {
        warning.style.transform = "scaleY(0)";
      }, 6000)
    }
      (() => {
      "use strict";

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll(".needs-validation");

      // Loop over them and prevent submission
      Array.from(forms).forEach((form) => {
        form.addEventListener(
          "submit",
          (event) => {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }

            form.classList.add("was-validated");
          },
          false
        );
      });
    })();
      $(document).ready(function () {
      $(".input-group a").on("mouseout", function (event) {
        event.preventDefault();
        $("#senha").attr("type", "password");
        $("#verSenha").html("visibility_off");
      });
      $(".input-group a").on("mouseover", function (event) {
        event.preventDefault();
        $("#senha").attr("type", "text");
        $("#verSenha").html("visibility");
      });
    });
      console.log('<?=$logins?>');
      
    </script>
  </body>

</html>