<!doctype html>
<html lang="en">
<head>
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 	<title>Down for Maintenance.</title>
  
 	<meta name="description" content="Draya's awesome blog thing.">
  
 	<meta name="author" content="ZURB, inc. ZURB network also includes zurb.com">
 	<meta name="copyright" content="ZURB, inc. Copyright (c) 2013">

 	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/foundation/5.0.3/css/foundation.min.css">
 	<style>
		body {
				color:#fff;
				background-color: #333;
		}
		@media screen {
			body {
				background: #333 url('/wp-content/themes/draya/img/bg-1280.jpg') fixed 0 0;
			}	
			#main {
				margin-top: 6em;
				padding-bottom: 1.5em;
			}
		}
		@media screen and (min-width: 1281px) {
			body {
				background-image: url('/wp-content/themes/draya/img/bg-1920.jpg');
			}
		}
		@media screen and (min-width: 1921px) {
			body {
				background-image: url('/wp-content/themes/draya/img/bg-2560.jpg');
			}
		}
		@media screen and (min-width: 2561px) {
			body {
				background-image: url('/wp-content/themes/draya/img/bg-4096.jpg');
			}
		}
		#content {
			background-color: rgba(255,255,255,0.1);
		}
	</style>
	<script src="//cdn.jsdelivr.net/foundation/5.0.3/js/vendor/modernizr.js"></script>
</head>
<body>
	<div id="row">
		<div class="large-4 large-offset-4 columns">
			<div id="content">			
				<header>
					<?php bloginfo('name'); ?>
				</header>
				<?php echo $this->mamo_template_tag_message(); ?>
			</div>
			<footer class="right">
				<p id="admin"><?php	echo $this->mamo_template_tag_login_logout(); ?></p>
			</footer>
		</div>
	</div>
</body>
</html>
