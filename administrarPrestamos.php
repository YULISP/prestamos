<?php
session_start();
if(!isset($_SESSION['usuario'])){
	header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylePrestamo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    <title>Administrar Prestamo</title>
    
</head>
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
        left: 35%;
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
      .botones{
          position: absolute;
          background-color: transparent;
          width:54%;
          height:40px;
          top:80%;
          left:25%;
      }
      .btn-light{
          height:40px;
      }
.my-custom-scrollbar {
      position:absolute;
      height: 350px;
      overflow: auto;
}
      .table-wrapper-scroll-y {
      display: block;
}
</style>
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
    </header>
      <div>
          <div class="principal col-auto" id="principal">
      <div class="row mt-4 justify-content-center">
    <div class="titulo">
        <h2>ADMINISTRAR PRESTAMOS</h2>
    </div>

      <div class="container-fluid ">
        <div class="d-flex justify-content-center mt-4">
          <div class="table-wrapper-scroll-y my-custom-scrollbar w-auto tabla">
            <table id="tablaProductos" class="table rounded text-center table-hover bg-white table-bordered mb-0 ">
              <thead>
                <tr class="bg-primary text-white">
                  <th scope="col">ID Préstamo</th>
                  <th scope="col">ID Empleado</th>
                  <th scope="col">Monto</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Núm. Cuota</th>
                  <th scope="col">Cuota</th>
                  <th scope="col">Cuotas Restantes</th>
                  <th scope="col">Monto Adeudo</th>
                  <th colspan = "1" scope="col">Pagar</th>
                </tr>
              </thead>
              <?php
            $archivo = fopen("prestamos.txt","r");                       
            while(!feof($archivo)){
                $idPrestamo = fgets($archivo);
                $idEmpleado = fgets($archivo);
                $monto = fgets($archivo);
                $fecha= fgets($archivo);
                $Numcuotas= fgets($archivo);
                $cuota= fgets($archivo);
                $CuotasRestantes= fgets($archivo);
                $Montoadeudo = fgets($archivo);
                if($idPrestamo != ""){
                ?>          
                <tr>
                    <td><?php echo $idPrestamo?></td>
                    <td><?php echo $idEmpleado?></td>
                    <td><?php echo $monto?></td>
                    <td><?php echo $fecha?></td>
                    <td><?php echo $Numcuotas?></td>
                    <td><?php echo $cuota?></td>
                    <td><?php echo $CuotasRestantes?></td> 
                    <td><?php echo $Montoadeudo?></td> 
                    <td><a href="formPagarPrestamo.php?idPrestamo=<?php echo $idPrestamo;?>" class="btn btn-send"><i class="far fa-money-bill-alt"></i></a></td></tr>
            <?php
                }                
            }        
            fclose($archivo);
        ?> 
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="botones">
    <a id="btn_registrar_prestamo"class="btn btn-light">Registrar préstamo&nbsp<i class="fas fa-file-alt"></i></a>
    <a class="btn btn-light" onclick="location.href='main.php';">Regresar al menú&nbsp<i class="fas fa-arrow-alt-circle-left"></i></a>
    <!-- <a id="button is-warning imprime"class="btn btn-light">Generar PDF<i class="fas fa-file-alt"></i></a> -->
    <button class="btn button is-warning btn-light" id="imprime">Generar PDF<i class="fas fa-file-alt"></i> </button>
    <a id="btn" class="btn btn-light" onclick="location.href='mostrarGrafica.php';">Graficar Prestamos&nbsp<i class="fas fa-hand-holding-usd"></i></a>
    <!-- <a id="button is-warning imprime"class="btn btn-light">Generar PDF<i class="fas fa-file-alt"></i></a> -->
    </div>
<div class="contenedor_todo">
        <!--formulaio de login  -->
        <div class="contenedor_login-register">
            <!--formulaio de registro -->
            <form action="newPrestamo.php" method="POST" class="formulario_register">
                <h1></h1>
                <h2>Registrar Prestamo</h2>
                <input type="text" id="idPrestamo" name="idPrestamo" placeholder="ID Prestamo" required>
                <select name="idEmpleado" class="form-select" value="" aria-label="Default select example">
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
                <option ><?php echo $id?></option>   
            <?php
                }                
            }        
            fclose($archivo);
        ?>  
                </select>
                <input type="number"name="monto" placeholder="Monto $$$"  value="" require>
                <input type="date" name="fecha" placeholder="Fecha" require>
                <input type="number"name="Numcuotas" placeholder="Numero de cuotas" value="" onblur="division(this.form)" require>
                <input type="text" name="cuota" placeholder="Couta"  value="" readonly onblur="repite(this.form)">
                <input type="text" name="CuotasResantes" value="" placeholder="Cuotas Restantes"readonly>
                <input type="text" name="Montoadeudo" value="" placeholder="Monto de Adeuodo"readonly onblur="repite2(this.form)">
                <div>
                    <center>
                    <button id="enviar" type="submit" class="btn btn-primary">Registrar</button>
                    </center>
                </div>
            </form>
            <script src="form_FlotantePrestamos.js"></script>
        </div>
    </div>
</body>
</html>
<script language="javascript">
function division(form){
var resultado;
var x=0;
var y=0;
x = parseInt (form.monto.value);
y = parseInt (form.Numcuotas.value);
resultado = x / y;
form.cuota.value=resultado.toFixed(2);
}
function repite(form){
  var x=0;
  var c;
  x = parseInt(form.monto.value);
 c = x;
 form.Montoadeudo.value=c;
}
function repite2(form){
  var x=0;
  var c;
  x = parseInt(form.Numcuotas.value);
 c = x;
 form.CuotasResantes.value=c;
}
</script>
<script>
  function adaptarPrincipal(){
	let alto = document.getElementById("tablaProductos").clientHeight;
	if(alto > 250){
		$('#principal').height(alto + 250);
	}
}
$(document).ready(function(){
    adaptarPrincipal();
	});
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/jspdf.debug.js"></script>
        <script src="js/html2canvas.min.js"></script>
        <script src="js/html2pdf.min.js"></script>
        <script>
            const options = {
              margin: 0.5,
              filename: 'Reporte.pdf',
              image: {
                type: 'jpeg',
                quality: 500
              },
              html2canvas: {
                scale: 1
              },
              jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'landscape'
              }
            }          
            $('#imprime').click(function(e){
              e.preventDefault();
              const element = document.getElementById('tablaProductos');
              html2pdf().from(element).set(options).save();
            });   
            </script>