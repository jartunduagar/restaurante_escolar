<?php
error_reporting(0);
include 'conexion.php';

session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];

if ($varsesion == null || $varsesion = '') {
  echo "<script>alert('Usted no tiene autorización');
  window.location.href='../expulsar.php';</script>";
  die();
}

?>
<!DOCTYPE html>
<html lang="ES">

<head>
  <title>Modificar usuario.</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.png" />
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <header>
    <nav class="menu">
      <div class="container-menu">
        <div class="logo">
          <div class="logo-name">
            <img src="images/icons/favicon.png" alt="">
            <a href="../inicio.php">Restaurante Escolar</a>
          </div>
          <div class="icon-menu">
            <a href="#" id="btn-menu" class="btn-menu"><span class="fa fa-bars"></span>
            </a>
          </div>
        </div>
      </div>

      <div class="menu-link">
        <ul>
          <li><a href="../inicio.php">Inicio</a></li>
          <li><a href="../php/insertar.php">Insertar</a></li>
          <li><a href="../php/consultar.php">Consultar</a></li>
          <li><a href="../php/activar.php">Activar</a></li>
          <li><a href="../reportes/seleccion.php">Reportes</a></li>
          <li><a href="../tarjetas/index.php">Tarjetas</a></li>
          <li><a href="../php/index-iniciar.php">Inicio Dia</a></li>
          <li><a style="color: red;" href="../cerrar_sesion.php">Salir</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <br><br>
  <table class="table table-striped">
    <thead style="text-align: center;">
      <tr style="color: black;">
        <th width="100">Id</th>
        <th width="200">Código</th>
        <th width="700">Nombre</th>
        <th width="100">Grado</th>
        <th width="100">Estado</th>
        <th width="300">Especialidad</th>
        <th width="400">Fecha de recibido</th>
        <th><a href="nuevo.php?nuevo_user"><button type="button" class="btn btn-info">Nuevo</button></a></th>
      </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php
      include "conexion.php";
      $sentecia = "SELECT * FROM estudiantes";
      $resultado = $conexion->query($sentecia) or die(mysqli_error($conexion));
      while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $fila['id'];
        "</td>";
        echo "<td>";
        echo $fila['codigo'];
        "</td>";
        echo "<td>";
        echo $fila['nombre'];
        "</td>";
        echo "<td>";
        echo $fila['grado'];
        "</td>";
        echo "<td>";
        echo "S-" . $fila['estado'];
        "</td>";
        echo "<td>";
        echo $fila['especialidad'];
        "</td>";
        echo "<td>";
        echo $fila['fecha'];
        "</td>";
        echo "<td><a href='modificar.php?id=" . $fila['id'] . "'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
        echo " <td><a href='eliminar_user.php?id=" . $fila['id'] . "'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>



  <script src="js/jquery-3.4.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
  <!--===============================================================================================-->
  <script src="js/menu.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>

</body>

</html>