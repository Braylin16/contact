<?php

// Mensajes
$error = "";
$exito = "";

// Recogiendo los datos que me estan llegando
if(isset($_POST['submit'])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $messege = $_POST["messege"];

    // Verificando que esta llegando el nombre, y limpiando que sea un string
    if(!empty($name)){
        $name = trim($name);
        $name = htmlspecialchars($name);
        $name = filter_var($name, FILTER_SANITIZE_STRING);

    } else {
        $error = "*Debes colocar un nombre <br/>";
    }

    // Verificar que esta llegando el EMAIL y que es un EMAIL correcto
    if(!empty($email)){
        $email = trim($email, );
        $email = htmlspecialchars($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }else{
        $error .= "*El correo electronico no puede estar vacio <br/>";
    }

    // Validar que sea un email verdadero
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($email == false){
        $error .= "*Este no es un correo electronico <br/>";
    }

    if(!empty($messege)){
        $messege = trim($messege);
        $messege = htmlspecialchars($messege);
        $email = filter_var($email, FILTER_SANITIZE_STRING);
    }else{
        $error .= "*Coloca un mensaje";
    }

    // Verificar que todos los campos estan completos
    if(!empty($name) and !empty($email) and !empty($messege)){
        $exito = "El mensaje fue enviado con exito";
    }

    // Guardar la informacion en la base de datos
    if(!$email == false){
        $mysqli->query("INSERT INTO `contact` (`id`, `name`, `email`, `messege`) VALUES (NULL, '$name', '$email', '$messege');");
    }

}

?>