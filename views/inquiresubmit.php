<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="robots" content="noindex">
<title>Thanks for requesting quote about eWebWizards</title>

<?php include "header_includes.php"; ?>


</head>

<body>

	<?php include "header.php"; ?>
	<?php 
		$restStatus = $model;
		
	?>

		<section id="inquire" class="indv-page">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="home-section-heading">
							<h2>
								 <span class="color-theme">Thank You</span>
							</h2>
						</div>
				<div class="clearfix"></div>
				
				<?php 
					if($restStatus["STATUS"]=="SUCCESS"){
				?>
					<div class="col-md-8 col-md-offset-2" style="text-align: center;">
						<div class="alert alert-success" role="alert"> <?php echo __APPLICATION_NAME?> will contact you soon for more inputs.</div>
					</div>
				<?php 	
					}else{
				?>
					<div class="col-md-8 col-md-offset-2" style="text-align: center;">
						<div class="alert alert-danger" role="alert">Something went wrong. Please try again.</div>
						<div class="row">
							<div class="col-lg-12" >
								<a href="<?php echo __WEB_ROOT?>/inquire" class="btn btn-theme btn-lg hidden-xs hidden-sm" style="margin:20px 0px;">Get Quote</a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
				
				<div class="clearfix"></div>

					</div>
				</div>
			</div>
		</section>


	<?php include "footer.php"; ?>

	<?php include "footer_includes.php"; ?>
	

</body>
</html>
