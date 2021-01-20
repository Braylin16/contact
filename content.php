<?php

require_once('conexion.php');

// Sacar el nombre de la persona que ha iniciado sesion
$stmt = $conexion->query("SELECT name FROM contact ORDER BY id DESC");
$stmt->execute();
while ($row = $stmt->fetch()) {

  // Los datos del usuario
  $name = $row['name'];

?>

<ul>
    <li><?php echo $name ?></li>
</ul>

<?php } ?>