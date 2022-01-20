<?php

function validate_data ($id) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://192.168.18.85:8003/items/registration?fields=customer_id.id,customer_id.name,session_id.start_time,session_id.session_desc,validated_on&filter[customer_id.id]='.$id.'&filter[validated_on][_between];=[%222021-01-1%22,%20%222021-12-12%22]',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));

    $response = curl_exec($curl);
    $result_data1= json_decode($response, true);
    $dataLength = $result_data1["data"];
    curl_close($curl);
    if (empty($result_data1["data"])){
      return "1";
    } else {
      return "2";
    } 
}