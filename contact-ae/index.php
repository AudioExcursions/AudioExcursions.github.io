<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = ' ';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>

		<meta charset="utf-8" />

		<!-- User defined head content such as meta tags and encoding options -->
		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		<meta name="generator" content="RapidWeaver" />
		
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@twitter.com/audioexcursions">
	<meta name="twitter:creator" content="@twitter.com/audioexcursions">
	<meta name="twitter:title" content="contact-ae">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Audio Excursions">
	<meta property="og:title" content="contact-ae">

		<!-- User defined head content -->
		

		<!-- Meta tags -->
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

		<title>contact-ae</title>

		<!-- CSS stylesheets reset -->
	  <link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/tesla/consolidated.css?rwcache=630837332" />
		

		<!-- CSS for the Foundation framework's CSS that handles the responsive columnized layout -->
	  

	  <!-- Main Stylesheet -->
		

		<!-- RapidWeaver Color Picker Stylesheet -->
		

	  <!-- Theme specific media queries -->
		

		<!-- Base RapidWeaver javascript -->
		<script type="text/javascript" src="../rw_common/themes/tesla/javascript.js?rwcache=630837332"></script>

		<!-- jQuery 1.8 is included in the theme internally -->
	  <script src="../rw_common/themes/tesla/js/jquery.min.js?rwcache=630837332"></script>

	  <!-- Theme specific javascript, along with jQuery Easing and a few other elements -->
	  <script src="../rw_common/themes/tesla/js/elixir.js?rwcache=630837332"></script>

		<!-- Style variations -->
		<script src="../rw_common/themes/tesla/js/fitvids.js?rwcache=630837332"></script>
		<script src="../rw_common/themes/tesla/js/sidebar/sidebar_left.js?rwcache=630837332"></script>
		

		<!-- User defined styles -->
		<style type="text/css" media="all">header { background-image: url(../resources/10815803.jpg); }
body { background-image: url(../resources/47398.jpg); }</style>

		<!-- User defined javascript -->
		

		<!-- Plugin injected code -->
		


	</head>

	<!-- This page was created with RapidWeaver from Realmac Software. http://www.realmacsoftware.com -->

	<body>

			<header role="banner">

				<!-- Site Logo -->
				<div id="logo" data-0="opacity: 1;" data-top-bottom="opacity: 0;" data-anchor-target="#logo">
			  	<img src="../rw_common/images/AELogo.png" width="720" height="720" alt="Audio Excursions"/>
				</div>

				<div id="title_wrapper">
						<!-- Site Title -->
						<h1 id="site_title" data-0="opacity: 1; top:0px;" data-600="opacity: 0; top: 80px;" data-anchor-target="#site_title">
							Audio Excursions
						</h1>

						<!-- Site Slogan -->
						<h2 id="site_slogan" data-0="opacity: 1; top:0px;" data-600="opacity: 0; top: 80px;" data-anchor-target="#site_slogan">
							Reviews for Audio Enthusiasts
						</h2>

						<!-- Scroll down button -->
						<div id="scroll_down_button" data-0="opacity: 1; top:0px;" data-400="opacity: 0; top: 100px;" data-anchor-target="#scroll_down_button">
							<i class="fa fa-angle-down"></i>
						</div>
				</div>

				<!-- Top level navigation -->
				<div id="navigation_bar">
					<div class="row site_width">
						<div class="large-12 columns">
							<nav id="top_navigation"><ul><li><a href="../" rel="">Reviews</a></li><li><a href="./" rel="" id="current">Contact AE</a></li><li><a href="../about-ae/" rel="">About AE</a></li><li><a href="../meet-photos/" rel="">Meet Photos</a></li><li><a href="../audio-gallery/" rel="">Audio Gallery</a></li></ul></nav>
						</div>
					</div>
				</div>

			</header>

		<!-- Sub-navigation -->
		<div id="sub_navigation_bar">
			<div class="row site_width">
				<div class="large-12 columns">
					<nav id="sub_navigation"><ul></ul></nav>
				</div>
			</div>
		</div>

		<!-- Mobile Navigation -->
		<div id="mobile_navigation_toggle">
			<i id="mobile_navigation_toggle_icon" class="fa fa-bars"></i>
		</div>
		<nav id="mobile_navigation">
			<ul><li><a href="../" rel="">Reviews</a></li><li><a href="./" rel="" id="current">Contact AE</a></li><li><a href="../about-ae/" rel="">About AE</a></li><li><a href="../meet-photos/" rel="">Meet Photos</a></li><li><a href="../audio-gallery/" rel="">Audio Gallery</a></li></ul>
		</nav>

		<!-- Main Content area and sidebar -->
		<div class="row site_width" id="container">
			<section id="content"class="large-8 columns">
				
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form class="rw-contact-form" action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>

			</section>
			<aside id="sidebar" class="large-4 columns">
				<!-- Sidebar content -->
				<h4 id="sidebar_title"></h4>
				<div id="sidebar_content"></div>
				<div id="archives">
					
				</div>
			</aside>
		</div>

		<!-- Footer -->
		<footer class="row site_width">
			<div id="footer_content" class="large-12 columns">
				<div id="breadcrumb_container">
					<i class="fa fa-folder-open-o"></i> <span id="breadcrumb"><ul><li><a href="../">Reviews</a>&nbsp;>&nbsp;</li><li><a href="./">Contact AE</a>&nbsp;>&nbsp;</li></ul></span>
				</div>
				&copy; 2020 Audio Excursions <a href="#" id="rw_email_contact">Contact Me</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":ae";var _rwObsfuscatedHref3 = "mor";var _rwObsfuscatedHref4 = "row";var _rwObsfuscatedHref5 = "@me";var _rwObsfuscatedHref6 = ".co";var _rwObsfuscatedHref7 = "m";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7; document.getElementById("rw_email_contact").href = _rwObsfuscatedHref;</script>
			</div>
		</footer>

		<!-- Scroll up button -->
		<div id="scroll_up_button"><i class="fa fa-angle-up"></i></div>

		<!-- Handles loading Skrollr, which helps in animating portions of the header area. -->
		<!-- We check to see if the user is on an mobile device or not, and only serve up -->
		<!-- the animations on non-mobile devices. -->
		<script>
			$elixir(window).load(function() {
			  if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
			      skrollr.init({
			          forceHeight: false
			      });
			  }
			});
		</script>

	</body>

</html>
