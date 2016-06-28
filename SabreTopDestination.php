<?php
ini_set('display_errors', 1);

$url='https://api.test.sabre.com/v1/shop/flights?mode=live';

$origin = 'DEL';
$theme = 'SHOPPING';

$url = 'https://api.test.sabre.com/v1/lists/top/destinations?origin='.$origin.'&destinationtype=DOMESTIC&theme='.$theme.'&topdestinations=10&destinationcountry=IN&region=ASIA+PACIFIC&lookbackweeks=8';

$reffer="https://api.test.sabre.com";
$agent ="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3";

$header[]='Authorization: Bearer T1RLAQKy1HAi9pPyjw/AqZO4gmVptDKNxxBA0J5/QNrkDuIGdEw2ZSiyAACgQ+RK4kD9swCPK2BYF2zQzZ+B966BQcmgMdqQZrQBCnFFVyniMLdk9YvygIimeeRIsGLhzpa7gTIoLDhaTSx/MFNYNGVr5uYYsMz6JJkDzfEiinPyxyfWziHSVSbg7m4jpZwEwpp6vGUHsypFVENx5eKMhAZ3OzRk5rCEaTBkCon1UoIc4Dt4FlfkfoLBb2+8/YUY/uciP9G/AgqtmGMsGA**
X-Originating-Ip: 175.142.133.117';

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING,'gzip');
curl_setopt($ch, CURLOPT_REFERER, $reffer);
curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$content = curl_exec($ch);

$json = json_decode($content,true);

ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);
var_dump($content);
var_dump($json);
foreach($json['Destinations'] as $item)
{
    echo $item['Destination']['CityName']." ".$item['Destination']['DestinationLocation']."<br>";
}


?>