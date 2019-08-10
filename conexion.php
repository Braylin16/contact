<?php

// Conexion a la base de datos
$mysqli = mysqli_connect("localhost","root","","contact");

if ($mysqli==false){
  echo "Hubo un problema al conectarse a la Base de datos";
  die();
}