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
</body>
<script>
    function crearEmpresa() {
        <?php
        //Recuperar datos
        if (isset($_POST['rut'])) {
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