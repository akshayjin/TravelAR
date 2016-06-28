<?php
echo "<h2>Getting photos from geolocation</h2>";

//$prepAddr = 'https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=2aa09d3eac8e48b05b7b089b664ff747&sort=date-posted-asc%2C&privacy_filter=1&accuracy=11&safe_search=1&content_type=1&media=photos&lat=22.572646&lon=88.363895&is_commons=&in_gallery=true&format=json&nojsoncallback=1&auth_token=72157663713256894-296fe08b3f007a0d&api_sig=6a2fcab4bd1c3b74dece6090bb52d77e';

$prepAddr = 'https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=7533a97d8f72453ab7652eb41ef52197&sort=date-posted-asc%2C&privacy_filter=1&accuracy=11&safe_search=1&content_type=1&media=photos&lat=12.9667&lon=77.5667&is_commons=&in_gallery=true&format=json&nojsoncallback=1';

$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$prepAddr);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'TravelAR');
$query = curl_exec($curl_handle);
curl_close($curl_handle);
$output = json_decode($query,true);

var_dump($output);

for($i=0;$i<count($output['photos']['photo']);$i++)
{
    echo 'https://farm'.$output['photos']['photo'][$i]['farm'].'.staticflickr.com/'.$output['photos']['photo'][$i]['server'].'/'.$output['photos']['photo'][$i]['id'].'_'.$output['photos']['photo'][$i]['secret'].'.jpg<br>';
}
    
?>