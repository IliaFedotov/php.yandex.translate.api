<?php 
$word = 'Text to translate'; // You text to translate
$key = 'You API Key'; // You API Key Yandex
$data = array(
    'key' => $key,
    'text' => $word,
    'lang' => 'de', // German translation
    'format' => 'plain',
    'options' => 1,
);
$curlObject = curl_init();
curl_setopt($curlObject, CURLOPT_URL, 'https://translate.yandex.net/api/v1.5/tr.json/translate');
curl_setopt($curlObject, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curlObject, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curlObject, CURLOPT_POST, true);
curl_setopt($curlObject, CURLOPT_POSTFIELDS, http_build_query($data,'','&'));
curl_setopt($curlObject, CURLOPT_RETURNTRANSFER, true);
$responseData = curl_exec($curlObject);
curl_close($curlObject);
if ($responseData === false) {
    throw new Exception('Response false');
}
$data = json_decode($responseData, true);
$data_de = $data['text'][0];
?>