<?php

$curl = curl_init();

function get_date ($id) {
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://192.168.18.85:8003/items/registration?fields=customer_id.id,customer_id.name,session_id.start_time,session_id.session_desc,validated_on&filter%5Bcustomer_id.id%5D='.$id.'&filter%5Bvalidated_on%5D%5B_between%5D;=%5B%25222021-01-1%2522,%2520%25222021-12-12%2522%5D',
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
      $result_data = json_decode($response, true);
      $date_session = [];
      $dataLength = $result_data["data"];
      for ($x = 0; $x < sizeof($dataLength); $x++) {
        array_push($info_sesi,  $result_data["data"][$x]['session_id']['start_time'],  $result_data["data"][0]['session_id']['session_desc']);
      }
      return $info_sesi;
}