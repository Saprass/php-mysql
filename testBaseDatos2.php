<?php
$link = new mysqli("localhost", "root", "", "mysql");
if (!$link) {
	echo "Fallo al conectar a MySQL: (" . $link->connect_errno . ")" . $link->connect_error;
}
echo $link->host_info . "\n";
if (!$link->query("DROP TABLE IF EXISTS test") ||
	!$link->query("CREATE TABLE test(id INT)") ||
	!$link->query("INSERT INTO test(id) VALUES (1)")) {
	echo "Falló la creación de la tabla: (" . $link->errno . ") " . $link->error;
}
?>