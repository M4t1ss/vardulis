<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<title>Tvīti par Vārduli</title>
<meta name="viewport" content="width=320, initial-scale=1.0" />
<meta charset=UTF-8>
<script type="text/javascript" src="https://twitediens.lielakeda.lv/includes/sorttable.min.js"></script>
<script type="text/javascript" src="https://twitediens.lielakeda.lv/includes/paging.js"></script>
<link href="/includes/apple-touch-icon.png" rel="apple-touch-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="https://twitediens.lielakeda.lv/includes/jq/css/custom-theme/jquery-ui-1.8.16.custom.min.css" />	
<link rel="stylesheet" type="text/css" href="https://twitediens.lielakeda.lv/includes/style.css" />
<link rel="stylesheet" type="text/css" href="https://twitediens.lielakeda.lv/includes/print.css" media="print"/>
</head>
<body>
<?php
header("Content-Type: text/html; charset=utf-8");
$connection = mysqli_connect("localhost", "username", "password", "database");
mysqli_set_charset($connection, "utf8mb4");

//dabū 50 jaunākos tvītus
$latest = mysqli_query($connection, "SELECT * FROM tweets ORDER BY created_at DESC limit 0, 50");

$twi="https://twitter.com/";

while($p=mysqli_fetch_array($latest)){
	$id = $p["id"];
	$username = $p["screen_name"];
	$text = $p["text"];
	$ttime = $p["created_at"];
	$quoted_id = $p["quoted_id"];
	$quoted_text = NULL;
	$laiks = strtotime($ttime);
	$laiks = date("d.m.Y H:i", $laiks);
	
	
	if($quoted_id != NULL){
		$quoted = mysqli_query($connection, "SELECT text, screen_name FROM tweets WHERE id = $quoted_id");
		$qq=mysqli_fetch_array($quoted);
		if($qq){
			$quoted_text = $qq["text"];
			$quoted_screen_name = $qq["screen_name"];
		}
	}
			$color = "black";
	
	#Iekrāso un izveido saiti uz katru pieminēto lietotāju tekstā
	#Šo vajadzētu visur...
	$matches = array();
	if (preg_match_all('/@[^[:space:]]+/', $text, $matches)) {
		foreach ($matches[0] as $match){
			// $text = str_replace(trim($match), '<a style="text-decoration:none;color:#658304;" href="'.$twi.substr(trim($match), 1).'">'.trim($match).'</a> ', $text);
			$text = str_replace(trim($match), '<a style="text-decoration:none;color:#658304;" >'.trim($match).'</a> ', $text);
		}
	}
	
	if (preg_match_all('/http[^[:space:]]+/', $text, $matches)) {
		foreach ($matches[0] as $match){
			$text = str_replace(trim($match), '<a style="text-decoration:none;color:#658304;" target="_blank" href="'.trim($match).'">'.trim($match).'</a> ', $text);
		}
	}
	
?>
<div style="<?php if ((time()-StrToTime($ttime))<5){echo"opacity:".((time()-StrToTime($ttime))/5).";";}?>" class="tweet">
	<div class="lietotajs" style="border-bottom: 0.18em dashed <?php echo $color; ?>;"><?php echo '<a style="text-decoration:none;color:#658304;" href="'.$twi.trim($username).'">@'.trim($username).'</a> ';?> ( <?php echo '<a href="'.$twi.'/'.trim($username).'/status/'.$id.'">'.$laiks.'</a>';?> )</div>
<?php echo nl2br($text)."<br/>";

if(isset($quoted_text) && strlen($quoted_text) > 0){
	echo "<div style='border:1px dotted #000; border-radius:5px; padding:2px;'><small>";
	echo '<a style="text-decoration:none;color:#658304;" href="'.$twi.str_replace('@','',trim($quoted_screen_name)).'">@'.trim($quoted_screen_name).'</a>: ';
	echo nl2br($quoted_text)."</small></div><br/>";
}
?><br/>
</div>
<?php
}
?>
</body>
</html>