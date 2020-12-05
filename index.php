<?php
date_default_timezone_set('Europe/Istanbul');
ini_set('max_execution_time', '0');
set_time_limit(0);
$saat = date('H:i');
include("simple_html_dom.php");

// Dolar Start

$html = file_get_html('https://kur.doviz.com/serbest-piyasa/amerikan-dolari');

$ret = $html->find('span');
$dolar = substr($ret[31], -13,-9);
echo $dolar;

// Dolar End

// Altin Start

$html = file_get_html('https://altin.doviz.com/gram-altin');

$ret = $html->find('span');
$altin = substr($ret[31], -13,-7);
echo $altin;

// Altin End

// Euro Start

$html = file_get_html('https://kur.doviz.com/serbest-piyasa/euro');

$ret = $html->find('span');
$euro = substr($ret[31], -13,-9);
echo $euro;

// Euro End

require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerKey = "your-key";
$consumerSecret = "your-key";
$accessToken = "your-key";
$accessTokenSecret = "your-key";

$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$content = $connection->get("account/verify_credentials");

if(date('w') == 6 || date('w') == 0) {

    echo " - hafta sonu";

} else {
    $statues = $connection->post("statuses/update", ["status" => "Dolar: " .$dolar. "
Gram Altın: " .$altin. "
Euro: ".$euro. "

Saat: " . $saat]);
     print_r($statues);
}

?>