<?php

// Requiriendo la conexion a la base de datos
require_once 'conexion.php';

// Requiere el codigo del index.php
require_once 'backend.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de contacto</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Red+Hat+Display&display=swap" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!-- Estilos css -->
    <link rel="stylesheet" href="style.css">

    <script type="text/javascript">

		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'content.php',
				dataType:'text',
				async:false
			}).responseText;

			document.getElementById("miName").innerHTML = tabla;
		}
		setInterval(tiempoReal, 1000);
		</script>
</head>
<body>
<main>
    <article>
        <form id="form" method="POST">
            <h1>Formulario de contacto</h1>
            <input type="text" id="name" name="name" placeholder="Nombre completo" title="Por favor, llena este campo" autocomplete="off" value="<?php if(isset($_POST["name"])){ echo $name; } ?>"><br>
            <input type="text" id="email" name="email" placeholder="Correo electr&oacute;nico" title="Por favor, llena este campo" autocomplete="off" value="<?php if(isset($_POST["email"])){ echo $email; } ?>"><br>
            <textarea name="messege" id="messege" placeholder="Comunicado" title="Por favor, llena este campo" autocomplete="off" maxlength="65000"><?php if(isset($_POST["messege"])){ echo $messege; } ?></textarea><br>
            <button type="button" id="submit">Contactar</button>
            <!-- Mensaje de error -->
            <div class="danger">
                <p class="error"><?php echo $error; ?></p>
            </div>
            <!-- Mensaje de exito -->
            <div class="success">
                <p id="repuesta" class="exito"></p>
            </div>
            
        </form>

            <!-- Nombres registrados en la base de datos -->
            <br>
            <div id="miName">
                <?php require_once('content.php') ?>
            </div>

    </article>
</main>
    
</body>

<script>

    $('#submit').click(function(){

        var nombre = document.getElementById('name').value;
        var correo = document.getElementById('email').value;
        var mensaje = document.getElementById('messege').value;

        // Enviar las variables a la ruta
        var ruta = "nom="+nombre+"&ema="+correo+"&messege="+mensaje;

        $.ajax({
            url: 'backend.php',
            type: 'POST',
            data: ruta,

        })

        .done(function(res){
            $('#repuesta').html(res)
        })

        .fail(function(){
            console.log("error");
        })

        .always(function(){
            console.log("complete");
        });

    });

</script>

</html>