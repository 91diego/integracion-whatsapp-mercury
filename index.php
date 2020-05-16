<?php

  include 'funciones/EnviarMensaje.php';

  greeting($_REQUEST["name"], $_REQUEST["phone"]);
  // makeMessage($_REQUEST["name"], $_REQUEST["id"], $_REQUEST["phone"], $_REQUEST["stage"], $_REQUEST["type"], $_REQUEST["qr"]);

?>
