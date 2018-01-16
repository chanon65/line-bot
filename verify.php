<?php
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strPostUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrPostHeader = array();
$arrPostHeader[] = "Content-Type: application/json";
$arrPostHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}

$arrPostData = array();
$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
 
$chPost = curl_init();
curl_setopt($chPost, CURLOPT_URL,$strPostUrl);
curl_setopt($chPost, CURLOPT_HEADER, false);
curl_setopt($chPost, CURLOPT_POST, true);
curl_setopt($chPost, CURLOPT_HTTPHEADER, $arrPostHeader);
curl_setopt($chPost, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($chPost, CURLOPT_RETURNTRANSFER,true);
curl_setopt($chPost, CURLOPT_SSL_VERIFYPEER, false);
$resultPost = curl_exec($chPost);
curl_close ($chPost);
 
?>