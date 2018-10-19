<?php
/**
*
* Proses API GET DATA
* Last Update : 17 Oktober 2018
* @version v2.1
* @author Muhammad Rifky Abimayu
*
**/

$str 			= file_get_contents('package.json');
$json 			= json_decode($str, true);
$captcha		= $_POST['g-recaptcha-response'];
$secretKey		= $json['data']['recaptcha_secretkey'];
$ip 			= $_SERVER['REMOTE_ADDR'];
$response		= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys	= json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
      header("Location: ../../index.php?status=1&message= Mohon Centang Form Recaptcha !");
   } else {
$api_url    	= "https://panel.hostddns.us/api/v2/client/"; // Stable API Url v2 
$api_key    	= $json['data']['api_key']; 
$service    	= $_POST['service']; 
$domain     	= $_POST['domain']; 
$subdomain  	= $_POST['subdomain']; 
$content    	= $_POST['content']; 
$ch         	= curl_init();
curl_setopt($ch, CURLOPT_URL, "$api_url?key=$api_key&service=$service&domain=$domain&subdomain=$subdomain&content=$content");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
$result     	= curl_exec($ch);
$newarray 		= json_decode(trim($result), TRUE);
$status 		= $newarray["success"];
$message 		= $newarray["error"]["message"];
$data_type 		= $newarray['data']['type'];
$data_subdo 	= $newarray['data']['subdomain'];
$data_content 	= $newarray['data']['content'];
$data_pin 		= $newarray['data']['pin'];
if($status == 'false'){
	header("Location: ../../index.php?status=1&message=   $message ");
} else {
	header("Location: ../../index.php?status=2&message=  Subdomain  Berhasil Ditambahkan, Berikut Infonya : <br> <br> Type : $data_type Records <br> Subdomain : $data_subdo <br> Content : $data_content <br> TTL : Automatic <br> PIN : <b>$data_pin </b>  <br> ");
	}
}

?>