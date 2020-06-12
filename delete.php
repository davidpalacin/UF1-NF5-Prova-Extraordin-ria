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

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'movie':
        echo 'Quieres borrar este clima?<br/>';
        break;
    case 'people':
        echo 'Quieres borrar esta geografia?<br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="geoweb.php">no</a>';
} else {
    switch ($_GET['type']) {
    case 'movie':

        $query = 'DELETE FROM geografia  WHERE id= ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $query = 'DELETE FROM clima  WHERE id= ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your clima has been deleted.
<a href="geoweb.php">Return to Index</a></p>
<?php
        break;
    case 'people':
         $query = 'DELETE FROM geografia  WHERE id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your geografia has been deleted.
<a href="geoweb.php">Return to Index</a></p>
<?php
        break;
    }
}
?>

