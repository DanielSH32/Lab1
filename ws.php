<?php
include "vendor/autoload.php";
$server=new nusoap_server;
$server->configureWSDL('server','urn:server');
$server->wsdl->schemaTargetNamespace='urn:server';
$server->register(
    'hola',
    array('usuario'=>'xsd:string'),
    array('return'=>'xsd:string'),
    'urn:server',
    'urn:server#holaServer',
    'rpc',
    'encoded',
    'Funcion hola mundo que solicita un parametro'
);
$server->register(
    'mayor',
    array('valor1'=>'xsd:int','valor2'=>'xsd:int'),
    array('return'=>'xsd:string'),
    'urn:server',
    'urn:server#mayorServer',
    'rpc',
    'encoded',
    'Funcion para calcular mayor de dos numeros'
);


$server->wsdl->addComplexType(
    'Persona',
    'complexType',
    'struct',
    'all',
    '',
    array('id_user'=>array('name'=>'id_user','type'=>'xsd:int'),
          'fullname'=>array('name'=>'fullname','type'=>'xsd:string'),
          'email'=>array('name'=>'email','type'=>'xsd:string'),
          'msg'=>array('name'=>'msg','type'=>'xsd:string'),
          'level'=>array('name'=>'level','type'=>'xsd:int')
    )
);

$server->register(
    'login',
    array('username'=>'xsd:string','password'=>'xsd:string'),
    array('return'=>'tns:Persona'),
    'urn:server',
    'urn:server#loginServer',
    'rpc',
    'encoded',
    'Funcion para validar usuario y password'
);

function login($username,$password) {
    if (($username=="admin") && ($password=="catolica")) {
        $valor=array(
                'id_user'=>1,
                'fullname'=>'Juan Lopez',
                'email'=>'juan@gmail.com',
                'msg'=>'Usuario correcto',
                'level'=>1
            );
    } else {
        $valor=array(
            'id_user'=>0,
            'fullname'=>'',
            'email'=>'',
            'msg'=>'Usuario incorrecto',
            'level'=>0
        );
    }
    return $valor;
}





function mayor($valor1,$valor2) {
    if ($valor1>$valor2) {
        return "El mayor es $valor1";
    } else {
        return "El mayor es $valor2";
    }
}

function hola($usuario) {
    return "Bienvenido {$usuario}";
}

$server->service(file_get_contents("php://input"));
