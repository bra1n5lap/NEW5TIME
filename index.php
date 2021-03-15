<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>One Line News</title>


	<meta name="description" content="Get one line news from sources you love, all at one place using one line news.">

	<!-- <link rel='stylesheet' href='https://classless.de/classless.css'> -->
	<!-- <link rel="stylesheet" href="https://unpkg.com/mvp.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yegor256/tacit@gh-pages/tacit-css-1.5.5.min.css"/>



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


    <header>
    	<nav>
    		<ul>
    			<li><h1>One Line News</h1><p>...from sources you love, at one place!!!</p></li>
    		</ul>
       	</nav>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#coming-soon">Coming Soon...</a></li>
            </ul>
        </nav>
        <br>
<!--         <p><a href="#"><i>Italic Link Button</i></a><a href="#"><b>Bold Link Button &rarr;</b></a></p>
 -->    </header>

<article>

<?php

$sites = array( "https://the-ken.com/feed/",
				"https://finshots.in/rss/",
				"https://cms.qz.com/feed/",
				"https://us7.campaign-archive.com/feed?u=17538c76a9a05dfd6438f64c7&id=bbaa8cffe0",
				"https://ajuniorvc.com/feed/",	
				"https://www.kuwi.news/feed/",	
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
	 	$text = "<h2><a href=\"".$val."\">".$name."</a></h2><br>";
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

</article>

<hr>

<article id="about">
<h2 >About OneLineNews</h2>
<p>
	One line news is an attempt to simplify the way we consume news.<br>
	We believe human knows what they want or at least with right tool/platform they can decide what they want.
	<br>
	So, instead of algorithms deciding "news for you",<br>
	read news from sources/people you know/love.<br>
	A weekend project by <a href="https://twitter.com/5HU3HENDU">Shubhendu Singh</a>.

</p>	
</article>

<article id="coming-soon">
<h2>Updates Coming Soon</h2>
<p>
	<ul>
		<li>customize sources (add/remove/sort)</li>
		<li>An app for iOS & Android (before ClubHouse's)</li>
		<li>Byju's acquisition offer or billion dollar IPO XD</li>
	</ul>	
</p>

</article>

<script type="text/javascript">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JY0Y8HJ43T"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JY0Y8HJ43T');
</script>	
</script>

</body>
</html>