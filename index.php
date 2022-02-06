<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>One Line News by Brainslap</title>
<link rel="stylesheet" href="https://unpkg.com/mvp.css">
<style type="text/css">
        a:visited {
            color: #aaaaaa;
        }

        a:hover {
            color: #0000FF;
        }

        a:active {
            color: #0000FF;
        }


:root {
    --active-brightness: 0.85;
    --border-radius: 5px;
    --box-shadow: 2px 2px 10px;
    --color: #118bee15;
    --color-accent: #118bee15;
    --color-bg: #fff;
    --color-bg-secondary: #e9e9e9;
    --color-link: #ff0000;
    --color-secondary: #920de9;
    --color-secondary-accent: #920de90b;
    --color-shadow: #f4f4f4;
    --color-table: #118bee;
    --color-text: #000;
    --color-text-secondary: #999;
    --font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    --hover-brightness: 1.2;
    --justify-important: center;
    --justify-normal: left;
    --line-height: 1.5;
    --width-card: 285px;
    --width-card-medium: 460px;
    --width-card-wide: 800px;
    --width-content: 1080px;
}






    
* {
    /*border: 1px solid red;*/

}    



header, nav {
    margin: 0;
}
nav ul {
    display: flex;
    justify-content: space-between;
    max-width: 425px;
    width: 100%;
    /*padding-left: 100px;*/
    margin: auto;
    /*text-align: center;*/
    /*margin: 0;*/
    /*border: 1px solid red;*/
    /*align-content: center;*/
    /*background-color: red;*/
}
/*
nav ul li {
    /*margin: auto;*/
    /*padding: 0;*/
    max-width: 33%;
    text-align: center;

    /*align-content: center;*/
}
*/
/*
nav ul li a {
    margin: auto;
    /*padding: 0;*/
    width: 30%;
    text-align: center;
    /*align-content: center;*/
}
*/


</style>


	</head>
	<body>
 <header>
                <h1>1 Line News</h1>

        <nav>
             <!-- <a href="https://5hu3hendu.com/"><img alt="MVP.css" src="logo.png" height="70"></a>             -->
                <ul>
                <li><a href="">Home</a></li>
                
                <li><a href="#edit-srcs">Sources</a></li>
            
                <li><a href="#about">About</a></li>
                <!-- // <li><a href="#" onClick="toggleDarkMode();" id="colorToggle">Dark Mode</a></li> -->
                <!-- <li><a href="https://www.github.com/andybrewer/mvp/" target="_blank">GitHub &nearr;</a></li> -->
               </ul>
        </nav>
        <p>Read latest 5 articls from your favourite sources.
            <br>No log-in required at all!!!
        </p>
    </header>
<main>
<article id="news">

</article>
<br>
<hr>
<br>
<h2 id="edit-srcs">Sources</h2>

<input class="source"  type="checkbox" onclick="update_ls()"  value="https://finshots.in/rss/"  />Finshots <br>
<input class="source"  type="checkbox" onclick="update_ls()" value="https://cms.qz.com/feed/" />Quarts <br>
<input class="source"  type="checkbox" onclick="update_ls()" value="https://www.kuwi.news/feed/" />Keeping Up With India <br>
<p><sup>TIP</sup> Reload page after selecting sources!</p>


<!-- <p>Paste RSS link. Generally xyz.com/feed/ or xyz.com/rss/</p>
<textarea width="100%" height="100px" onclick="saveSources(this)" id="sources"></textarea>
 -->
 <br>
 <hr>
 <br>

<article id="about">
<h2 >About OneLineNews</h2>
<p>
    One line news is an attempt to simplify the way we consume news & articles.<br>
    <br>
    read news from sources/people you know/love.<br>

    A weekend project by <a href="https://twitter.com/5HU3HENDU">Shubhendu Singh</a>.

</p>    
</article>
<br>
<hr>
<br>


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




// var default_sites = "https://www.kuwi.news/feed/ https://finshots.in/rss/ https://cms.qz.com/feed/ ";

function update_ls(){

    var cb = document.querySelectorAll('input[class=source]:checked');
    if(cb.length>0){
    var txt = '';
    for (var i = 0;i<cb.length; i++) {
        txt += cb[i].value + " ";

    }
    localStorage.setItem("sources",txt);    
}
else{
    localStorage.setItem("sources",'');
}
}


function cbvalue(){

    if(localStorage.getItem("sources")===null | localStorage.getItem("sources").trim()===""){




    var cb = document.querySelectorAll('input[class=source]:checked');
    if(cb.length>0){
    var txt = '';
    for (var i = 0;i<cb.length; i++) {
        txt += cb[i].value + " ";

    }
    localStorage.setItem("sources",txt);
}
else{
    var default_sites = "https://www.kuwi.news/feed/ https://finshots.in/rss/ ";
    localStorage.setItem("sources",default_sites);    
}

    // }
    else {
        console.log("not nullllllllllllll");
        var cb = document.querySelectorAll('input[class=source]');
        src = localStorage.getItem("sources");
    for (var i = 0;i<cb.length; i++) {
        if(src.includes(cb[i].value)){
            console.log("includes");
            // console.log("yess",i.value);
            cb[i].checked = true;

        }

    }        

    }

    // return txt;
   



}

// cbvalue();

// function saveSources(elm){

//     var src = elm.value;

//     console.log(src);

//     localStorage.setItem("srcs", src);


// }

// console.log("start is "+localStorage.getItem("srcs"));

// if(localStorage.getItem("srcs")===null | localStorage.getItem("srcs").trim()===""){
//     localStorage.setItem("srcs", sites);
//     // console.log(localStorage.getItem("srcs"));

// }



sites = localStorage.getItem("sources");

// document.getElementById("sources").innerText = sites;


sites_array = sites.split("http");


for (var i = 0;i < sites_array.length; i++) {
    if(sites_array[i].trim()===""){
        continue;
    }
    // console.log(sites_array[i]);
    // resp +=  fetchUrls("http"+sites_array[i].trim());

    var tmp = "http"+sites_array[i].trim();

    let formData = new FormData();  

    formData.append("site",tmp);

    fetch('https://onelinenews.herokuapp.com/fetch.php',{method:"post",body:formData})
    .then(response => response.text())
    .then(data => document.getElementById("news").innerHTML += data );

}

window.onload = function() {
  cbvalue();

};
</script>



</main>
<footer>
    
</footer>



	<!-- <script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script> -->

	</body>
	</html>
