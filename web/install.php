<?php
include_once("../app/Config.php");
$host = Config::$mvc_bd_hostname;
$user = Config::$mvc_bd_usuario;
$pass = Config::$mvc_bd_clave;
//$c=mysqli_connect ("localhost","root","root") or die ("Imposible conectar");

$c=mysqli_connect ($host,$user,$pass) or die ("Imposible conectar");
if(mysqli_query($c, "DROP DATABASE IF EXISTS alimentos")){
    echo"borrado ok<br/>";
}else{
    echo "fallo al borrar la BD<br/>";
}
if(mysqli_query($c, "CREATE DATABASE IF NOT EXISTS alimentos")){
    echo"creada base datos ok<br/>";
}else{
    echo "fallo al crear la BD<br/>";
}

//$c=mysqli_connect ($host,$user,$pass,'alimentos');

mysqli_select_db($c, 'alimentos');

$tabla_alimentos= "CREATE TABLE IF NOT EXISTS `alimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `energia` decimal(10,2) NOT NULL,
  `proteina` decimal(10,2) NOT NULL,
  `hidratocarbono` decimal(10,2) NOT NULL,
  `fibra` decimal(10,2) NOT NULL,
  `grasatotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";

if(mysqli_query($c, $tabla_alimentos)){
    echo"creada tabla ok<br/>";

}else{
    echo "fallo al crear la tabla<br/>";
}

?>