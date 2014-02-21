<!doctype html>
<html lang="en">
<head>
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 	<title><?php bloginfo('name'); ?> | Down for Maintenance.</title>
 
 	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/foundation/5.0.3/css/foundation.min.css">
 	<style>
		body {
			color:#fff;
			background-color: #333;
		}
		#content {
			background-color: rgba(255,255,255,0.1);
			margin-top: 6em;
			padding: 1.5em;
		}
		header > p {
			font-size: 2em;
		}
		footer {
			position:fixed;
			bottom:-1.25rem;
			right:0;"
		} 
		@media screen {
			body {
				background: #333 url('/wp-content/themes/draya/img/bg-1280.jpg') fixed 0 0;
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
	</style>
	<script src="//cdn.jsdelivr.net/foundation/5.0.3/js/vendor/modernizr.js"></script>
</head>
<body>
	<div id="row">
		<div class="large-4 large-offset-4 columns">
			<div id="content">			
				<?php echo $this->mamo_template_tag_message(); ?>
			</div>
			<footer>
				<?php echo str_replace('<a ', '<a class="tiny secondary button" ', $this->mamo_template_tag_login_logout()); ?>
			</footer>
		</div>
	</div>
</body>
</html>
