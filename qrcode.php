<?php

require __DIR__ . '/vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

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

  $id_user = $_GET["id_user"];

for ($i = 1; $i < sizeof($dataLength2); $i++) {    
    $user_code = $result_data_cust["data"][$i]["code"];
    $result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data('https://symposium.kratonjogja.id/'.$id_user.$user_code)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size(120)
    ->margin(10)
    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
    ->build();
    header('Content-Type: '.$result->getMimeType());
    echo $result->getString();
}