<?php

  include 'funciones/EnviarMensaje.php';

  makeMessage($_REQUEST["name"], $_REQUEST["phone"], $_REQUEST["stage"], $_REQUEST["type"], $_REQUEST["qr"]);

?>
