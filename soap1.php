<?php
//Create the client object
$soapclient = new SoapClient('http://service.ldsupr.ru/Service.svc?wsdl');

$params = array('Login' => 'mp', 'Password' => 'Ghyu78gHkkjkT', 'NumOrder' => '0408029794');
$response = $soapclient->GetCeiling($params);
print_r($response);
?>