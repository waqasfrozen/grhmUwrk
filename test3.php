<?php

$handle = curl_init();
$serverr = "http://34.238.235.155/";
$url = "http://34.238.235.155:8000/test3";
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, true);
$x = json_encode(array("key"=>$_POST['key']));
curl_setopt($handle, CURLOPT_POSTFIELDS, $x);

$output = curl_exec($handle);
curl_close($handle);
//echo $output;
echo str_replace('"',"",$output);

