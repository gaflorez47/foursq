<?php
require_once("./lib/FoursquareAPI.class.php");

$client_id = "MSBRNCBKQ0UOGZMWSSCOKZ3THCF0EIWDEK2HWRJWI5QYMIQK";
$client_secret = "UKQ0LRLZPHBHWLNCDFUJ15UONKAXWZCO1KIXL4SFZIFJHDBQ";
$venue_id = '4f6b8e31e4b003b5e2d0b42c';
$foursquare = new FoursquareAPI($client_id,$client_secret);

function get_photos($foursquare, $venue_id){
  $response = $foursquare->GetPublic("venues/$venue_id/photos");
  $photos = json_decode($response)->response->photos;
  $photo_groups = $photos->groups;
  foreach ($photo_groups as $photo_group) {
  	$items = $photo_group->items;
  	foreach ($items as $item) {
  		$url = $item->url;
  		echo "<img src='$url' width='100' height='100'/>";
      
  	}
  }
}

function get_tips($foursquare, $venue_id){
  $response = $foursquare->GetPublic("venues/$venue_id/tips");
  $tips = json_decode($response)->response->tips->items;
  foreach ($tips as $tip) {
    var_dump($tip->text);
  }
}

get_photos($foursquare, $venue_id);
get_tips($foursquare, $venue_id);

