<?php 

$datos = $_GET['variable1'];
    echo $datos;

    $archivo1=fopen("empleados.txt","r");
    $archivo2=fopen("empleadosTemporal.txt","w+");
        while(!feof($archivo1)){
        	$id = fgets($archivo1);
            $fullName = fgets($archivo1);
            $gen = fgets($archivo1);
            $tipo= fgets($archivo1);
            $sal= fgets($archivo1);
            $user= fgets($archivo1);
            $pass= fgets($archivo1);
            $foto = fgets($archivo1);
            if($id!=$datos){

            	fputs($archivo2,$id);
                fputs($archivo2,$fullName);
                fputs($archivo2,$gen);
                fputs($archivo2,$tipo);
                fputs($archivo2,$sal);
                fputs($archivo2,$user);
                fputs($archivo2,$pass);
                fputs($archivo2,$foto);
            }

        }
    fclose($archivo1);
    fclose($archivo2);

    //unlink('archivo1');
    
    $archivo2=fopen("empleadosTemporal.txt","r");
    $archivo1=fopen("empleados.txt","w+");

    while(!feof($archivo2)){
            $id = fgets($archivo2);
            $fullName = fgets($archivo2);
            $gen = fgets($archivo2);
            $tipo= fgets($archivo2);
            $sal= fgets($archivo2);
            $user= fgets($archivo2);
            $pass= fgets($archivo2);
            $foto = fgets($archivo2);

            fputs($archivo1,$id);
            fputs($archivo1,$fullName);
            fputs($archivo1,$gen);
            fputs($archivo1,$tipo);
            fputs($archivo1,$sal);
            fputs($archivo1,$user);
            fputs($archivo1,$pass);
            fputs($archivo1,$foto);
        }
        fclose($archivo1);
        fclose($archivo2);

        echo"<script type='text/javascript'>
        location.assign('indexUsers.php'); </script>";
?>



