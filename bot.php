<?php
$strAccessToken = "2ObLFJCXF9ogLsCfrACIF3l98zCjCNWklcpA7Ic4C+nbM0qHi5fFxEoqQAxP6vUSRVm/4U5ShxjmjyR97THBsWz2fIU8RPTBuyxGk0IAfeW1eMgZ1a0H0rfYWQ5//k+tSIwOYvdKVkp8UkmsKKSDMQdB04t89/1O/w1cDnyilFU=";
 

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrlPost = "https://api.line.me/v2/bot/message/reply";
$strUrl = "https://api.line.me/v2/bot/message/push";

 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPushData = array();
$arrPushData['to'] = "U961224e379af4062d4ce99f7e9c46dfe";
$arrPushData['messages'][0]['type'] = "text";
$arrPushData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPushData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);

if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
  
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrlPost);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
}
 
?>