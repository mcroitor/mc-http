<?php

include __DIR__ . "/../mc/http.php";

$opts = [
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => true
];

// get
$url1 = "https://endgame.md/endgame/getpgn.php";
$data = ["pid" => 100];

$getpgn = new \mc\http($url1, $opts);
echo $getpgn->get($data);

// post
$url2 = "https://endgame.md/endgame/data.php";
$data = [
    "author" => "Croitor",
    "wpiece" => 0,
    "bpiece" => 0,
    "stipulation" => "-",
    "piece_pattern" => ""
];

$finddata = new \mc\http($url2, $opts);
$finddata->set_encoder("json_encode");
echo $finddata->post($data, [
    CURLOPT_HTTPHEADER => ['Content-type: application/json; charset=utf-8']
]);
