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
    <title>Actualizar productos</title>
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
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Registro.php">Registrar</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>
    
    <div class="login-box">
        <h2>Actualizar</h2>
        <form action="/main.php" method="post">
          <div class="user-box">
            <input type="text" name="id" required="">
            <label>ID</label>
          </div>
          <div class="user-box">
            <input type="text" name="nombre" required="">
            <label>Nombre</label>
          </div>
          <div class="user-box">
            <input type="text" name="descripcion" required="">
            <label>Descripción</label>
          </div>
          <div class="user-box">
            <input type="number" name="cantidad" required="">
            <label>Cantidad</label>
          </div>
          <div class="user-box">
            <input type="number" name="precio" required="">
            <label>Precio</label>
          </div>
          <button type="submit" class="btn btn-outline-primary" name="actualizar">Actualizar</button>
        </form>
    </div>

</body>
</html>