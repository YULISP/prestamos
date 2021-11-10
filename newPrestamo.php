<?php
    $idpres=(int)$_REQUEST['idPrestamo'];
    $id=$_REQUEST['idEmpleado'];
    $monto=$_REQUEST['monto'];
    $fecha=$_REQUEST['fecha'];
	$numcuotas=$_REQUEST['Numcuotas'];
    $cuota=$_REQUEST['cuota'];
    $cuotasres=$_REQUEST['CuotasResantes'];
    $montoadeudo=$_REQUEST['Montoadeudo'];

    
	$leer=fopen("prestamos.txt","a+");
	$flag=true;
            while(!feof($leer)){
                $claveidpres=fgets($leer);
                $claveid=fgets($leer);
                $clavemonto=fgets($leer);
                $clavefecha=fgets($leer);
                $clavenuncuotas=fgets($leer);
                $clavecuota=fgets($leer);
                $clavecuotares=fgets($leer);
                $clavemontoadeudo=fgets($leer);
                if($idpres==$claveidpres){
                    echo"<script type='text/javascript'>
			            alert('Error...id prestamos respetido El usuario ya cuenta con un prestamos abierto');
			            location.assign('administrarPrestamos.php');
			            </script>"; 
                    $flag=false;
                    break;
                }
                if($idpres==$claveidpres && $id==$claveid ){
                    echo"<script type='text/javascript'>
			            alert('Error... El usuario ya cuenta con un prestamos abierto');
			            location.assign('administrarPrestamos.php');
			            </script>"; 
                    $flag=false;
                    break;
                }
            }
            if($clavemontoadeudo==0){
                                fclose($leer);
                                if($flag){
                                    $guardar=fopen('prestamos.txt','a+');
                                    fputs($guardar,$idpres."\n");
                                    fputs($guardar,$id."\n");
                                    fputs($guardar,$monto."\n");
                                    fputs($guardar,$fecha."\n");
                                    fputs($guardar,$numcuotas."\n");
                                    fputs($guardar,$cuota."\n");
                                    fputs($guardar,$cuotasres."\n");
                                    fputs($guardar,$montoadeudo."\n");
                                    fclose($guardar);
                                    echo"<script type='text/javascript'>
                                    alert('Prestamos registrado correctamente');
                                    location.assign('administrarPrestamos.php');
                                    </script>";
            }
        }
    
?>