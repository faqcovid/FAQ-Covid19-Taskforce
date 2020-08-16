<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tuto PHP API</title>
</head>
<body>
<?php

function cleanString($string) {
	$string = strtolower($string);
	$string = preg_replace("/[^a-z0-9_'\s-]/", "", $string);
	$string = preg_replace("/[\s-]+/", " ", $string);
	//$string = preg_replace("/[\s_]/", " ", $string);
	return $string;
}

if(isset($_POST['mot']) && !empty($_POST['mot'])) {
	$motRecherche = urlencode(cleanString($_POST['mot']));
	echo $motRecherche;
	$dir = 'cache';
	$match = '';

	foreach(glob($dir.'/*.json') as $fichier) {
		if(basename($fichier, '.json') == $motRecherche) {
			$match = $fichier;
		}
	}

	if($match != '' && (time()-filemtime($match) < 60)) {
		$raw = file_get_contents($match);
		$json = json_decode($raw);
	}else {
		$url = "http://search.twitter.com/search.json?q=" . $motRecherche . "&rpp=10&include_entities=true&result_type=recent&lang=fr&locale=fr";
		$raw = file_get_contents($url);
		file_put_contents($dir . '/' . $motRecherche . '.json', $raw);		
		echo $motRecherche;
		$json = json_decode($raw);
	}
	
	if(!empty($json->results)) {	
		foreach($json->results as $msg) {
			echo "<u>" . $msg->from_user_name ."</u> : ". $msg->text;
			echo "<br />";
		}
	}else {
		echo "Rien n'a &eacute;t&eacute; trou&eacute;.";
	}	
}else {
	echo "Aucune recherche effectu&eacute;e.";
}

?>
</body>

</html>