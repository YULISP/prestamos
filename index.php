<?php
session_start();
if(isset($_SESSION['usuario'])){
	header("Location: main.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea tu Cuenta</title>
    <link rel="stylesheet" href="estilo_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="contenedor_todo">
        <div class="caja_trasera">
            <div class="caja_trasera-login">
                <h3>Ya tienes una cuenta?</h3>
                <p>Inicie su sesión</p>
                <button id="btn_iniciar-sesion">Iniciar Sesión</button>
            </div>
            <div class="caja_trasera-register">
                <h3>Crea Ahora tu cuenta!</h3>
                <p>Registrar Empleado y Cuenta</p>
                <button id="btn_registrarse">Registrarse</button>
            </div>
        </div>
        <!--formulaio de login  -->
        <div class="contenedor_login-register">
            <form action="validacion.php" method="POST" class="formulario_login">
                <h2>Iniciar Sesión</h2>
                <input type="text" name="user" placeholder="Usuario">
                <input type="password" name="pass"  placeholder="Contraseña">
               <div>
                   <center>
                   <button name="enviar" type="submit" class="btn btn-primary">Ingresar</button>
                   </center>
               </div>
                <br>
                <br>
            </form>
            <!--formulaio de registro -->
            <form action="newUser.php" method="post" class="formulario_register">
                <h2>Registrarse</h2>
                <input type="text" name="id" placeholder="ID" required>
                <input type="text" name="nombre" placeholder="Nombre">
                <select name="genero" class="form-select" aria-label="Default select example">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select>
                <select name="tipo" class="form-select" aria-label="Default select example">
                <option value="Auxiliar">Auxiliar</option>
                <option value="Contrato">Contrato</option>
                <option value="Basificado">Basificado</option>
                </select>
                <input type="number" name="salario" placeholder="Salario">
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña">
                <input type="text" name="imagen" placeholder="Foto">
                <div>
                    <center>
                    <button name="enviar" type="submit" class="btn btn-primary">Registarse</button>
                    <!-- <input type="submit" class="btn2 btn-primary" value="Registarse"> -->
                    </center>
                </div>
                
            </form>
        </div>
    </div>
    <script src="form_flotante.js"></script>
</body>
</html>