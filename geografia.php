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
            latitud, altitud, mar
        FROM
            geografia
        WHERE
            id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $latitud = 0;
    $altitud = 0;
    $mar = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Geografia</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=people"
   method="post">
   <table>
    <tr>
     <td>Latitud</td>
     <td><input type="text" name="latitud"
      value="<?php echo $latitud; ?>"/></td>
    </tr><tr>
     <td>Altitud</td>
     <td><input type="text" name="altitud"
      value="<?php echo $altitud; ?>"/></td>
    </tr>
    <tr>
     <td>Mar</td>
     <td><input type="text" name="mar"
      value="<?php echo $mar; ?>"/></td>
    </tr>

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
