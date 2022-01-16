<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>One Line News</title>


	<meta name="description" content="Get news in one line from sources you love, all at one place.">

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
            	<li><a href="#edit-srcs">Sources</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#coming-soon">Coming Soon...</a></li>
            </ul>
        </nav>
        <br>
<!--         <p><a href="#"><i>Italic Link Button</i></a><a href="#"><b>Bold Link Button &rarr;</b></a></p>
 -->    </header>

<article id="news">


</article>

<hr>

<h2 id="edit-srcs">Sources</h2>
<p>Paste RSS link. Generally xyz.com/feed/ or xyz.com/rss/</p>
<textarea width="100%" height="100px" onclick="saveSources(this)" id="sources"></textarea>

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
		<del><li>customize sources (add/remove/sort)</li></del>
		<li>An app for iOS & Android (before ClubHouse's)</li>
		<li>Byju's acquisition offer or billion dollar IPO XD</li>
	</ul>	
</p>

</article>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JY0Y8HJ43T">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JY0Y8HJ43T');
</script>	

<script type="text/javascript">

var resp = "";
	
function fetchUrls(site) {
  // var xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //     document.getElementById("news").innerHTML += this.responseText;
  //     // this.responseText="";

  //   }
  // };
  // xhttp.open("POST", "https://onelinenew5.herokuapp.com/fetch.php", true);
  // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // xhttp.send("site="+site);
  var resp = "";

	let formData = new FormData();	

	formData.append("site",site);


fetch('http://onelinenew5.com/fetch.php',{method:"post",body:formData})
  .then(response => response.text())
  .then(data => console.log(data) );


  // return resp;


}

var sites = "https://www.kuwi.news/feed/  \n https://finshots.in/rss/ \n https://cms.qz.com/feed/ ";



function saveSources(elm){

	var src = elm.value;

	console.log(src);

	localStorage.setItem("srcs", src);


}

console.log("start is "+localStorage.getItem("srcs"));

if(localStorage.getItem("srcs")===null ){
	localStorage.setItem("srcs", sites);
	// console.log(localStorage.getItem("srcs"));

}



sites = localStorage.getItem("srcs");

document.getElementById("sources").innerText = sites;


sites_array = sites.split("http");


for (var i = 0;i < sites_array.length; i++) {
	if(sites_array[i].trim()===""){
		continue;
	}
	console.log(sites_array[i]);
	// resp +=	fetchUrls("http"+sites_array[i].trim());

	var tmp = "http"+sites_array[i].trim();

	let formData = new FormData();	

	formData.append("site",tmp);

	fetch('http://onelinenew5.com/fetch.php',{method:"post",body:formData})
	.then(response => response.text())
	.then(data => document.getElementById("news").innerHTML += data );

}



</script>

</body>
</html>
