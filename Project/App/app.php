<?php
function callAPI($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method) {
        case "POST":
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case "GET":
        case "DELETE":
            if ($data) $url = sprintf("%s?%s", $url, http_build_query($data));
            break;
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, true);
}
?>
