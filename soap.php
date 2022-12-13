<?php
ini_set("soap.wsdl_cache_enabled", "0");
$params = array('Login' => 'mp1', 'Password' => 'Ghyu78gHkkjkT', 'NumOrder' => '0408030153');
$soapclient = new SoapClient('http://service.ldsupr.ru/Service.svc?singleWsdl');
$response = $soapclient ->__soapCall('GetCeiling', array('parameters' => $params));
print_r($response);
?>