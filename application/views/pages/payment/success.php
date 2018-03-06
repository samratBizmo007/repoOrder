<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Payment Success</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  
</head>
<body>  

<div class="container mt-5 w3-margin-top w3-margin-bottom">
	<div class="row">
        <div class="col-md-2"></div>  
        <div class="col-md-8">
        	<div class="card">
        		<h4 class="card-header">Transaction <label for="Success" class="badge badge-success">Success</label></h4>
        		<div class="card-body">
        			<?php 
                    echo "<label>Success Message-> ". $response['status_message'] ."..</label>";
		                echo "<p>Thank You. Your order status is ". $status .".</br>";
		                echo "Your Transaction ID for this transaction is ".$txnid."</br>";
		                echo "We have received a payment of Rs. " . $amount . ". Your subscription has been updated.</p>";
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