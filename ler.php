<?php

  function ler(String $caminho) {
    $arquivo = fopen($caminho, 'r');
    $result = array();
    while(!feof($arquivo)) {
      $result = explode("|", fgets($arquivo));
    }
    fclose($arquivo);
    return $result;
  }

?>