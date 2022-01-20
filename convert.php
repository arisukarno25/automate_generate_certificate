<?php

require __DIR__ . '/vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;
use mikehaertl\wkhtmlto\Image;
use mikehaertl\tmp\File;
require_once 'templatesertif.php';
include 'validation.php';

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.18.85:8003/items/customer',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  ));

  $response = curl_exec($curl);
  curl_close($curl);
  $result_data_cust = json_decode($response, true);
  $dataLength2 = $result_data_cust["data"];

for ($i = 1; $i < sizeof($dataLength2); $i++) {
  $hasil_cek = validate_data($i);
  $user_code = $result_data_cust["data"][$i]["code"];
  if ($hasil_cek == "1"){
    continue;
    } else {
      $image = new Image('http://localhost/generate-sertif/templatesertif.php?id_user='.$i);
      $image->saveAs('convert_certificate/'.$i.$user_code.'.png');
    }
}