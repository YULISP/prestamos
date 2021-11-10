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
    <title>Pago Quincenal</title>    
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
                  href="administrarPrestamos.php"
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
    <div  class="contenedor_login-register">
    <form id="factura" action="registarPago.php" method="GET" class="formulario_mod">
                <h1></h1>
                <h2>Pagar Quincena</h2>
                <label class="etiqueta">ID Prestamo:</label>
                <input type="text" id="idPrestamo" name="idPrestamo" placeholder="ID Prestamo" readonly  required>
                <label  class="etiqueta">ID Empleado:</label>
                <input type="text" id="idEmpleado" name="idEmpleado" placeholder="ID empleado" readonly require>
                <label  class="etiqueta">Monto Prestado:</label>
                <input type="number"id="monto" name="monto" placeholder="Monto $$$" readonly value="" require>
                <label  class="etiqueta">fecha Prestamo:</label>
                <input type="date" id="fecha" name="fecha" placeholder="Fecha" readonly require>
                <label  class="etiqueta">Numero De Cuotas:</label>
                <input type="number" id="Numcuotas" name="Numcuotas" placeholder="Numero de cuotas" value="" readonly require onblur="resta1(this.form)">
                <label  class="etiqueta">Pago Quincenal:</label>
                <input type="text" id="cuota" name="cuota" placeholder="Couta"  value="" readonly onblur="pago(this.form)">
                <label  class="etiqueta">Cuotas Restantes:</label>
                <input type="text" id="CuotasResantes" name="CuotasResantes" value="" placeholder="Cuotas Restantes"readonly>
                <label  class="etiqueta">Adeudo Restante:</label>
                <input type="text" id="Montoadeudo" name="Montoadeudo" value="" placeholder="Monto de Adeuodo"readonly>
                <div>
                    <center>
                    <button id="enviar" type="submit" class="btn btn-primary">PAGAR</button>
                    </center>
                </div>
            </form>
    </center>
    </div>
    </div>
    

    <?php
    $idpres = $_REQUEST['idPrestamo'];
    $archivo = fopen("prestamos.txt","r");
    while(!feof($archivo)){
        $idpresAct = chop(fgets($archivo));
        $idempAct = chop(fgets($archivo));
        $montoAct = chop(fgets($archivo));
        $fechaAct= chop(fgets($archivo));
        $ncuotasAct = chop(fgets($archivo));
        $cuotaAct = chop(fgets($archivo));
        $cuotasresAct = chop(fgets($archivo));   
        $montoadeudoAct = chop(fgets($archivo));                  
        if($idpres == $idpresAct ){              
            ?>
            <script> document.getElementById('idPrestamo').value = <?php echo $idpresAct;?>;</script>
            <script> document.getElementById('idEmpleado').value = "<?php echo $idempAct;?>";</script>    
            <script> document.getElementById('monto').value = "<?php echo $montoAct;?>";</script>
            <script> document.getElementById('fecha').value = "<?php echo $fechaAct;?>";</script>
            <script> document.getElementById('Numcuotas').value = "<?php echo $ncuotasAct;?>";</script>           
            <script> document.getElementById('cuota').value = "<?php echo $cuotaAct;?>";</script> 
            <script> document.getElementById('CuotasResantes').value = "<?php echo $cuotasresAct;?>";</script>
            <script> document.getElementById('Montoadeudo').value = "<?php echo $montoadeudoAct;?>";</script>       
            <?php
        }        
    }
    ?>
<script>
    function resta1(form){
    var x=0;
    var a=0;
    var e=1;
    x = parseInt(form.CuotasResantes.value);
    form.CuotasResantes.value=x-'1';
}
</script>
<script>
  function pago(form){
    var x=0;
    var y=0;
    var c;
    x = parseInt(form.cuota.value);
    y = parseInt(form.Montoadeudo.value);
    c = y - x;
    form.Montoadeudo.value=c;
}
</script>
</body>
</html>
