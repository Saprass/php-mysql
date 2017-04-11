<?php
$link = new mysqli("localhost", "root", "", "mysql");
if (!$link) {
	echo "Fallo al conectar a MySQL: (" . $link->connect_errno . ")" . $link->connect_error;
}
echo $link->host_info . "\n";
if (!$link->query("DROP TABLE IF EXISTS test") ||
	!$link->query("CREATE TABLE test(id INT)")) {
	echo "Falló la creación de la tabla: (" . $link->errno . ") " . $link->error;
}

$sql = "SELECT COUNT(*) AS _num FROM test; ";
$sql .= "INSERT INTO test(id) VALUES (1), (2); ";
$sql .= "SELECT COUNT(*) AS _num FROM test; ";

if (!$link->multi_query($sql)) {
	echo "Falló la multiconsulta: (" . $link->errno . ") " . $link->error;
}

do {
	if($resultado = $link->store_result()) {
		var_dump($resultado->fetch_all(MYSQL_ASSOC));
		$resultado->free();
	}
	
} while ($link->more_results() && $link->next_result());

?>