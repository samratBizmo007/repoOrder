<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Payment Confirmation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  
</head>
<body>  

<div class="container mt-5">
  <div class="row">
        <div class="col-md-2"></div>  
        <div class="col-md-8">
          <div class="card">
            <h5 class="card-header bg-success text-white">Checkout Confirmation</h5>
            <div class="card-body">
              <form action="<?php echo $action; ?>/_payment" method="post" id="payuForm" name="payuForm">
                    <input type="hidden" name="key" value="<?php echo $mkey; ?>" />
                    <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                    <input type="hidden" name="txnid" value="<?php echo $tid; ?>" />
                    <div class="form-group w3-col l6 w3-padding-right">
                        <label class="control-label">Total Payable Amount <i class="fa fa-inr w3-medium"></i></label>
                        <input class="form-control" name="amount" value="<?php echo $amount; ?>"  readonly/>
                    </div>
                    <div class="form-group w3-col l6 w3-padding-right">
                        <label class="control-label">Your Name</label>
                        <input class="form-control" name="firstname" id="firstname" value="<?php echo $name; ?>" readonly/>
                    </div>
                    <div class="form-group w3-col l6 w3-padding-right">
                        <label class="control-label">Email</label>
                        <input class="form-control" name="email" id="email" value="<?php echo $mailid; ?>" readonly/>
                    </div>
                    <div class="form-group w3-col l6 w3-padding-right">
                        <label class="control-label">Phone</label>
                        <input class="form-control" name="phone" value="<?php echo $phoneno; ?>" readonly />
                    </div>
                    <div class="form-group w3-col l6 w3-padding-right">
                        <label class="control-label"> Package Code</label>
                         <input class="form-control" name="productinfo" value="<?php echo $productinfo; ?>" readonly/>     
                    </div>
                    <div class="form-group w3-col l6 w3-padding-right">
                        <label class="control-label">Address</label>
                        <input class="form-control" name="address1" value="<?php echo $address; ?>" readonly/>     
                    </div>
                    <div class="form-group">
                        <input name="surl" value="<?php echo $sucess; ?>" size="64" type="hidden" />
                        <input name="furl" value="<?php echo $failure; ?>" size="64" type="hidden" />  
                        <!--for test environment comment  service provider   -->
                        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                        <input name="curl" value="<?php echo $cancel; ?> " type="hidden" />
                    </div>
                    <div class="form-group float-right">
                      <input type="submit" value="Pay Now" class="btn btn-success" />
                    </div>
                </form> 
            </div>
          </div>
                                             
        </div>
        <div class="col-md-2"></div>
    </div>
 
</div> 

</body>
</html>