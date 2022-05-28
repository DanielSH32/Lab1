<?php
include "vendor/autoload.php";
$server=new nusoap_server;
$server->configureWSDL('server','urn:server');
$server->wsdl->schemaTargetNamespace='urn:server';
$server->wsdl->addComplexType(
    'Promedio',
    'complexType',
    'struct',
    'all',
    '',
    array('id_user'=>array('name'=>'id_user','type'=>'xsd:int'),
          'nombre'=>array('name'=>'nombre','type'=>'xsd:string'),
          'nota1'=>array('name'=>'nota1','type'=>'xsd:float'),
          'nota2'=>array('name'=>'nota2','type'=>'xsd:float'),
          'parcial'=>array('name'=>'parcial','type'=>'xsd:float'),
          'promedio'=>array('name'=>'promedio','type'=>'xsd:float')
    )
);

$server->register(
    'promedio',
    array('nombre'=>'xsd:string','nota1'=>'xsd:float', 'nota2'=>'xsd:float', 'parcial'=>'xsd:float'),
    array('return'=>'tns:Promedio'),
    'urn:server',
    'urn:server#promedioServer',
    'rpc',
    'encoded',
    'Funcion que solicita 3 notas y devuelve el promedio final'
);

function promedio($nombre, $nota1, $nota2, $parcial){
    $promedio=($nota1*0.25)+($nota2*0.25)+($parcial*0.50);
    $conect = mysqli_connect("localhost", "root", "catolica", "registro_danielSanchez");
    $conect->executeInsert("insert into alumnos_daniel set nombre='{$nombre}', nota1='{$nota1}', 
    nota2='{$nota2}', parcial='{$parcial}'");
    $result=array(
        'id_user'=>1,
        'nombre'=>$nombre,
        'nota1'=>$nota1,
        'nota2'=>$nota2,
        'parcial'=>$parcial,
        'promedio'=>$promedio
    );
    return $result;
}


$server->service(file_get_contents("php://input"));