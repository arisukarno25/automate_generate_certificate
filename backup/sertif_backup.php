<?php
include('get_customer.php');

$id_user = $_GET["id_user"];
// include ('qrcode.php');
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

// for ($i = 0; $i < sizeof($dataLength); $i++) {
//     $id_peserta = $result_data["data"][$i]['customer_id']['id'];
//     echo $id_peserta;
// }

// $name = $result['data'][0]['customer_id']['name'];
// $session_date = $result['data'][0]['session_id']['start_time'];
// echo $session_date;
// echo $response;
// $session_data_replace = str_replace('T', ' ', $session_date);
// $session_desc = $result['data'][0]['session_id']['session_desc'];
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="email/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Certificate</title>
    <head>
    <style>
        .card text-center{
            height: 500px;
            width: 500pc;
        }
        .barcode .card-text{
            font-style: reguler;
            margin-left: 50px;
            padding-bottom: 20px
        }
        .card-title,
         .card-text{
            color: black;
        }
        .card-text{
            font-style: reguler;
            margin-left: 50px;
        }
        .webinar{
            color: black;
            font-weight: bold;
        }
        .workshop{
            color: black;
            font-weight: bold;
        }
        .card .card-dalem{
            margin-top:180px!important;
            margin-bottom: 180px!important;
            margin-left:60px!important;
            margin-right:60px!important;
            text-align:center;
            border-radius: 20px 20px 20px 20px;
        }
        .barcode{
            text-align: right; 
            padding-right: 50px; 
        }
        .data-session {
            display: flex;
        }
    </style>
    </head>
    <body style="background-color: black";>
    <div class="card bg-dark text-white" >
        <img src="assets/background.png" class="card-img" alt="...">
        <div class="card-img-overlay">
            <div class="card card-dalem">
                <div class="card-body">
                    <h1 class="card-title">CERTIFICATE OF PARTICIPATION</h1>
                    <H4 class="card-title">INTERNATIONAL WEBINAR WORKSHOP ON JAVANESE CULTURE 2022</h4>
                    <br>
                    <div id="name">
                    <h4 class="card-text" style="text-align:left;">
                    <?php 
                    echo get_customer($id_user);
                    ?></h4>
                    </div>
                    <hr style="height: 5px; width: 70%; color: black; opacity: 100%; margin: 10px 0 10px 50px ">
                    <p class="card-text" style="text-align:left;">has attended</p>
                    <table>
                        <tr>
                            <td>
                                <div>
                                    <p class="webinar" style="text-align:left; margin-left:50px;">Webinar</p>
                                    <?php
                                    $curl = curl_init();
                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'http://192.168.0.119:8056/items/registration?fields=customer_id.id,customer_id.name,session_id.start_time,session_id.session_desc,validated_on&filter[customer_id.id]='.$id_user.'&filter[validated_on][_between];=[%222021-01-1%22,%20%222021-12-12%22]',
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
                                      $result_data_sesi = json_decode($response, true);
                                      $dataLength1 = $result_data_sesi["data"];
                                      for ($x = 0; $x < sizeof($dataLength1); $x++) {
                                        echo "<p class='card-text' style='text-align:left; font-weight: 450; line-height: 50%'>";
                                        echo $result_data_sesi['data'][$x]['session_id']['start_time'];
                                        echo "<a style='margin-left: 10px; font-weight: 450'>" .$result_data_sesi['data'][$x]['session_id']['session_desc']. "</a></p>";                                                                                   
                                      }
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="barcode">
                    <img src="<?php echo "qrcode.php?id_user=".$id_user;?>">
                    <p class="card-text">KERATON NGAYOGYAKARTA HADININGRAT</p>
                    </div> 
                </div>
            </div>
        </div> 