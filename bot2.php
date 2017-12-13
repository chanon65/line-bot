<meta http-equiv="refresh" content="10" > 
<?php 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrPostData = array();
$arrPostData['to'] = "U961224e379af4062d4ce99f7e9c46dfe";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Alarm";
 
?>