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
<body class="w3-light-grey">
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:120px;">

        <!-- Header -->
        <header class="w3-container" >
            <h5><b><i class="fa fa-cubes"></i> Manage Orders</b></h5>
        </header>

        <div id="exTab1" class="container w3-small" > <!-- container for tab -->
            <br>
            <ul  class="nav nav-tabs">
                <li class="active "><a class="w3-medium w3-button w3-red"  href="#allOrders" data-toggle="tab">Raw Material Stock</a></li>
                <li><a class="w3-medium w3-orange w3-button w3-text-white"  href="#openedOrders" data-toggle="tab">Purchased Products Stock</a></li>
                <li><a class="w3-medium w3-brown w3-button"  href="#closedOrders" data-toggle="tab">Finished Product Stock</a></li>
            </ul>

            <div class="tab-content clearfix "><br><!-- tab containt starts -->
                <div class="tab-pane active" id="allOrders">  <!-- tab for Raw material starts here -->
                    <div class="">                    
                        <div class="w3-col l12 w3-margin-top">
                            <div class="" id="All_Orders" name="All_Orders" style="max-height: 700px; overflow: scroll;">
                                <table class="table table-striped table-responsive w3-small"> 
                                    <!-- table starts here -->
                                    <thead>
                                        <tr class="w3-black">
                                            <th class="text-center">SR. No</th>
                                            <th class="text-center">Material&nbsp;Name</th>  
                                            <th class="text-center">ID</th>              
                                            <th class="text-center">OD</th>              
                                            <th class="text-center">Available&nbsp;Length</th>              
                                            <th class="text-center">Tolerance</th>
                                            <th class="text-center">Price/Unit</th>
                                            <th class="text-center">Branch</th>
                                            <th class="text-center">Actions</th>  
                                        </tr>
                                    </thead>
                                    <tbody ><!-- table body starts here -->
                                        <?php
//                                $count = 1;
//                                if ($details['status'] == 1) {
//                                    for ($i = 0; $i < count($details['status_message']); $i++) {
//                                        echo '<tr class="text-center">
//                                        <td class="text-center">' . $count . '.</td>
//                                        <td class="text-center"><input type="text" name="Updated_MaterialStock_Materialname" id="Updated_MaterialStock_Materialname_'.$details['status_message'][$i]['rawmaterial_id'].'" class="form-control" value="' . $details['status_message'][$i]['material_name'] . '"></td>
//                                        <td class="text-center">' . $details['status_message'][$i]['raw_ID'] . '</td>
//                                        <td class="text-center">' . $details['status_message'][$i]['raw_OD'] . '</td>
//                                        <td class="text-center"><input type="number" name="Updated_MaterialStock_Length" id="Updated_MaterialStock_Length_'.$details['status_message'][$i]['rawmaterial_id'].'" class="form-control" value="' . $details['status_message'][$i]['avail_length'] . '"></td>
//                                        <td class="text-center">' . $details['status_message'][$i]['tolerance'] . '</td>
//                                        <td class="text-center">' . $details['status_message'][$i]['material_price'] . ' <i class="fa fa-rupee"></i></td>
//                                        <td class="text-center">' . $details['status_message'][$i]['branch_name'] . '</td>
//                                        <td class="text-center"><a class="btn w3-text-blue w3-medium w3-padding-small" id="update_rawMaterial_'.$details['status_message'][$i]['rawmaterial_id'].'" onclick="update_rawMaterial('.$details['status_message'][$i]['rawmaterial_id'].')" title="Update Raw Material" style="padding:0"><i class="fa fa-edit"></i></a>
//                                        <a class="btn w3-text-red w3-medium w3-padding-small" title="Delete Raw Material" id="delete_rawMaterial_'.$details['status_message'][$i]['rawmaterial_id'].'" onclick="delete_rawMaterial('.$details['status_message'][$i]['rawmaterial_id'].')" style="padding:0"><i class="fa fa-close"></i>
//                                        </a> 
//                                        </td>
//                                        </tr>';
//                                        $count++;
//                                    }
//                                } else {
//                                    echo'<tr><td style="text-align: center;" colspan = "9">No Records Found...!</td></tr>';
//                                }
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
                        <div class="" id="Opened_Orders" name="Opened_Orders" style="max-height: 700px; overflow: scroll;">
                            <table class="table table-striped table-responsive w3-small"> 
                                <!-- table starts here -->
                                <thead>
                                    <tr class="w3-black">
                                        <th class="text-center">Material</th>  
                                        <th class="text-center">ID</th>              
                                        <th class="text-center">OD</th>              
                                        <th class="text-center">Length</th>              
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Discount In Percentage</th>
                                        <th class="text-center">Margin In Percentage</th>
                                        <th class="text-center">Cost Price</th>
                                        <th class="text-center">Quotation</th>
                                        <th class="text-center">Vendor</th>
                                        <th class="text-center">Quantity</th>        
                                    </tr>
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
            <!--_______________________________ tab 3 starts here_____________________________________________ -->
            <div class="tab-pane" id="closedOrders"><!-- tab 3 starts here -->

                <div class="container w3-padding"><!-- table container -->
                    <div class="">
                        <div>
                            <div class="w3-margin-right" id="Closed_Orders" name="Closed_Orders" style="max-height: 700px; overflow: scroll;">
                                <table class="table table-bordered table-responsive" >            <!-- table starts here -->
                                    <tr >
                                        <th class="text-center">SR. No</th>
                                        <th class="text-center">Product&nbsp;Name</th>  
                                        <th class="text-center">ID</th>              
                                        <th class="text-center">OD</th>              
                                        <th class="text-center">Length</th>              
                                        <th class="text-center">Quantity</th>         
                                        <th class="text-center">Actions</th>                                           
                                    </tr>
                                    <tbody><!-- table body starts here -->
                                        <?php
                                        ?>
                                    </tbody><!-- table body close here -->
                                </table><!-- table closed here -->
                            </div>
                        </div>
                    </div>
                </div><!-- table container ends here -->
            </div>
            <!-- ___________________________tab 3 div ends here__________________________________ -->
        </div><!-- tab containt ends here -->
    </div><!-- tab containt div ends here -->
</div><!-- container for tab -->
<!--_______________________ div for main container____________________________ -->

