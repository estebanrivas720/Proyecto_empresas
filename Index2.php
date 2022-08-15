

<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="CSS\Index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Proyecto Papá</title>
</head>

<body>
  <h1>Proyecto Papá</h1>

  <!--Empresas-->
  <h2>Empresas</h2>
  <table>
    <tr>
      <th>Empresa</th>
      <th>Contacto</th>
      <th>Teléfono</th>
      <th>Correo</th>
      <th>Cantidad de trabajos</th>
      <th>Último Trabajo</th>
    </tr>
    <tr>
      <td>Alfreds Futterkiste</td>
      <td>Maria Anders</td>
      <td>Germany</td>
    </tr>
    <tr>
      <td>Alfreds Futterkiste</td>
      <td>Maria Anders</td>
      <td>Germany</td>
    </tr>
  </table><br>

  <!--Desglose Empresa-->
  <h2>PatagoniaRov</h2>
  <form onsubmit="return crearEmpresa()" method="POST">
    <label for="rut">Rut: </label> <input type="text" id="rut" name="rut"><br>
    <label for="direccion">Dirección: </label> <input type="text" id="direccion" name="direccion"><br>
    <label for="razon_social">Razón Social: </label> <input type="text" id="razon_social" name="razon_social"><br>
    <label for="numero">Número: </label> <input type="text" id="numero" name="numero"><br>
    <label for="numero2">Número 2: </label> <input type="text" id="numero2" name="numero2"><br>
    <label for="correo">Correo: </label> <input type="text" id="correo" name="correo"><br>
    <label for="ingresos_pagados">Ingresos Pagados: </label> <input type="text" id="ingresos_pagados" name="ingresos_pagados"><br>
    <label for="ingresos_pendientes">Ingresos Pendientes: </label> <input type="text" id="ingresos_pendientes" name="ingresos_pendientes"><br>
    <label for="observaciones">Observaciones: </label> <textarea name="textarea" rows="10" cols="50">Write something here</textarea><br>
    Contactos:
    <table>
      <tr>
        <th>Nombre</th>
        <th>Área</th>
        <th>Número</th>
        <th>Correo</th>
        <th>Cargo</th>
      </tr>
      <tr>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
      </tr>
      <tr>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
      </tr>
    </table><br>

    <input type="submit">
  </form>

  <!--Trabajos-->
  <h2>Trabajos</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Estado</th>
      <th>Fecha Inicio</th>
      <th>Fecha Término</th>
      <th>Estado de Pago</th>
      <th>Estado de Presupuesto</th>
    </tr>
    <tr>
      <td>Alfreds Futterkiste</td>
      <td>Maria Anders</td>
      <td>Germany</td>
    </tr>
    <tr>
      <td>Alfreds Futterkiste</td>
      <td>Maria Anders</td>
      <td>Germany</td>
    </tr>
  </table><br>

  <!--Desglose Trabajo-->
  <label for="fecha_referencia">Fecha de Referencia: </label> <input type="text" id="fecha_referencia" name="fecha_referencia"><br>
  <label for="valor">Valor: </label> <input type="text" id="valor" name="valor"><br>
  <label for="facturacion">Facturación: </label> <input type="text" id="facturacion" name="facturacion"><br>
  <label for="orden_compra">Orden de Compra: </label> <input type="text" id="orden_compra" name="orden_compra"><br>
  <label for="forma_pago">Forma de Pago: </label> <textarea name="forma_pago" rows="10" cols="50">Write something here</textarea><br>

  Contactos:
  <table>
    <tr>
      <th>Nombre</th>
      <th>Área</th>
      <th>Número</th>
      <th>Correo</th>
      <th>Cargo</th>
    </tr>
    <tr>
      <td>Alfreds Futterkiste</td>
      <td>Maria Anders</td>
      <td>Germany</td>
    </tr>
    <tr>
      <td>Alfreds Futterkiste</td>
      <td>Maria Anders</td>
      <td>Germany</td>
    </tr>
  </table><br>
</body>
<script>
  function crearEmpresa() {
    <?php
    //Recuperar datos
    if(isset($_POST['rut'])){
      $rut = $_POST['rut'];
      $direccion = $_POST['direccion'];
      $razon_social = $_POST['razon_social'];
      $numero = $_POST['numero'];
      $numero2 = $_POST['numero2'];
      $correo = $_POST['correo'];
  
      //Ingresar a base de datos
      include("Backend/coneccion.php");
      $insertar = "INSERT INTO `proyecto_papá`.`empresa` (`rut`, `direccion`, `razon_social`, `numero`, `numero2`, `contacto`, `correo`) VALUES ('$rut', '$direccion', '$razon_social', '$numero', '$numero2', 'contacto', '$correo');";
      mysqli_query($enlace, $insertar);
      mysqli_close($enlace);
      session_start();
    }
    return false;
    ?>
  }
</script>
</html>