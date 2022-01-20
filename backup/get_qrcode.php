<?php
   require __DIR__ . '/vendor/autoload.php';
    
   use Endroid\QrCode\Builder\Builder;
   use Endroid\QrCode\Encoding\Encoding;
   use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
   use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
   use Endroid\QrCode\Label\Font\NotoSans;
   use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
   use Endroid\QrCode\Writer\PngWriter;

function get_qrcode ($id) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://192.168.0.119:8056/items/registration?fields=customer_id.id,customer_id.name,session_id.start_time,session_id.session_desc,validated_on&filter[customer_id.id]='.$id.'&filter[validated_on][_between];=[%222021-01-1%22,%20%222021-12-12%22]',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));

      $result = Builder::create()
      ->writer(new PngWriter())
      ->writerOptions([])
      ->data('https://symposium.kratonjogja.id/'.$id)
      ->encoding(new Encoding('UTF-8'))
      ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
      ->size(111)
      ->margin(5)
      ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
      ->build();
      header('Content-Type: '.$result->getMimeType());
      return $result->getString();
      // save qr_code
      // $result->saveToFile(__DIR__.'/qr_results/qr_code_'.$id_user.'.png');
      $dataUri = $result->getDataUri();         

      
      
    }
    // var_dump(["data"][0]);


