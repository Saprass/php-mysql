<?php echo "Hola"; 

$un_bool = TRUE;
$un_int = 12;
$array = array(1,2,3,4);
$array2 = [1,2,3,4];
$a = 1;
$b = 2;

function Suma()
{
	global $a, $b;
	
	$b = $a + $b;
}

function SumaGlobal()
{
	$GLOBALS['b'] = $GLOBALS['b'] + $GLOBALS['a'];
}




$array[1] = "manolo";

echo gettype($un_bool);
echo "<hr>";
echo "<br>";
echo gettype($un_int);
echo "<br>";
var_dump($array);
print_r($array);
echo "<br>";
echo "$array2[1]";

echo "<br>";
echo "<br>";
Suma();
echo $b;
echo "<br>";
SumaGlobal();
echo $b;
echo "<br>";
echo "<br>";

echo __FILE__;
echo "<br>";
echo "<br>";
echo __DIR__;

echo "<br>";
echo "<br>";

echo `dir`;

echo "<br>";
echo "<br>";





?>

