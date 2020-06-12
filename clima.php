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
if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            tipo, temperatura, humedad, presion, precipitacion
        FROM
            clima
        WHERE
            id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $tipo = '';
    $temperatura = 0;
    $humedad = 0;
    $presion = 0;
    $precipitacion = 0;
}

?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Clima</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=movie"
   method="post">
   <table>
    <tr>
     <td>Tipo</td>
     <td><input type="text" name="tipo"
      value="<?php echo $tipo; ?>"/></td>
    </tr>

    <tr>
     <td>Temperatura</td>
     <td><input type="text" name="temperatura"
      value="<?php echo $temperatura; ?>"/></td>
    </tr>

    <tr>
     <td>Humedad</td>
     <td><input type="text" name="humedad"
      value="<?php echo $humedad; ?>"/></td>
    </tr>

    <tr>
     <td>Presion</td>
     <td><input type="text" name="presion"
      value="<?php echo $presion; ?>"/></td>
    </tr>

    <tr>
     <td>Precipitacion</td>
     <td><input type="text" name="precipitacion"
      value="<?php echo $precipitacion; ?>"/></td>
    </tr>

    <tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="id" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>
