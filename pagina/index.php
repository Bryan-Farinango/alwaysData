<?php 

$url = "https://byrontosh.github.io/SOAJSON/personal.json";

$miVar = file_get_contents($url);

$decodJson = json_decode($miVar);

echo "Informacion JSON desde la URL";
echo "<br>";

foreach ($decodJson as $p) {
	echo "Nombre : ".$nombre = $p->nombre;
	echo "<br>";

	echo "Deptartamento : ".$depto = $p->depto;
	echo "<br>";

	echo "Cargo : ".$cargo = $p->cargo;
	echo "<br>";

	echo "Email : ".$email = $p->email;
	echo "<br>";

	echo "Genero : ".$genero = $p->genero;
	echo "<br>";

	echo "Telefono : ".$telefono = $p->telefono;
	echo "<br>";

	echo "Direccion : ";


	$cont="";
	foreach ($p->direccion as $d) {
		echo $d. " --- ";
		$cont=$cont." ".$d;
	}

	echo "<br>";

		$con = mysqli_connect("mysql-andresdavid.alwaysdata.net","211718","password1!") or die("Sin conexion");

		mysqli_set_charset($con,"utf8");
		mysqli_select_db($con,"andresdavid_empresa1");

		$consulta = "INSERT INTO personal (nombre,departamento,cargo,email,genero,direccion,telefono) VALUES ('$nombre','$depto','$cargo','$depto','$genero','$cont','$telefono');";

		$resultado = mysqli_query($con, $consulta);
		echo "<br>";
}

if ($resultado == true) {
	echo "<br>";
	echo "Datos guardados";
}else{
	echo "<br>";
	echo "Error";
}

echo "<br>";
echo "<br>";



//leer datos desde la base

echo "<br>";
echo "<br>";
echo "Datos desde la base MYSQL";
echo "<br>";

$sql = "select * from personal";

$rs = mysqli_query($con, $sql);

while ($row1 = mysqli_fetch_object($rs)) {
	$datos[] = $row1;
}

foreach ($datos as $dat) {
	echo "<br>";
	echo "$dat->nombre";
	echo "<br>";
}

mysqli_close($con);


 ?>