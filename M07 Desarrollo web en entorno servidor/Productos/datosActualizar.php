<?php

$nombre = $_GET['nombre'];
$descripcion = $_GET['descripcion'];
$cantidad = $_GET['cantidad'];
$precio = $_GET['precio'];

$servidor="localhost";
$usuario="root";
$password="usbw";
$bd="productos";

$con=mysqli_connect($servidor,$usuario,$password,$bd);

if($con){
    mysqli_set_charset($con,"utf8");

    $sql="INSERT INTO `productos`(`id`, `nombre`, `descripcion`, `cantidad`, `precio`) 
    VALUES (NULL,'$nombre','$descripcion',$cantidad, $precio)";
    
    $consulta=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
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
                <a class="nav-link active" aria-current="page" href="InsertarProductos.html">Introducir</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ActualizarProductos.html">Actualizar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="BuscarProductos.html">Buscar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="BorrarProductos.html">Borrar</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>
    <div>
    <div class="login-box">
        <h2>Ver</h2>
        <form action="/datos.php" method="get">
          <div class="user-box">
            <input type="text" name="id" required="">
            <label>Nombre</label>
          </div>
          <div class="user-box">
            <input type="text" name="descripcion" required="">
            <label>Descripción</label>
          </div>
          <div class="user-box">
            <input type="text" name="cantidad" required="">
            <label>Cantidad</label>
          </div>
          <div class="user-box">
            <input type="text" name="precio" required="">
            <label>Precio</label>
          </div>
          <button class="btn btn-outline-primary"><a href="ActualizarProductos.html">ATRÁS</a></button>
        </form>
    </div>
    
</body>
</html>


<?php
}
?>