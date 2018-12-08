
<?php 
session_start();
if(isset($_SESSION['id'])){
    header('location:index.php');
}?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Playtagonist</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<style>
  html, body, div, span, applet, object, iframe,
 h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
  display: block;
}
body {
  line-height: 1;
}
ol, ul {
  list-style: none;
}
blockquote, q {
  quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
  content: '';
  content: none;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}

/* end reset css */

main {
  max-width: 350px;
  margin: 40px auto;
  background: #f5f5f5;
  perspective: 1000px;
}

.form {
  max-width: 350px;
  margin: auto;
  background-color: #ffff;
  border: 1px solid #ccc;
  box-shadow: 20px 10px 10px 0px rgba(0, 0, 0, 0.1); 
}

.animationA {
  animation: ina 300ms ease-in-out  forwards, outa 300ms ease-in-out 0.3s forwards;
  transform-origin: top left;
}

.animationB {
  animation: inb 300ms ease-in-out  forwards, outb 300ms ease-in-out 0.3s forwards;
  transform-origin: top left;
}

@keyframes ina {
  0% {opacity: 1; transform: translateX(0px)}
  50% {opacity: 0;}
  100% {opacity: 0; transform: translateX(-350px)}
}

@keyframes outa {
  0% { opacity: 0; transform: translateX(200px)}
  100% { opacity: 1; transform: translateX(0px)}
} 

@keyframes inb {
  0% {opacity: 1; transform: translateX(0px)}
  50% {opacity: 0;}
  100% {opacity: 0; transform: translateX(350px)}
}

@keyframes outb {
  0% { opacity: 0; transform: translateX(-200px)}
  100% { opacity: 1; transform: translateX(0px)}
} 

.tab {
  max-width: 350px;
  overflow: hidden;
  border: 1px solid #ccc;
  border-bottom: none; 
  background-color: #fff;
  }
  
.tab button {
  float:left;
  display: block;
  background-color: #fff;
  max-width: 350px;
  margin: auto;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 16px 16px 14px;
  }

.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  background-color: #ccc;
  color: #555;
  border-top: 2px solid orange;
  padding: 14px 16px;
  }
  
.signup-tab-content {
  display: block;
  border-top: none;
  perspective: 1000px;
  }

  .login-tab-content {
  display: none;
  border-top: none;
  perspective: 1000px;
  }

.form-container {
  width: 94%;
  height: 100%;
  margin-left: 3%;
  max-width: 350px;
  display: flex;
  flex-direction: column;
}

.submit-button {
  width: 20%;
  padding-top: 5px;
  padding-bottom: 5px;
  margin-top: 20px;
  margin-bottom: 90px;
  overflow: visible;
  border: 1px solid #808080;
}

.form-label {
  margin-top: 10px;
}

.tab-links {
  max-width: 350px;
  margin: auto;
}
</style>
	</head>
	<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<a href="#"><img src="images/logo.png"></a>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib-active"><a href="index.php">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="tools.html">Tools</a></li>
					<li><a href="rules.html">Rules</a></li>
					<li><a href="gameplay.html">Game Play</a></li>
					<li><a href="login.html">Jump In!</a></li>
				</ul>
			</nav>
			
			<div class="colorlib-footer">
				<h6><small>&copy; Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></small></h6>
				<ul>
					<li><a href="#"><i class="icon-facebook2"></i></a></li>
					<li><a href="#"><i class="icon-twitter2"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="colorlib-main">
			<aside id="colorlib-hero" class="js-fullheight">
				<div class="flexslider js-fullheight">
					<ul class="slides">
				   	<li style="background-image: url(images/bg1.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-xs-12 js-fullheight slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc desc2">

<main>
    <?php echo $_SESSION['created']?? "";?>
  <div class="tab">
    <button class="tab-links active" onclick="openSignup()" id="sign">Signup</button>
    <button class="tab-links" onclick="openLogin()" id="log">Login</button>
  </div>



  <div id="signup" class="signup-tab-content">
    <form method="post" class="form" action="create.php" id="">
      <div class="form-container">
        <h1 style="text-align: center">Signup</h1>

        <label for="username" class="form-label">Username:</label>
        <input type="text" name="username">

        <label for="school" class="form-label">School:</label>
        <input type="text" name="school">

        <label for="class" class="form-label">Class:</label>
        <input type="text" name="class1">

        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email1">

        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password">

        <input class="submit-button" type="submit" name="submit" value="GO!">
      </div>
    </form>
  </div>



  <div id="login" class="login-tab-content">
    <form method="post" action="logaction.php" class="form" id="b">
      <div class="form-container">
        <h1 style="text-align: center">Login</h1>

        <label for="username" class="form-label">Username:</label>
        <input type="text" name="username">

        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password">

        <input class="submit-button" type="submit"name="login" value="GO!">
      </div>
    </form>
  </div>
</main> 
<?php //}?>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>

<script type="text/javascript">
  function openSignup() {
  
  document.getElementById("signup").style.display = "block";
  document.getElementById("login").style.display = "none";
  document.getElementById("sign").classList.add("active");
  document.getElementById("log").classList.remove("active");

  document.getElementById("a").classList.add("animationA");
}

function openLogin() {

  document.getElementById("login").style.display = "block";
  document.getElementById("signup").style.display = "none";
  document.getElementById("log").classList.add("active");
  document.getElementById("sign").classList.remove("active");

  document.getElementById("b").classList.add("animationB");
}
</script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Sticky Kit -->
	<script src="js/sticky-kit.min.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

