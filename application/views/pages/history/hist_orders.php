<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Orders</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/orders/manage_order.js"></script>
  <style>
  /* width */
  ::-webkit-scrollbar {
    width: 5px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1; 
  }
  
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: black; 
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555; 
  }
</style>
</head>
<body class="">
  <!-- !PAGE CONTENT! -->
  <?php 
  if($orders['status'] == 200) {
    for ($i = 0; $i < count($orders['status_message']); $i++) {
      $product_info=json_decode($orders['status_message'][$i]['order_products'],TRUE);
      ?>
      <div class="w3-row ">
      <div id="mainDiv_<?php echo $orders['status_message'][$i]['order_id']; ?>" onclick="showDetail(<?php echo $orders['status_message'][$i]['order_id']; ?>)" class="w3-small w3-border-bottom w3-padding-xlarge w3-container w3-padding-top w3-light-grey w3-text-grey">
        <div class="w3-col s2" id="btn_<?php echo $orders['status_message'][$i]['order_id']; ?>">
          <i class="fa fa-chevron-down w3-tiny"></i>
        </div>
        <div class="w3-col s10">
          <b>Date:</b><?php echo $orders['status_message'][$i]['order_date']; ?>,<b>Time:</b><?php echo $orders['status_message'][$i]['order_time']; ?>
        </div>
      </div>
      <div class="w3-container w3-white" style="display: none" id="collapseDiv_<?php echo $orders['status_message'][$i]['order_id']; ?>">
        <?php 
        foreach($product_info as $key)
        {
          ?>
          <div class="w3-col s12 w3-padding-small w3-small" style="margin-bottom: 5px">
            <div class="w3-col s3">
              <img class="img img-thumbnail" alt="Item Image not available" style="height: 60%; width: 60%; object-fit: contain" src="<?php echo IMAGE_PATH.$key['prod_image']; ?>" onerror="this.src='<?php echo base_url(); ?>images/default_image.png'">
            </div>
            <div class="w3-col s6">
              <b>Product:</b><?php echo $key['prod_Name']; ?>
            </div>
            <div class="w3-col s3">
              <b>Qty(s):</b><?php echo $key['prod_quantity']; ?>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
        <?php
      }
    }
    else {
      echo '<div style="height: 50px" class="w3-small w3-container w3-padding-top w3-light-grey w3-text-grey">
      <div class="w3-col s12 w3-center">
      No Orders Available
      </div>
      </div>
      ';
    }
    ?>

<script>
  function showDetail(id){
   // alert(id);
    if(!$('#collapseDiv_'+id).is(':visible')){
    $('#collapseDiv_'+id).show();
    $('#btn_'+id).html('<i class="fa fa-chevron-up w3-tiny"></i>');
  }
  else{
    $('#collapseDiv_'+id).hide();
    $('#btn_'+id).html('<i class="fa fa-chevron-down w3-tiny"></i>');
  }
  }
</script>
  </body>
  </html>


