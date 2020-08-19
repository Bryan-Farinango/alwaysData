<?php 

$url = "https://byrontosh.github.io/SOAJSON/personal.json";

$miVar = file_get_contents($url);

$decodJson = json_decode($miVar);

foreach ($decodJson as $p) {
	
	echo "<br>";

		$con = mysqli_connect("mysql-andresdavid.alwaysdata.net","211718","password1!") or die("Sin conexion");

		mysqli_set_charset($con,"utf8");
		mysqli_select_db($con,"andresdavid_empresa1");
}

//Datos desde la base

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>";

echo "<br>";
echo "<br>";
echo "<h2>";
echo "Datos desde la base MYSQL de Empleados";
echo "</h2>";
echo "<br>";

$sql = "select * from personal";

$rs = mysqli_query($con, $sql);

while ($row1 = mysqli_fetch_object($rs)) {
	$datos[] = $row1;
}

echo "<table class='table'>";
echo "  <thead class='thead-dark'>";
echo "    <tr>";
echo "      <th scope='col'>Nombre</th>";
echo "     <th scope='col'>Departamento</th>";
echo "     <th scope='col'>Cargo</th>";
echo "      <th scope='col'>Email</th>";
echo "      <th scope='col'>Genero</th>";
echo "      <th scope='col'>Direccion</th>";
echo "      <th scope='col'>Telefono</th>";
echo "    </tr>";
echo "  </thead>";
echo "  <tbody>";
echo "<br>";    
    
foreach ($datos as $dat) {

	echo "<tr>";
	echo " <td> ";
	echo "$dat->nombre";
	echo " </td>";

	echo " <td> ";
	echo "$dat->departamento";
	echo " </td>";

	echo " <td> ";
	echo "$dat->cargo";
	echo " </td>";

	echo " <td> ";
	echo "$dat->email";
	echo " </td>";

	echo " <td> ";
	echo "$dat->genero";
	echo " </td>";

	echo " <td> ";
	echo "$dat->direccion";
	echo " </td>";

	echo " <td> ";
	echo "$dat->telefono";
	echo " </td>";
	echo "</tr>";
}

echo "</tbody>";
echo "</table>";

echo "<a href='/index.html' class='btn btn-secondary btn-lg active' role='button' aria-pressed='true'>Inicio</a>";

mysqli_close($con);


 ?>