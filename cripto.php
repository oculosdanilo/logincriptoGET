<?php

  function cripto($valCripto) {
   return openssl_decrypt($valCripto, "aes256", "1234", 0, "1234567890123456");
  }

?>