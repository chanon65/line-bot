<?php
$strAccessToken = "2ObLFJCXF9ogLsCfrACIF3l98zCjCNWklcpA7Ic4C+nbM0qHi5fFxEoqQAxP6vUSRVm/4U5ShxjmjyR97THBsWz2fIU8RPTBuyxGk0IAfeW1eMgZ1a0H0rfYWQ5//k+tSIwOYvdKVkp8UkmsKKSDMQdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

$arrPostData = array();
$arrPostData['to'] = "U961224e379af4062d4ce99f7e9c46dfe";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";

if ($arrJson['events'][0]['message']['text'] <> ""){
	$strUrl = "https://api.line.me/v2/bot/message/reply";
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
	} elseif($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
		$arrPostData = array();
		$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
		$arrPostData['messages'][0]['type'] = "text";
		$arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
	} elseif($arrJson['events'][0]['message']['packageId'] > "0"){
		$arrPostData = array();
		$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
		$arrPostData['messages'][0]['type'] = "text";
		$arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
	} else {
		$arrPostData = array();
		$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
		$arrPostData['messages'][0]['type'] = "sticker";
		$arrPostData['messages'][0]['packageId'] = "1";
		$arrPostData['messages'][0]['stickerId'] = "1";
	}
}
 
echo $arrJson['events'][0]['message']['text'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>