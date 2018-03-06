<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
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
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/config.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/inventory/materialstock_management.js"></script>

</head>
<body class="">
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:120px;">

        <!-- Header -->
        <header class="w3-container" >
            <h5><b><i class="fa fa-cubes"></i> Manage Orders</b></h5>
        </header>

        <div id="exTab1" class="container w3-small" > <!-- container for tab -->
            <br>
            <ul  class="nav nav-tabs">
                <li class="active "><a class="w3-medium w3-button w3-red"  href="#show_table" data-toggle="tab">My Order</a></li>
                <li><a class="w3-medium w3-orange w3-button w3-text-white"  href="#openedOrders" data-toggle="tab">New Order</a></li>
                
            </ul>

            <div class="tab-content clearfix "><br><!-- tab containt starts -->
                <div class="tab-pane active" id="show_table">  <!-- tab for Raw material starts here -->
                    <div class="">                    
                        <div class="w3-col l12 w3-margin-top">
                            <div class="" id="All_Orders" name="All_Orders" style="">
                                <table class="table table-bordered table-responsive w3-small"> 
                                    <!-- table starts here -->
                                    <thead>
                                        <tr class="">
                                            <th>Order ID</th>
		        							<th>Product</th>
									        <th>Description</th>
									        <th>Quantity</th>
									        <th>Action</th>  
                                        </tr>
                                    </thead>
                                    <tbody ><!-- table body starts here -->
                                    <?php 
                                    //print_r($orders);
									if ($orders['status'] == 200) {//print_r($Purchased['status_message']);
										$count=1;
										
                                            for ($i = 0; $i < count($orders['status_message']); $i++) {                                            	
                                                echo '<tr class="text-center">
                                                <td class="text-center">' . $count . '.</td>
                                                <td class="text-center">#00' . $orders['status_message'][$i]['order_id'] . '</td>
                                                <td class="text-center">' . $orders['status_message'][$i]['order_date'] . '</td>
                                                <td class="text-center">' . $orders['status_message'][$i]['order_time'] . '</td>        
                                                <td class="text-center"><a class="btn w3-blue w3-medium w3-padding-small" title="UpdateCustomer" data-toggle="modal" data-target="#myModalnew_' . $orders['status_message'][$i][''] . '" style="padding:0"><i class="fa fa-edit"></i></a>
                                                
                                            <!-- Modal  starts here-->

                                            <div id="myModalnew_' . $Finished['status_message'][$i]['finished_product_id'] . '" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div>Manage Stock Material</div>
                                            </div>
                                            <div class="modal-body w3-light-grey">';   
          								    $product_info='';
          									foreach(json_decode($orders['status_message'][$i][order_products]) as $key)
          									{
          										
          									
          										
		                                       echo'<div class="col-lg-12 w3-margin-top">
		              							<div class="col-lg-3 w3-margin-top">
		                						<label class="w3-label">Product Name:</label>
		               							 <input type="text" class="w3-input" name="prod_Name[]" value='.$key['prod_name'].' placeholder="Enter Product Description" required>
									              </div>
									             </div>		              
									              <div class="col-lg-4 w3-margin-top">
									                <label class="w3-label">Product Description:</label>
									                <input type="text" class="w3-input" name="prod_Description[]" value='.$key['prod_description'].' placeholder="Enter Product Description" required>
									              </div>
									              <div class="col-lg-1 w3-margin-top">
									                <label class="w3-label">Quantity:</label>
									                <input type="number" min="1" class="w3-input" name="prod_quantity[]" value='.$key['prod_quantity'].' placeholder="count" required >
									              </div>
									              <div class="col-lg-4 w3-margin-top">
									               <div class="w3-col l12">
									                <label class="w3-label">Product Image:</label>
									                <div class="w3-col l12 w3-padding-bottom">
									                  <img src="" width="180px" id="prod_imagePreview_1" height="180px" alt="Product Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">
									                </div>
									                <input type="file" name="prod_image[]" id="prod_image_1" value='.$key['prod_image'].' class="w3-input w3-padding-small" onchange="readURL(this,1);">
									              </div>
									              </div>';
          									}
                                               echo'</div>
                                               </div>
                                               </div>
                                               </div>'; 
                                            $count++;
                                            }
										}
										else {
										     
    										echo '
											    <div class="w3-col 12 w3-padding w3-margin">              
											    <div class="w3-col l12">
											    <div class="w3-center">
											    <img src="'.base_url().'css/logos/no_data.png" width="auto" class="img"/>
											    </div>
											    </div>             
											    </div>';
  										}
										
                                    ?>
                                  	</tbody><!-- table body close here -->
                                </table>   <!-- table closed here -->
                            </div>
                        </div>
                    </div>
                </div><!-- table container ends here -->
            <!--____________________________________ tab div 1 ends here_________________________________________ -->

            <!--_______________________________ tab 3 starts here_____________________________________________ -->

            <div class="tab-pane" id="openedOrders"><!-- tab 3 starts here -->
                <div class="w3-row-padding w3-margin-bottom ">

                    <div class="w3-col l12 w3-margin-top">
                        <div class="" id="Opened_Orders" name="Opened_Orders" >
                            <table class="table table-striped table-responsive w3-small"> 
                                <!-- table starts here -->
                                <thead>
                                    
                                </thead>
                                <tbody><!-- table body starts here --> 
                                    <?php
                                    ?>
                                </tbody><!-- table body close here -->
                            </table>   <!-- table closed here -->
                        </div>
                    </div>
                </div>     
            </div>         
            <!-- ___________________________tab 2 div ends here__________________________________ -->
            <!-- ____________________________the tab 2 ends here____________________ -->
     

        </div><!-- tab containt ends here -->
    </div><!-- tab containt div ends here -->
</div><!-- container for tab -->
<!--_______________________ div for main container____________________________ -->

</body>
</html>

