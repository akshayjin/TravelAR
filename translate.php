<?php 

$reffer="https://translate.yandex.net/api/v1.5/";
$agent ="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3";

$word = $_GET["word"];
$lang = $_GET["lang"];

$word = str_replace("_", "%20", $word);

$url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20160220T192857Z.f3a868610cc865f4.b2284fd7ea2fb68f3f20559fcb6330479fe7023e&text='.$word.'&lang='.$lang.'&format=plain';
 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_USERAGENT, "NULL");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING,'gzip');
curl_setopt($ch, CURLOPT_REFERER, $reffer);
//curl_setopt($ch, CURLOPT_HTTPHEADER,"text/json");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$content = curl_exec($ch);

$json = json_decode($content,true);

echo strip_tags($json["text"][0]);
exit();
?>
