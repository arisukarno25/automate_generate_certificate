<?php

require 'vendor/autoload.php';
include('get_customer.php');
$id_user = $_GET["id_user"];
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>CERTIFICATE</title>
    <head></head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="font_resize.js"></script>
    <body>
    <div class="card bg-dark text-white">
        <img src="assets/background_updated.png" class="card-img" alt="...">
        <div class="card-img-overlay">
            <div class="card-body">
                <div id="nama" style="height:45px">
                    <h4 class="card-text" style="text-align:left; margin-top: 213px; margin-left: 116px; font-weight: bold; color: black; position: absolute; font-style: Montserrat;">                
                    <?php echo get_customer($id_user);?>
                    </h4>
                </div>   
                <div id="webinar"> 
                <p class="webinar" style="text-align:left; margin-left: 116px; margin-top: 250px; color: black; font-weight: bold; position: absolute; font-style: Montserrat; ">Webinar</p> 
                <table style="margin-top: 285px; position: absolute;">    
                    <tr>
                        <td>
                            <?php
                            include 'get_session.php';
                            for ($x = 0; $x < sizeof($dataLength1); $x++) {
                                echo "<p class='sesi' style='font-style: Montserrat; text-align:left; font-weight: 450; line-height: 50%; margin-left: 116px; color: black; '>";
                                $m = new \Moment\Moment($result_data_sesi['data'][$x]['session_id']['start_time']);
                                echo $m->format('Y-m-d');
                                echo "<a style='font-style: Montserrat; margin-left: 10px; font-weight: 450'>" .$result_data_sesi['data'][$x]['session_id']['session_desc']. "</a></p>";
                                }  
                            ?>
                        </td>
                    </tr>
                </table>                
                </div>
            </div>
        </div>  
        <div class="barcode" style="position: absolute; bottom: 135px; right: 113px; z-index: 2; align-content: right; padding-left: 1045px; margin-top: 120px;">
            <img src="<?php echo "qrcode.php?id_user=".$id_user;?>">
        </div>    
    </div>