<?php

// Conexion a la base de datos
try{
  $conexion = new PDO('mysql:host=localhost;dbname=contact', 'root', '');
}catch(PDOExeption $e){
  echo "Error: " . $e->getMessage();
  die();
}