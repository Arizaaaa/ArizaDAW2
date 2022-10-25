<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mi titulo de Proyecto</title>
      <link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  </head>
  <body>

  <!-- <script type='text/javascript'> 
            
    function login () {

      Swal.fire({
        icon: 'error',
        title: 'Oops...!',
        text: 'Correo o contraseña errónea.',  
      }).then(function() { window.location = "IniciarSesion.php"; });

    }

  </script> -->

  </body>
</html>

<?php

error_reporting(0);

session_start();

$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$nombre = $_POST['nombre'];

$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$contraseña = md5($_POST['contraseña']);
$cContraseña = $_POST['cContraseña'];

$servidor="localhost";
$usuario="root";
$password="usbw";
$bd="test";

$con=mysqli_connect($servidor,$usuario,$password,$bd);

if (isset($_POST['actualizar'])) { actualizar($con, $id, $nombre, $descripcion, $cantidad, $precio); }
elseif (isset($_POST['borrar'])) { borrar($con, $id); }
elseif (isset($_POST['buscar'])) { buscar($con, $id); }
elseif (isset($_POST['insertar'])) { insertar($con, $nombre, $descripcion, $cantidad, $precio, $id); }
elseif (isset($_POST['registrar'])) { registrar($con, $nombre, $apellidos, $correo, $contraseña); }
elseif (isset($_POST['login'])) { login($con, $correo, $contraseña); }

function actualizar($con, $id, $nombre, $descripcion, $cantidad, $precio) {

    if($con){
        mysqli_set_charset($con,"utf8");
    
        $sql="UPDATE `prod` SET `nombre`='$nombre',`descripcion`='$descripcion',`cantidad`='$cantidad',`precio`='$precio' WHERE `id` = '$id'";
        $consulta=mysqli_query($con,$sql);
    
    }

    ver(false, $con, $id);

}

function borrar($con, $id) {

    if($con){
        mysqli_set_charset($con,"utf8");
    
        $sql="DELETE FROM `prod` WHERE `id` = '$id'";
        
        $consulta=mysqli_query($con,$sql);
    }

    ver(false, $con, $id);

}

function buscar($con, $id) {

    if($con){
        mysqli_set_charset($con,"utf8");
    
        $sql="SELECT `nombre`, `descripcion`, `cantidad`, `precio` FROM `prod` WHERE `id` = '$id'";
        
        $consulta=mysqli_query($con,$sql);
    }

    ver(true, $con, $id);

}

function insertar($con, $nombre, $descripcion, $cantidad, $precio, $id) {

  if($con){
    mysqli_set_charset($con,"utf8");

    $sql="INSERT INTO `prod`(`id`, `nombre`, `descripcion`, `cantidad`, `precio`) VALUES (NULL,'$nombre','$descripcion','$cantidad','$precio')";

    $consulta=mysqli_query($con,$sql);
  }

  ver(false, $con, $id);

}

function registrar($con, $nombre, $apellidos, $correo, $contraseña) {

  if($con){
    mysqli_set_charset($con,"utf8");

    $sql="INSERT INTO `user`(`id`, `nombre`, `apellidos`, `correo`, `contraseña`, `admin`) VALUES (NULL,'$nombre','$apellidos','$correo','".md5($contraseña)."', 0)";
    
    $consulta=mysqli_query($con,$sql);
  }

  hola($con);

}

function login($con, $correo, $contraseña) {

  if($con){

    $sql = "SELECT * FROM `user` WHERE `correo` = '$correo'";
    $consulta=mysqli_query($con,$sql);
    $fila=$consulta->fetch_assoc();

      var_dump($fila['contraseña']);
      var_dump($fila['correo']);
      var_dump($contraseña);

    }  
    
}

function ver($_buscar, $con, $id) {

  ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <title>Vista de productos</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Mercadowna</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="InsertarProductos.php">Introducir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="ActualizarProductos.php">Actualizar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="BuscarProductos.php">Buscar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="BorrarProductos.php">Borrar</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li>
              <a class="nav-link active" aria-current="page" href="Carrito.php"></a>
            </li>
            <li>
              <a class="nav-link active" aria-current="page" href="Registro.php">Registrar</a>
            </li>
            <li>
              <a class="nav-link active" aria-current="page" href="IniciarSesion.php">Iniciar Sesión</a>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </nav>
        <div>
          <table class="table table-dark table-borderless">
                <?php
                    if ($_buscar == true) {
                        echo "<td>NOMBRE</td>";
                        echo "<td>DESCRIPCIÓN</td>";
                        echo "<td>CANTIDAD</td>";
                        echo "<td>PRECIO</td>";
                        $sql2="SELECT `nombre`, `descripcion`, `cantidad`, `precio` FROM `prod` WHERE `id` = '$id'";
                        $consulta2=mysqli_query($con,$sql2);
                        while($fila=$consulta2->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$fila["nombre"]."</td>";
                        echo "<td>".$fila["descripcion"]."</td>";
                        echo "<td>".$fila["cantidad"]."</td>";
                        echo "<td>".$fila["precio"]."</td>";
                        echo "</tr>";
                        }
                    } elseif ($_buscar == false) {
                        echo "<td>ID</td>";
                        echo "<td>NOMBRE</td>";
                        echo "<td>DESCRIPCIÓN</td>";
                        echo "<td>CANTIDAD</td>";
                        echo "<td>PRECIO</td>";
                        $sql3="SELECT * FROM `prod`";
                        $consulta3=mysqli_query($con,$sql3);
                        while($fila=$consulta3->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$fila["id"]."</td>";
                            echo "<td>".$fila["nombre"]."</td>";
                            echo "<td>".$fila["descripcion"]."</td>";
                            echo "<td>".$fila["cantidad"]."</td>";
                            echo "<td>".$fila["precio"]."</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </div>
    </body>
    </html>

  <?php

}

function hola($con) {

  ?>
  
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <title>Vista de productos</title>
    </head>

    <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Mercadowna</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="InsertarProductos.php">Introducir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="ActualizarProductos.php">Actualizar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="BuscarProductos.php">Buscar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="BorrarProductos.php">Borrar</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li>
              <a class="nav-link active" aria-current="page" href="Carrito.php"></a>
            </li>
            <li>
              <a class="nav-link active" aria-current="page" href="Registro.php">Registrar</a>
            </li>
            <li>
              <a class="nav-link active" aria-current="page" href="IniciarSesion.php">Iniciar Sesión</a>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </nav>
        <div>
          <table class="table table-dark table-borderless">
              <?php
              echo "<td>ID</td>";
              echo "<td>NOMBRE</td>";
              echo "<td>APELLIDOS</td>";
              echo "<td>CORREO</td>";
              echo "<td>CONTRASEÑA</td>";
              echo "<td>ADMIN</td>";
              $sql3="SELECT * FROM `user`";
              $consulta3=mysqli_query($con,$sql3);
              while($fila=$consulta3->fetch_assoc()){
                  echo "<tr>";
                  echo "<td>".$fila["id"]."</td>";
                  echo "<td>".$fila["nombre"]."</td>";
                  echo "<td>".$fila["apellidos"]."</td>";
                  echo "<td>".$fila["correo"]."</td>";
                  echo "<td>".$fila["contraseña"]."</td>";
                  echo "<td>".$fila["admin"]."</td>";
                  echo "</tr>";
              }
              ?>
            </table>
          </div>
      </body>
    </html>
  <?php
  }
  ?>