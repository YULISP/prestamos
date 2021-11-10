<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location: index.php");
      exit();
    }
    
    $id=(int)$_REQUEST['id'];
    $nombre=$_REQUEST['nombre'];
    $genero=$_REQUEST['genero'];
	$tipo_emp=$_REQUEST['tipo'];
    $salario=$_REQUEST['salario'];
    $usuario=$_REQUEST['usuario'];
    $contrasena=$_REQUEST['contrasena'];
	$imagen=$_REQUEST['imagen'];
	
    
    
	$leer=fopen("empleados.txt","a+");
	$flag=true;

        if (empty($id) || empty($nombre)|| empty($salario)|| empty($usuario)|| empty($contrasena) || empty($imagen)) {
            echo"<script type='text/javascript'>
            alert('Error... Hay campos vacíos');
            location.assign('index.php');
            </script>"; 
          }else{
            while(!feof($leer)){
                $claveid=fgets($leer);
                $clavenombre=fgets($leer);
                $clavegenero=fgets($leer);
                $clavetipo=fgets($leer);
                $clavesalario=fgets($leer);
                $claveusu=fgets($leer);
                $clavepass=fgets($leer);
                $clavefoto=fgets($leer);
                if($id==$claveid){
                    echo"<script type='text/javascript'>
			            alert('Error... El usuario ya existe');
			            location.assign('index.php');
			            </script>"; 
                    $flag=false;
                    break;
                }
            }
                                fclose($leer);
                                if($flag){
                                    $guardar=fopen('empleados.txt','a+');
                                    fputs($guardar,$id."\n");
                                    fputs($guardar,$nombre."\n");
                                    fputs($guardar,$genero."\n");
                                    fputs($guardar,$tipo_emp."\n");
                                    fputs($guardar,$salario."\n");
                                    fputs($guardar,$usuario."\n");
                                    fputs($guardar,$contrasena."\n");
                                    fputs($guardar,$imagen."\n");
                                    fclose($guardar);
                                    echo"<script type='text/javascript'>
                                    alert('Datos agregados correctamente');
                                    location.assign('index.php');
                                    </script>";
            }
          }
    
?>