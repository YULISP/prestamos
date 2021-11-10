<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
  exit();
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Editar registro</title>    
    <link rel="stylesheet" href="estilo_mod.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">  
</head>
<body>
<header>
      <nav
        class="navbar navbar-expand-lg navbar"
        class="navbar-light"
        style="background-color: rgba(0, 128, 255,0.3)"
      >
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
              <li class="nav-item">
                <a
                  class="nav-link text-white rounded-bottom"
                  href="indexUsers.php"
                  tabindex="-1"
                  aria-disabled="true"
                  >C A N C E L A R</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <center>
    <div class="contenedor_todo">
    <div class="contenedor_login-register">
    <form action="modificar.php" method="GET" class="formulario_mod">
                <h2>Editar Datos</h2>
                <label>ID Empleado:</label>
                <input type="text" id="id_ed" name="id_ed" placeholder="ID" required>
                <label>Nombre Empleado:</label>
                <input type="text" id="nombre_ed" name="nombre_ed" placeholder="Nombre">
                <label>Genero</label>
                <select id="genero_ed" name="genero_ed" class="form-select" aria-label="Default select example">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select>
                <label>Tipo de Empleado:</label>
                <select id="tipo_ed" name="tipo_ed" class="form-select" aria-label="Default select example">
                <option value="Auxiliar">Auxiliar</option>
                <option value="Contrato">Contrato</option>
                <option value="Basificado">Basificado</option>
                </select>
                <label>Salario:</label>
                <input type="number" name="salario_ed" id="salario_ed" placeholder="Salario">
                <label>Usuario:</label>
                <input type="text" name="usuario_ed"id="usuario_ed" placeholder="Usuario" required>
                <label>Contraseña:</label>
                <input type="password" name="contrasena_ed" id="contrasena_ed" placeholder="Contraseña">
                <label>Fotografia</label>
                <input type="text" name="imagen_ed"id="imagen_ed" placeholder="Foto">
                <div>
                    <center>
                    <button id="enviar" type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <!-- <input type="submit" class="btn2 btn-primary" value="Registarse"> -->
                    </center>
                </div> 
            </form>
    </center>
    </div>
    </div>
    

    <?php
    $id = $_REQUEST['id'];
    $archivo = fopen("empleados.txt","r");
    while(!feof($archivo)){
        $idAct = chop(fgets($archivo));
        $nomAct = chop(fgets($archivo));
        $genAct = chop(fgets($archivo));
        $puestoAct= chop(fgets($archivo));
        $salAct = chop(fgets($archivo));
        $userAct = chop(fgets($archivo));
        $passAct = chop(fgets($archivo));   
        $fotoAct = chop(fgets($archivo));                  
        if($id == $idAct ){              
            ?>
            <script> document.getElementById('id_ed').value = <?php echo $idAct;?>;</script>
            <script> document.getElementById('nombre_ed').value = "<?php echo $nomAct;?>";</script>    
            <script> document.getElementById('genero_ed').value = "<?php echo $genAct;?>";</script>
            <script> document.getElementById('tipo_ed').value = "<?php echo $puestoAct;?>";</script>
            <script> document.getElementById('salario_ed').value = "<?php echo $salAct;?>";</script>           
            <script> document.getElementById('usuario_ed').value = "<?php echo $userAct;?>";</script> 
            <script> document.getElementById('contrasena_ed').value = "<?php echo $passAct;?>";</script>
            <script> document.getElementById('imagen_ed').value = "<?php echo $fotoAct;?>";</script>       
            <?php
        }        
    }
    ?>
</body>
</html>

<script></script>