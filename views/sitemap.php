<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="robots" content="noindex">
<title>Request a Callback</title>

<?php include "header_includes.php"; ?>


</head>

<body>
	<div id="skrollr-body" class="nav-padded">
		
		<?php include "header.php"; ?>

		<!-- Services -->
		<section id="inquire" class="indv-page">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<div class="home-section-heading">
							<h2>
								Our <span class="color-theme">Sitemap</span>
							</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-xs-offset-2">
						<ul>
							<li><a href="<?php echo __APPLICATION_URL?>">Home Page</a></li>
							<li><a href="<?php echo __APPLICATION_URL?>/about">About Us</a></li>
							<li><a href="<?php echo __APPLICATION_URL?>/services">Services we offer</a></li>
							<li><a href="<?php echo __APPLICATION_URL?>/inquire">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<?php include "footer.php"; ?>
	
		<?php include "footer_includes.php"; ?>
		
		<script src="<?php echo __WEB_ROOT?>/static/js/inquire.js"></script>

	</div>
</body>
</html>
