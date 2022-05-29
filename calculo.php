<?php
$nombre = $_POST['nombre'];
$nota1=$_POST['nota1'];
$nota2=$_POST['nota2'];
$parcial=$_POST['parcial'];

echo "Nombre: ".$nombre.'<br>'; 
echo "Laboratorio1: ".$nota1.'<br>'; 
echo "Laboratorio2: ".$nota2.'<br>'; 
echo "Parcial: ".$parcial.'<br>'; 

$promedio = ($nota1 + $nota2 + $parcial)/3;

echo "Promedio: ".number_format($promedio,2).'<br>'; 

$conect = mysqli_connect("localhost", "root", "catolica", "registro_danielSanchez");

if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}
$res = mysqli_query($conect,"SELECT max(idAlu)+1 maxid FROM alumnos_daniel");
$row = mysqli_fetch_assoc($res);
$id = $row['maxid'];
$query = "INSERT INTO alumnos_daniel VALUES ($id,'$nombre', $nota1, $nota2,$parcial)";
mysqli_query($conect, $query);

printf ("Nuevo ingreso con el id %d.\n", $conect->insert_id);
mysqli_close($conect);
?>