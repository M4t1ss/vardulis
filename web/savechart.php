<?php

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


$aaa1 = "https://shot.screenshotapi.net/screenshot?token=J9VEY2Q-MTH4R5C-QNEF3FF-9R5QW49&url=https%3A%2F%2Fwordle.lielakeda.lv%2Fchart.php&width=1100&height=600&fresh=true&output=image&file_type=png&wait_for_event=load";
	
echo "<img style='max-height:600px;max-width:46%;overflow: hidden;float:left;' src='".$aaa1."' >";
file_put_contents("/home/baumuin/public_html/wordle/bildeVardulim.jpg", file_get_contents($aaa1));
// //Pirmā bilde
// if(substr($random_pic, 0, 4) == "http"){
// }else{    
    // if(substr($random_pic, 0, 4) !== "http"){
        // $bildesID = $random_pic;
    // }
	
	// //Šo vajadzētu pārnest visur, kur saliku lēno ajax ielādētāju...
	
	// $url = "https://photoslibrary.googleapis.com/v1/mediaItems/".$random_pic."?access_token=".$accessToken;

	// $cURL = curl_init();

	// curl_setopt($cURL, CURLOPT_URL, $url);
	// curl_setopt($cURL, CURLOPT_HTTPGET, true);
	// curl_setopt($cURL, CURLOPT_TIMEOUT, 5);
	// curl_setopt($cURL, CURLOPT_CONNECTTIMEOUT, 5);
	// curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

	// curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
		// 'Content-Type: application/json',
		// 'Accept: application/json'
	// ));

	// $result = curl_exec($cURL);
	// $json = json_decode($result, true);
	
	// $imgURL = $json['baseUrl']."=w2000";
	
    // echo "<img style='max-height:600px;max-width:46%;overflow: hidden;float:left;' src='".$imgURL."' >";
	// file_put_contents("/home/baumuin/public_html/foodbot/tmhOAuth/examples/bildeTvitam.jpg", file_get_contents($imgURL));
// }
