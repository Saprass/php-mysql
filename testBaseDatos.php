<?php
$link = new mysqli("localhost", "mysql");
if (!$link) {
	die('Could not connect to MySQL: ' . mysql_error());
}

echo 'Connection OK';

$resultado = $link -> query("SELECT 'Saludos, coyote espacial' AS _message FROM DUAL");
$fila = $resultado -> fetch_assoc();
echo htmlentities($fila['_message']);
echo "<br>";
echo $link->host_info . "\n";
echo "<br>";
echo "<br>";

$link2 = new mysqli("127.0.0.1", "mysql");
if (!$link2) {
	echo "Fallo al conectar a MySQL: (" . $link2->connect_errno . ")" . $link2->connect_error;
}
echo $link2->host_info . "\n";
if (!$link2->query("DROP TABLE IF EXISTS test") ||
	!$link2->query("CREATE TABLE test(id INT)") ||
	!$link2->query("INSERT INTO test(id) VALUES (1)")) {
	echo "Falló la creación de la tabla: (" . $link2->errno . ") " . $link2->error;
}
?>