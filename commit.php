<?php
// Datos para conectar a la base de datos.
$servername = "localhost";
$database = "geoweb";
$username = "root";
$password = "root";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo 'Se ha conectado a la bd'; 
echo '<br>';
?>

<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'INSERT INTO
            clima
                (tipo, temperatura, humedad, presion,
                precipitacion)
            VALUES
                ("' . $_POST['tipo'] . '",
                ' . $_POST['temperatura'] . ',
                ' . $_POST['humedad'] . ',
                ' . $_POST['presion'] . ',
                ' . $_POST['precipitacion'] . ')';
        break;
    case 'people':
        $query = 'INSERT INTO
            geografia
                (latitud, altitud, mar)
            VALUES
                (' . $_POST['latitud'] . ',
                 ' . $_POST['altitud'] . ',
                 ' . $_POST['mar'] . ')';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'UPDATE clima SET
                tipo = "' . $_POST['tipo'] . '",
                temperatura = ' . $_POST['temperatura'] . ',
                humedad = ' . $_POST['humedad'] . ',
                presion = ' . $_POST['presion'] . ',
                precipitacion = ' . $_POST['precipitacion'] . '
            WHERE
                id = ' . $_POST['id'];
        break;
    case 'people':
    $query = 'UPDATE geografia SET
            latitud = ' . $_POST['latitud'] . ',
            altitud = ' . $_POST['altitud'] . ',
            mar = ' . $_POST['mar'] . '
        WHERE
            id = ' . $_POST['id'];
        break;  
    }
    

    break;
}
if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>
