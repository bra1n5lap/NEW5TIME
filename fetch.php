<?php


header("Access-Control-Allow-Origin: *");


$sitename = $_POST['site'];


$sites = array( "https://the-ken.com/feed/",
				"https://finshots.in/rss/",
				"https://cms.qz.com/feed/",
				"https://us7.campaign-archive.com/feed?u=17538c76a9a05dfd6438f64c7&id=bbaa8cffe0",
				"https://ajuniorvc.com/feed/",	
				"https://www.kuwi.news/feed/",	
				"https://prod-qt-images.s3.amazonaws.com/production/bloombergquint/feed.xml",
				"https://oldrope.substack.com/feed/",
				"https://1947tech.substack.com/feed/",
				"https://turnaround.substack.com/feed/",
				"https://filtercoffee.substack.com/feed/",			
				"https://entrackr.com/feed/",
				"https://www.wired.com/feed/",
				"https://factordaily.com/feed/",
				"https://inc42.com/feed/",
				"https://www.techinasia.com/feed/"
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

$titles = array_unique($titles)
$matches = array_unique($matches)

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
	 	$text = "<h2><a class=\"normal\" target=\"_blank\" href=\"".$val."\">".$name."</a></h2><br>";
	 }
	 else {
		$text .= "<a target=\"_blank\" href=\"".$val."\">".$name."</a><br>";
	}
}

// $text .= "<hr>";

// print($text);

return $text;

}


$html = "";

// foreach ($sites as $site) {
// 	$html .= fetch_urls($site);
// }


$html = fetch_urls($sitename);

print($html);


?>
