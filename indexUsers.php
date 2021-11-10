<?php
session_start();
if(!isset($_SESSION['usuario'])){
	header("Location: index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Empleados</title>
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <link
      rel="stylesheet"
      href="./node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="./node_modules/bootstrap-icons/font/bootstrap-icons.css"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="../librerias/jquery-3.2.1.min.js"></script>
    <style>
      body {
        background: url("https://wallpaperaccess.com/full/1943037.jpg");
        background-size: cover;
        min-height: 100%;
      }
      .principal {
        position: absolute;
        top: 13%;
        border: 3px;
        width: 100%;
        height: 500px;
        border-radius: 15px;
        background-color: transparent;
      }
      .titulo{
        position: absolute;
        top: 30px;
        left: 45%;
        font-family: 'Helvetica';
        font-weight: italic;
        font-size: 26px;
        color: white;
      }
      .tabla{
        width: 100%;
        position: absolute;
        top: 25%;
        left: 25%;
      }
      .btn1{
        float: right;
      }
      .box{
        border: 1px solid #333333;
        width: 200px;
        height: 100px;
        overflow: hidden;
      }
      .my-custom-scrollbar {
      position:absolute;
      height: 400px;
      overflow: auto;
}
      .table-wrapper-scroll-y {
      display: block;
}
    </style>
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
                  href="logout.php"
                  tabindex="-1"
                  aria-disabled="true"
                  >C E R R A R - S E S I Ó N</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <a class="btn btn-light btn1" onclick="location.href='main.php';">Regresar al menú<i></i></a>
    </header>
    <main>
    <div class="principal col-auto" id="principal">
      <div class="row mt-4 justify-content-center">
    <div class="titulo">
        <h2>E M P L E A D O S</h2>
    </div>
      <div class="container-fluid">
        <div class="d-flex justify-content-center mt-4">
          <div class="table-wrapper-scroll-y my-custom-scrollbar w-auto tabla">
          <form action="eliminar.php" method="POST" >
            <table id="tablaProductos" class="table rounded text-center table-hover bg-white table-bordered mb-0">
              <thead>
                <tr class="bg-primary text-white">
                  <th scope="col">I D</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Género</th>
                  <th scope="col">Empleado</th>
                  <th scope="col">Salario</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Password</th>
                  <th scope="col">Foto</th>
                  <th colspan = "2" scope="col">Acciones</th>
                </tr>
              </thead>
            <?php
            $archivo = fopen("empleados.txt","r");                       
            while(!feof($archivo)){
                $id = fgets($archivo);
                $fullName = fgets($archivo);
                $gen = fgets($archivo);
                $tipo= fgets($archivo);
                $sal= fgets($archivo);
                $user= fgets($archivo);
                $pass= fgets($archivo);
                $foto = fgets($archivo);
                if($user != ""){
                ?>          
                <tr>
                    <td><?php echo $id?></td>
                    <td><?php echo $fullName?></td>
                    <td><?php echo $gen?></td>
                    <td><?php echo $tipo?></td>
                    <td><?php echo $sal?></td>
                    <td><?php echo $user?></td>
                    <td><?php echo $pass?></td> 
                    <td><?php echo "<img src=".$foto."width='50' height='50'>";?></td> 
                    <td><a href="formEdit.php?id=<?php echo $id;?>" class="btn btn-warning"><i class="fa fa-marker"></i></a></td>
                    <td> <?php echo "<input  class='btn btn-danger' type='button' id='idEliminar' value='Eliminar' onclick='metodoEliminar(".$id.")'>"; ?>  </td>
                </tr>
            <?php
                }                
            }        
            fclose($archivo);
        ?> 
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
    </main>

    <div class="modal" id="modal-update">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Modificar</p>
            <button class="delete" aria-label="close" id="cerrarUpdateModal"></button>
          </header>
          <section class="modal-card-body">
              <form id="update-form">
                <div class="field">
                    <label class="label">Clave:</label>
                    <div class="control">
                      <input class="input" type="text" name="clave" placeholder="Clave:" id="1"> 
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Fotografía:</label>
                    <div class="control">
                      <input class="input" type="text" name="foto" placeholder="Link" id="2">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Nombre:</label>
                    <div class="control">
                      <input class="input" type="text" name="nombre" placeholder="Nombre" id="3">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Edad:</label>
                    <div class="control">
                      <input class="input" type="number" name="edad" placeholder="Edad:" id="4">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Sexo:</label>
                    <div class="control">
                      <div class="select">
                        <select name="sexo">
                          <option>Masculino</option>
                          <option>Femenino</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Salario</label>
                    <div class="control">
                      <input class="input" type="number" name="salario" placeholder="Salario" id="5">
                    </div>
                  </div>
             
            <!-- Content ... -->
          </section>
          <footer class="modal-card-foot">
            <button type="submit" class="button is-success">Actualizar</button>
        </form> 
        </footer>
        </div>
      </div>


  </body>
</html>
<script>

</script>
 
<script>
    function edicionOpen(){
        modelAgregar = new bootstrap.Modal(document.getElementById('modalEdicion'));
        modelAgregar.show();
    }
    
  function adaptarPrincipal(){
	let alto = document.getElementById("tablaProductos").clientHeight;
	if(alto > 250){
		$('#principal').height(alto + 250);
	}
}
$(document).ready(function(){
    adaptarPrincipal();
	});

  function metodoEliminar(variable){
  
  var valorId="eliminar.php?variable1="+ variable;
 
  window.location=valorId;
}
</script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>