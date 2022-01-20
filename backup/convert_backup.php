<?php

require __DIR__ . '/vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;
use mikehaertl\wkhtmlto\Image;
use mikehaertl\tmp\File;
require_once 'sertif.php';
include 'get_session.php';

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://192.168.0.119:8056/items/customer',
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
    // $id_peserta = $result_data["data"][$i]['customer_id']['id'];
    $hasil_cek = get_session($i);
    if ($hasil_cek == "1"){
      continue;
    } else {
      $image = new Image('http://localhost/generate-sertif/sertif.php?id_user='.$i);
      $image->saveAs('convert_certificate/certificate'.$i .'.png');
    }
    // $image->send();

    // if (!$image->saveAs('convert_certificate/certificate'.$id_peserta .'.png')) {
    //     $error = $image->getError();
    // }

    // ... or send to client for inline display
    // if (!$image->send()) {
    //     $error = $image->getError();
    // }

    // ... or send to client as file download
    // if (!$image->send('convert_certificate/certificate'.$id_peserta .'.png')) {
    //     $error = $image->getError();
    // }
}

// $pdf = new Pdf('http://localhost/generate-sertif/sertif.php');

// $pdf->saveAs('convert_certificate/certificate'.$id_peserta .'.pdf');

// if (!$pdf->saveAs('convert_certificate/'.$id_peserta .'.pdf')) {
//     $error = $pdf->getError();
// }

// You can pass a filename, a HTML string, an URL or an options array to the constructor
// $image = new Image('http://localhost/generate-sertif/sertif.php');
// $image->saveAs('convert_certificate/certificate1'.$id_peserta .'.png');
// $image->send();

// if (!$image->saveAs('convert_certificate/certificate1'.$id_peserta .'.png')) {
//     $error = $image->getError();
// }

// // ... or send to client for inline display
// if (!$image->send()) {
//     $error = $image->getError();
// }

// // ... or send to client as file download
// if (!$image->send('convert_certificate/certificate1'.$id_peserta .'.png')) {
//     $error = $image->getError();
// }