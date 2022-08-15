<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/Busqueda.css">
  <!--Boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Búsqueda</title>
</head>

<body>
  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CabLagos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php
          if (ComprobarSesión()) {
          ?>
            <!--Sesión Iniciada-->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="IngresoCabana.php">Publicar Cabaña</a>
            </li>
            <?php
            if (ComprobarAdmin()) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="PaginaAdministrador.php">Página Administrador</a>
              </li>
            <?php
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="PaginaCabana.php">Pagina Cabaña</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Backend/CerrarSesion.php">Cerrar Sesión</a>
            </li>
          <?php
          } else {
          ?>
            <!--Sesión Cerrada-->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Registro.php">Crear Cuenta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="InicioSesion.php">Iniciar Sesión</a>
            <?php
          }
            ?>
            </li>
      </div>
    </div>
  </nav>

  <!-- Buscador -->
  <div class="buscador-inicio">
    <div class="formulario-busqueda">
      <form class="formulario" action="Busqueda.html">
        <input placeholder="Hola" class="inpt" type="text">
        <input placeholder="Hola" class="inpt" type="text">
        <input placeholder="Hola" class="inpt" type="text">
        <input placeholder="Hola" class="inpt" type="date" name="a" id="">
        <input type="submit" value="Buscar">
      </form>
    </div>
  </div>

  <!-- Main -->
  <main>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Cabañas</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cabañas y mapa</a>
      </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="card-bsq">
          <?php
          include("Backend/conection.php");
          $sql = "SELECT `idCabana` `Ciudad`, `Mensaje`, `NroPiezas`, `Estacionamiento`, `Precio` FROM `cabana`";
          $resultSet = mysqli_query($enlace, $sql);
          mysqli_close($enlace);
          while ($row = mysqli_fetch_row($resultSet)) {
          ?>
            <div class="card" style="width: 14rem;">
              <img src="Fotos_Cabanas/<?php echo $row[0];?>.jpg" class="card-img-top" alt="imgcab">
              <div class="card-body">
                <h5 class="card-title">nombre</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $row[4]; ?></li>
                <li class="list-group-item"><?php echo $row[3]; ?></li>
                <li class="list-group-item"><?php echo "$" . number_format($row[4]); ?></li>
              </ul>
              <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button">Buscar</button>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>

      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="row">
          <div class="col">
            <div class="card-bsq-2">
              <?php
              include("conection.php");
              $sql = "SELECT `Ciudad`, `Mensaje`, `NroPiezas`, `Estacionamiento`, `Precio` FROM `cabana`";
              $resultSet = mysqli_query($enlace, $sql);
              mysqli_close($enlace);
              while ($row = mysqli_fetch_row($resultSet)) {
              ?>
                <div class="card" style="width: 20rem;">
                  <img src="Imagenes/puerto-img.jpg" class="card-img-top" alt="imgcab">
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?php echo $row[0]; ?></li>
                    </ul>
                    <h5 class="card-title">nombre</h5>
                    <p class="card-text"><?php echo $row[1]; ?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $row[2]; ?></li>
                    <li class="list-group-item"><?php echo $row[3]; ?></li>
                    <li class="list-group-item"><?php echo $row[4]; ?></li>
                  </ul>
                  <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">Buscar</button>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="col">
            <div class="container-mapa">aasdasdaa</div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!--Footer-->
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>
        <img src="Imagenes/CabLagos_Logo.png" class="img-footer" alt="puerto-imagen">
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li>
          <a href="#" class="link-info">Inicio</a>
        </li>
        <li class="ms-3"><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
            </svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
            </svg></a></li>
        <li class="ms-3"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
          </svg><a class="text-muted" href="#"></a></li>
      </ul>
    </footer>
  </main>

  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>