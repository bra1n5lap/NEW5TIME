<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>reader</title>

	<link rel='stylesheet' href='https://classless.de/classless.css'>
	<style>
		a:link {
			color: #FF0000;
		}

		a:visited {
			color: #aaaaaa;
		}

		a:hover {
			color: #FF00FF;
		}

		a:active {
			color: #0000FF;
		}
	</style>

</head>
<body>

<h1>News</h1>
<p></p>

<?php

$sites = array( "https://the-ken.com/feed/",
				"https://finshots.in/rss/",
				"https://cms.qz.com/feed/",
				"https://entrackr.com/feed/",
				"https://www.kuwi.news/feed/",
				"https://www.wired.com/feed/",
				"https://ajuniorvc.com/feed/",
				"https://factordaily.com/feed/",
				"https://us7.campaign-archive.com/feed?u=17538c76a9a05dfd6438f64c7&id=bbaa8cffe0",
				"https://inc42.com/feed/",
				"https://oldrope.substack.com/feed/",
				"https://www.techinasia.com/feed/",
				"https://1947tech.substack.com/feed/",
				"https://turnaround.substack.com/feed/"
				);


function fetch_urls($site){

// $site = "https://the-ken.com/feed/";
$max = 7;


$text = "";



$rss = file_get_contents($site);
$rss = str_replace("<![CDATA[", "", $rss);
$rss = str_replace("]]>", "", $rss);

$pattern = "/(<link>)(.+?)(<\/link>)/im";
preg_match_all($pattern, $rss, $matches);

$title = "/(<title>)(.+?)(<\/title>)/im";
preg_match_all($title, $rss, $titles);

$matches = $matches[0];
$matches = array_slice($matches, 0, $max, true);

$titles = $titles[0];
$titles = array_slice($titles, 0, $max, true);


// print_r($titles);
// print_r($matches);


foreach ($matches as $index => $val) {
 		# code...
	$name = "";
 	
	$val = str_replace("<link>","",$val);
	$val = str_replace("</link>","",$val);

	$name = str_replace("<title>","",$titles[$index]);
	$name = str_replace("</title>","",$name);	

	if ($index==0) {
	 	$text = "<h3><a href=\"".$val."\">".$name."</a></h3><br>";
	 }
	 else {
		$text .= "<a href=\"".$val."\">".$name."</a><br>";
	}
}

// $text .= "<hr>";

return $text;

}


$html = "";

foreach ($sites as $site) {
	$html .= fetch_urls($site);
}

print($html);


?>


</body>
</html>