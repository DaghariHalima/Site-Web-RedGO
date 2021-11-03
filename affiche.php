<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
<link rel="shortcut icon" href="img/img.jpg" type="image/x-icon" />
<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script> 
<script src="https://www.chartjs.org/samples/latest/utils.js"></script> 
<script type="text/javascript" src="chartjs-plugin-labels.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<link rel="stylesheet" href="style.css">
<title>REDGO</title> 
<style>
  #tableau{
    float: left;
    width: 50%;
    height: 380px;
    margin-left: 2%;
    margin-top: -30%;
    text-align: center;
  }
  #MyDiv{
    display: block;
    width: 462px;
    height: 370px;
    margin-left: 53%;
    margin-top: 2%;
   
  }
  nav {
  width: 100%;
  height:50%;
  background-color:#9C0F2F ;
  text-align: center;
  margin: 0 auto;
  font-family: Raleway;
  padding: 20px 20px;
 
}

/* applied after scroll height reached */
.fixed-nav nav {
  position: fixed;
  top:0;
  z-index: 1;
}
nav a {
  color: #fff;
  text-decoration: none;
  font: 20px Raleway;
  margin: 0px 10px;
  padding: 10px 10px;
  position: relative;
  z-index: 0;
  cursor: pointer;
}
/* Border from Y to X  */
nav a:before,
nav a:after {
  position: absolute;
  opacity: 0.5;
  height: 100%;
  width: 2px;
  content: "";
  background: #fff;
  transition: all 1s;
}

nav a:before {
  left: 0px;
  top: 0px;
}

nav a:after {
  right: 0px;
  bottom: 0px;
}

nav a:hover:before,
nav a:hover:after {
  opacity: 0.5;
  height: 2px;
  width: 100%;
}

</style>  
</head>

<body>
<nav id="navigation">
      <a href="#">CA PAR REGION</a>
      <a href="REDGO_ACTIVITE/affiche.php">CA PAR ACTIVITE</a>
      <a href="REDGO/affiche.php">CA PAR REGION & ACTIVITE</a>
      <a href="REDGO_CHEFZONE/affiche.php">CA PAR CHEF DU ZONE </a>
    </nav>
<?php

include ("index.php");
echo "<br/>";
?>
<br/>
<div id='MyDiv'>
</div>

<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};


var arr_color = [];
var arr_ca = [];
var arr_obj = [];
var arr_reg = [];
console.log(obj_json);
for(var i = 0; i < obj_json.length;i++){

console.log( obj_json[i] );
arr_color.push( obj_json[i].color );
arr_obj.push( obj_json[i].OBJ_CA );
arr_ca.push( obj_json[i].CA_HT );
arr_reg.push( obj_json[i].REGION );
console.log(arr_ca);
console.log(arr_obj);
}
var trace1 = {
  x: arr_reg,
  y: arr_ca,
  name: 'CA_HT',
  type: 'bar'
};

var trace2 = {
  x: arr_reg,
  y: arr_obj,
  name: 'OBJ_CA',
  type: 'bar'
};

var data = [trace1, trace2];

var layout = {barmode: 'group'};

Plotly.newPlot('MyDiv', data, layout);

</script>
<script>
const nav = document.querySelector('#navigation');
const navTop = nav.offsetTop;

function stickyNavigation() {
  console.log('navTop = ' + navTop);
  console.log('scrollY = ' + window.scrollY);

  if (window.scrollY >= navTop) {
    // nav offsetHeight = height of nav
    document.body.style.paddingTop = nav.offsetHeight + 'px';
    document.body.classList.add('fixed-nav');
  } else {
    document.body.style.paddingTop = 0;
    document.body.classList.remove('fixed-nav');
  }
}

window.addEventListener('scroll', stickyNavigation);
</script>

</body>
</html>
