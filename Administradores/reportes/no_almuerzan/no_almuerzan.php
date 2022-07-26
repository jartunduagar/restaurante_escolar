<?php 
include '../includes/conexion.php';
$consulta = noAlmuerzanReporte();

session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = '') {
  echo "<script>alert('Usted no tiene autorización');
  window.location.href='../usuarios.php';</script>";
  die();
}


?>
<!DOCTYPE html>
<html lang="ES">
<head>
  <title>Todos los usuarios.</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>

  <header>
    <nav class="menu">
      <div class="container-menu">
        <div class="logo">
          <div class="logo-name">
            <img src="images/icons/favicon.png" alt="">
            <a href="inicio.php">Restaurante Escolar</a>
          </div>
          <div class="icon-menu">
            <a href="#" id="btn-menu" class="btn-menu"><span class="fa fa-bars"></span>
            </a>
          </div>
        </div>
      </div>

      <script language="JavaScript">
        function pregunta(){
          return confirm('¿Estas seguro de enviar este formulario?');
        }
      </script>

      <div class="menu-link">
        <ul>
          <li><a href="seleccion.php">Volver</a></li>
          <li><a style="color: red;" href="../cerrar_sesion.php">Salir</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <br><br>
        <span class="contact2-form-title">
          Reporte de usuarios que no almuerzan
        </span>
        <table class="table table-striped" style="text-align: center;">
          <thead>
            <tr>
              <th width="200">Código</th>
              <th width="600">Nombre</th>
              <th width="100">Grado</th>
              <th width="200">Especialidad</th>
              <th width="300">Fecha recibido</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($persona = $consulta->fetch_assoc()){
             ?>
             <tr>
              <td><?php echo $persona['codigo']; ?></td>
              <td><?php echo $persona['nombre']; ?></td>
              <td><?php echo $persona['grado']; ?></td>
              <td><?php echo $persona['especialidad']; ?></td>
              <td><?php echo $persona['fecha']; ?></td>
              </tr>
              <?php 
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
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>

</body>
</html>
