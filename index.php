<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.mercury.chat/sdk/whatsapp/sendMessage?api_token=5ebec8e1ae0788001262b64cTjGsnxnFC&instance=L1589561569500Q",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n  \"chatId\": \"5213331437945@c.us\",\n  \"body\": \"Test api whatsapp\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Content-Type: text/plain"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
