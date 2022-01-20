<?php

require __DIR__ . '/vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'http://192.168.18.65:8056/items/registration?fields=customer_id.id,customer_id.name,session_id.start_time,session_id.session_desc,validated_on&filter[validated_on][_between];=[%222021-01-1%22,%20%222021-12-12%22]',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'GET',
// ));

// $response = curl_exec($curl);
// $result_data = json_decode($response, true);
// $dataLength = $result_data["data"];
// curl_close($curl);

// for ($x=0; $x < sizeof($dataLength); $x++) {  
//     $id_user = $result_data['data'][$x]['customer_id']['id'];
    // $id_user = 2;
    $id_user = $_GET["id_user"];
    $result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data('https://symposium.kratonjogja.id/'.$id_user)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size(111)
    ->margin(5)
    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
    ->build();
    header('Content-Type: '.$result->getMimeType());
    echo $result->getString();
    // save qr_code
    // $result->saveToFile(__DIR__.'/qr_results/qr_code_'.$id_user.'.png');
    //$dataUri = $result->getDataUri();    
    // include 'sertif.php';





// connect database 
// include 'connection.php';
// $connection = getConnection();

// $sql = <<<SQL
//     SELECT * FROM customer;
// SQL;

// $result_db = $connection->prepare($sql);
// $result_db->execute();

// while($row = $result_db->fetch(PDO::FETCH_ASSOC)) {
//     $id_user = $row['id'];
//     $user_name = $row['nama'];
//     // Save it to a file
//     $result->saveToFile(__DIR__.'/qr_results/qr_code_' .$id_user .'.png');
//     // Generate a data URI to include image data inline (i.e. inside an <img> tag)
//     $dataUri = $result->getDataUri();
// }