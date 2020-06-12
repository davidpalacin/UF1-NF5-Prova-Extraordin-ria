<?php
//connect to MySQL
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

$query = 'CREATE TABLE clima (
    id PRIMARY KEY, NOT NULL, AUTO_INCREMENT,
    tipo varchar(20),
    temperatura float,
    humedad int,
    presion int,
    precipitacion int
)
ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

$query = 'CREATE TABLE geografia (
    id PRIMARY KEY, NOT NULL, AUTO_INCREMENT,
    latitud int,
    altitud int,
    mar tinyint,
    distancia int,
    cfclima int,
    FOREIGN KEY (cfclima) REFERENCES clima(id)
)
ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

$query = '
INSERT INTO `geoweb`.`clima` (`id`, `tipo`, `temperatura`, `humedad`, `presion`, `precipitacion`) VALUES ('3', 'oceanico', '12', '7', '7', '60');
INSERT INTO `geoweb`.`clima` (`id`, `tipo`, `temperatura`, `humedad`, `presion`, `precipitacion`) VALUES ('4', 'desertico', '12', '7', '7', '60');
INSERT INTO `geoweb`.`clima` (`id`, `tipo`, `temperatura`, `humedad`, `presion`, `precipitacion`) VALUES ('5', 'polar', '28', '7', '7', '40');
ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

$query = '
INSERT INTO `geoweb`.`geografia` (`id`, `latitud`, `altitud`, `mar`, `cfclima`) VALUES ('3', '5', '5', '1', '3');
INSERT INTO `geoweb`.`geografia` (`id`, `latitud`, `altitud`, `mar`, `cfclima`) VALUES ('4', '3', '3', '0', '4');
INSERT INTO `geoweb`.`geografia` (`id`, `latitud`, `altitud`, `mar`, `cfclima`) VALUES ('5', '5', '5', '0', '5');
ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'geoweb database successfully updated!';
?>

