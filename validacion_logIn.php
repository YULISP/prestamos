<?php
session_start();
if(!isset($_SESSION['usuario'])){
	header("Location: index.php");
    exit();
}else{
    header("Location: indexUsers.php");
    exit();
}

?>