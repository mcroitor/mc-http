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

$getpgn = new \Mc\Http($url1, $opts);
echo $getpgn->Get($data);

// post
$url2 = "https://endgame.md/endgame/data.php";
$data = [
    "author" => "Croitor",
    "wpiece" => 0,
    "bpiece" => 0,
    "stipulation" => "-",
    "piece_pattern" => ""
];

$finddata = new \Mc\Http($url2, $opts);
$finddata->SetEncoder("json_encode");
echo $finddata->Post($data, [
    CURLOPT_HTTPHEADER => ['Content-type: application/json; charset=utf-8']
]);
