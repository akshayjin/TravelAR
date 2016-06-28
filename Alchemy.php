<?php
echo "<h2>Getting news of Kolkata</h2>";

$city  = 'Kolkata';

$prepAddr = 'https://access.alchemyapi.com/calls/data/GetNews?apikey=47c597d652779182e33de47961e091ae14121134&return=enriched.url.title&start=1457654400&end=1458342000&q.enriched.url.enrichedTitle.entities.entity=|text='.$city.',type=city|&q.enriched.url.enrichedTitle.docSentiment.type=positive&q.enriched.url.enrichedTitle.taxonomy.taxonomy_.label=travel&count=25&outputMode=json';

//echo $prepAddr.'<br>';

$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$prepAddr);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'TravelAR');
$query = curl_exec($curl_handle);
curl_close($curl_handle);
$output = json_decode($query,true);

//var_dump($output);

for($i=0;$i<count($output['result']['docs']);$i++)
{
    echo $output['result']['docs'][$i]['source']['enriched']['url']['title'].'^';
}
    
?>