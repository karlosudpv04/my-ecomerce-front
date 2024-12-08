<?php
$host = getenv('DB_HOST'); // Nombre del contenedor de MySQL
$user = getenv('MYSQL_USER'); 
$password = getenv('MYSQL_PASSWORD'); 
$database = getenv('MYSQL_DATABASE'); 
/*
echo $host;
echo $user;
echo $password;
echo $database;
*/
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM Productos";
$result = $conn->query($sql);

$productos = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($productos);
?>