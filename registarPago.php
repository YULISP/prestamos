<?php
    session_start();
if(!isset($_SESSION['usuario'])){
        header("Location: index.php");
      exit();
    }
    $nvo_idpres = "$_REQUEST[idPrestamo]";
    $nvo_idemp = "$_REQUEST[idEmpleado]";
    $nvo_monto = "$_REQUEST[monto]";
    $nvo_fecha = "$_REQUEST[fecha]";
    $nvo_ncuotas = "$_REQUEST[Numcuotas]";
    $nvo_cuota = "$_REQUEST[cuota]";
    $nvo_cuotasres = "$_REQUEST[CuotasResantes]";
    $nvo_montoadeudo = "$_REQUEST[Montoadeudo]";

    $archivo = fopen("prestamos.txt","r");
    $segunda = fopen('prestamossegunda.txt','a+');
    $contador=0; 

    while(!feof($archivo)){
        $idpresAct = chop(fgets($archivo));
        $idempAct = chop(fgets($archivo));
        $montoAct = chop(fgets($archivo));
        $fechaAct= chop(fgets($archivo));
        $ncuotasAct = chop(fgets($archivo));
        $cuotaAct = chop(fgets($archivo));
        $cuotasresAct = chop(fgets($archivo));   
        $montoadeudoAct = chop(fgets($archivo)); 

        if($idempAct != ""){       
            if($nvo_idpres  == $idpresAct){            
                fputs($segunda, $nvo_idpres."\n");
                fputs($segunda, $nvo_idemp."\n");
                fputs($segunda, $nvo_monto."\n");
                fputs($segunda, $nvo_fecha."\n");
                fputs($segunda, $nvo_ncuotas."\n");
                fputs($segunda, $nvo_cuota ."\n");
                fputs($segunda, $nvo_cuotasres."\n");
                fputs($segunda, $nvo_montoadeudo."\n");
                $contador++;
            }else{
                fputs($segunda, $idpresAct."\n");
                fputs($segunda, $idempAct."\n");
                fputs($segunda, $montoAct."\n");
                fputs($segunda, $fechaAct."\n");
                fputs($segunda, $ncuotasAct."\n");
                fputs($segunda, $cuotaAct."\n");
                fputs($segunda, $cuotasresAct."\n");
                fputs($segunda, $montoadeudoAct."\n");
            }    
        }                   
    }
    if($contador > 0){
    fclose($segunda);
    fclose($archivo); 
    unlink("prestamos.txt");   
    rename("prestamossegunda.txt","prestamos.txt") or die();
    echo"<script type='text/javascript'>
        alert('PAGO REALIZADO');
        location.assign('administrarPrestamos.php');</script>";
    }else{
        echo"<script type='text/javascript'>
        alert('PAGO NO REGISTRADO');
        location.assign('administrarPrestamos.php');</script>";
    }
?>