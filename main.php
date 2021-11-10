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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles_pres.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body >
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
        <center>
            <div id="contenedor">
                    
                    <div id="box">
                        <div id="titulo">
                        <p id="2" ></p>
                        <h1 style="color: #F2F2F2; font-size: 29px; text-align:center;">Bienvenido al Sistema de Préstamos</h1>

                        </div id="bt-1">
                        <div>
                        <button type="button" class="btn btn-primary" onclick="location.href='indexUsers.php';">GESTION EMPLEADOS</button>
                        </div>
                        <div id="bt-2">
                        <button type="button" class="btn btn-info" onclick="location.href='administrarPrestamos.php';">GESTION PRESTAMOS</button>
                        </div>

                    </div>
            </div> 
        </center>
</body>
</html>