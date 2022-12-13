<?php

Include('QTSMS.class.php');
$sms= new QTSMS('1674541','Connect123!','a2p-sms-https.beeline.ru');
 
 
$code = rand(100000, 999999);
 
$sms_text = 'Код авторизации Wifi: '.$code;
$target = $_GET['phone'];

$sender='clinicaboli';
$period=600;



if (isset($_GET['send']))
{
   $result = $sms->post_message($sms_text, $target, $sender, null, $period);
   echo $code;  
}


?>