<?php
$link = new mysqli("localhost", "root", "", "mysql");
if (!$link) {
	echo "Fallo al conectar a MySQL: (" . $link->connect_errno . ")" . $link->connect_error;
}
echo $link->host_info . "\n";
if (!$link->query("DROP TABLE IF EXISTS test") ||
	!$link->query("CREATE TABLE test(id INT)")) {
	echo "Fall� la creaci�n de la tabla: (" . $link->errno . ") " . $link->error;
}

if (!$link->query("DROP PROCEDURE IF EXISTS p") ||
	!$link->query("CREATE PROCEDURE p(IN id_val INT) BEGIN INSERT INTO test(id) VALUES(id_val); END;")) {

	echo "Fall� la creaci�n del procedimiento almacenado: (" . $link->errno . ") " . $link->error;
}

if (!$link->query("CALL p(1)")) {
	echo "Fall� CALL: (" . $link->errno . ") " . $link->error;
}

if (!($resultado = $link->query("SELECT id FROM test"))) {
	echo "Fall� la consulta: (" . $link->errno . ") " . $link->error;
}

var_dump($resultado->fetch_assoc());

echo "<br>";

if (!$link->query("DROP PROCEDURE IF EXISTS p2") ||
	!$link->query('CREATE PROCEDURE p2(OUT msg VARCHAR(50)) BEGIN SELECT "�HOLA!" INTO msg; END;')) {
		echo "Fall� la creaci�n del procedimiento almacenado: (" . $link->errno . ") " . $link->error;
}

if (!$link->query("SET @msg = ''") || !$link->query("CALL p2(@msg)")) {
	echo "Fall� CALL: (" . $link->errno . ") " . $link->error;
}

if (!($resultado2 = $link->query("SELECT @msg as _p2_out"))) {
	echo "Fall� la obtenci�n: (" . $link->errno . ") " . $link->error;
}

$fila = $resultado2->fetch_assoc();
echo $fila['_p2_out'];

?>