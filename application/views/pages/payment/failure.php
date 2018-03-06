<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Payment Failure</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>

</head>
<body>  
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-2"></div>  
			<div class="col-md-8 ">
				<div class="card">
					<h4 class="card-header">Transaction <label for="failure" class="badge badge-danger">Failed</label></h4>
					<div class="card-body w3-padding-large">
						<?php 
						echo "<label>Failure Message-> ". $response['status_message'] ."..</label>";
						echo "<p>Your order status is ". $status ."..</br>";
						echo "Your transaction id for this transaction is ".$txnid.". <br>Contact our customer support.</p>";
						echo "<a href='".base_url()."' class='btn btn-sm float-left btn-info'> < - Go Back</a>";
						?>
					</div>
				</div>
			</div> 
			<div class="col-md-2"></div>
		</div>

	</div> 

</body>
</html>