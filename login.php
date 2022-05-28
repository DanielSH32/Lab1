<?php
include "vendor/autoload.php";
$url="http://virtual.unicaes.edu.sv/webservice/ws.php?wsdl";
$cliente=new nusoap_client($url,'wsdl');
$err=$cliente->getError();
if ($err) {
    echo "Error de conexion con webservice:$err";
    exit(0);
}
$parametros=array('username'=>'admin','password'=>'catolica');
$result=$cliente->call('login',$parametros);
echo $cliente->getError();
print_r($result);