<?php
    session_start();
if(!isset($_SESSION['usuario'])){
        header("Location: index.php");
      exit();
    }


    $nvo_id = "$_REQUEST[id_ed]";
    $nvo_nom = "$_REQUEST[nombre_ed]";
    $nvo_gen = "$_REQUEST[genero_ed]";
    $nvo_tipo = "$_REQUEST[tipo_ed]";
    $nvo_sal = "$_REQUEST[salario_ed]";
    $nvo_user = "$_REQUEST[usuario_ed]";
    $nvo_pass = "$_REQUEST[contrasena_ed]";
    $nvo_img = "$_REQUEST[imagen_ed]";

    $archivo = fopen("empleados.txt","r");
    $segunda = fopen('segunda.txt','a+');
    $contador=0; 

    while(!feof($archivo)){
        
        $idAct = chop(fgets($archivo));
        $nomAct = chop(fgets($archivo));
        $genAct = chop(fgets($archivo));
        $puestoAct= chop(fgets($archivo));
        $salAct = chop(fgets($archivo));
        $userAct = chop(fgets($archivo));
        $passAct = chop(fgets($archivo));   
        $fotoAct = chop(fgets($archivo)); 

        if($nomAct != ""){       
            if($nvo_id == $idAct){            
                fputs($segunda, $nvo_id."\n");
                fputs($segunda, $nvo_nom."\n");
                fputs($segunda, $nvo_gen."\n");
                fputs($segunda, $nvo_tipo."\n");
                fputs($segunda, $nvo_sal."\n");
                fputs($segunda, $nvo_user."\n");
                fputs($segunda, $nvo_pass."\n");
                fputs($segunda, $nvo_img."\n");
                $contador++;
            }else{
                fputs($segunda, $idAct."\n");
                fputs($segunda, $nomAct."\n");
                fputs($segunda, $genAct."\n");
                fputs($segunda, $puestoAct."\n");
                fputs($segunda, $salAct."\n");
                fputs($segunda, $userAct."\n");
                fputs($segunda, $passAct."\n");
                fputs($segunda, $fotoAct."\n");
            }    
        }                   
    }
    if($contador > 0){
    fclose($segunda);
    fclose($archivo); 
    unlink("empleados.txt");   
    rename("segunda.txt","empleados.txt") or die();
    echo"<script type='text/javascript'>
        alert('Registro Modificado con Éxito');
        location.assign('indexUsers.php');</script>";
    }else{
        echo"<script type='text/javascript'>
        alert('Datos NO modificados);
        location.assign('indexUsers.php');</script>";
    }
?>