<?php

Include('QTSMS.class.php');
$sms= new QTSMS('1674541','Connect123!','a2p-sms-https.beeline.ru');
 
 
 
 
$sms_text = 'Благодарим Вас за высокую оценку услуг нашей Клиники. Вы можете помочь другим людям в решении проблем со здоровьем, оставив свой отзыв на: www.clinicaboli.ru/o Спасибо!';
$target = $_GET['phone'];

$sender='clinicaboli';
$period=600;



if (isset($_GET['send']))
{
   //$result = $sms->post_message($sms_text, $target, $sender, null, $period);
   //echo $result;  
}

if (isset($_GET['status']))
{
  //$result = $sms->status_sms_id($_GET['id']);
  //echo $result;
}


?>