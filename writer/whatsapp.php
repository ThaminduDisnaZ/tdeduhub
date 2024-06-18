<?php
 
$url = "http://whatsapp247.com/api/send.php";
 
$parameters = array("api_key" => "94764501212-413ddca7-5bb2-42db-a483-087d398529fb",
                    "mobile" => $mobile ,
                    "message" => $message,
                    "priority" => "10",
                    "type" => 1,
                    "url" => "https://telegra.ph/file/d6184bd35bb0c411510e1.png",
                    "caption" =>  $message . "TD_EDU_HUB™ | www.edu.thamindudisna.info" 
                    );
 
$ch = curl_init();
$timeout  =  30;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
$response = curl_exec($ch);
curl_close($ch);
 

 
?>