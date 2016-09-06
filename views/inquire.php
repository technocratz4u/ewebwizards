<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Inquire about eWebWizards, a leading service provider and expert in responsive website designing,logo designing,ecommerce application,mobile application development,digital marketing.">
<meta name="author" content="eWebWizards">

<title>Request a Callback for eWebWizards | Service Provider | Website Designing and Development</title>

<?php include "header_includes.php"; ?>

<script type="application/ld+json">
	[
	<?php include "json-ld/jsonld_local_business.php"; ?>,
	<?php include "json-ld/jsonld_website.php"; ?>,
	<?php include "json-ld/jsonld_contact_page.php"; ?>
	]
</script>

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
								REQUEST A <span class="color-theme">FREE QUOTE</span>
							</h2>
							<hr>
							<h4>Simply fill out the form below, and we’ll contact you soon!</h4>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-8 col-md-offset-2">
							<div class="alert alert-danger" role="alert" id="alertMsg"
								style="display: none;"></div>
							<form id="inquiryFrom"
								action="<?php echo __WEB_ROOT?>/inquire/submit" method="post">

								<div class="form-group">
									<label for="inquiryName">Your Name</label> <input type="text"
										name="inquiryName" class="form-control" id="inquiryName"
										placeholder="Name" maxlength="100">
								</div>
								<div class="form-group">
									<label for="inquiryMobile">Mobile No.</label> <input
										type="text" name="inquiryMobile" class="form-control"
										id="inquiryMobile" placeholder="Mobile No." maxlength="15">
								</div>
								<div class="form-group">
									<label for="inquiryEmail">Email</label> <input type="email"
										name="inquiryEmail" class="form-control" id="inquiryEmail"
										placeholder="Email" maxlength="100">
								</div>
								<div class="form-group">
									<label for="inquiryDetail">Brief Project Description</label>
									<textarea name="inquiryDetail" class="form-control" rows="7"
										id="inquiryDetail" placeholder="Details"></textarea>
								</div>
								<a href="javascript:void(0);" id="inquirySubmit"
									class="btn btn-theme btn-lg">Submit</a>
							</form>
							<br>
						</div>

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
