<?php
include "vendor/autoload.php";
$url="http://virtual.unicaes.edu.sv/webservice/webserv.php?wsdl";
$cliente=new nusoap_client($url,'wsdl');
$err=$cliente->getError();
if ($err) {
    echo "Error de conexion con webservice:$err";
    exit(0);
}
$parametros=array('nombre'=>$_POST['nombre'],'nota1'=>$_POST['nota1'], 'nota2'=>$_POST['nota2'], 
'parcial'=>$_POST['parcial']);
$result=$cliente->call('promedio',$parametros);
echo $cliente->getError();
print_r($result);
