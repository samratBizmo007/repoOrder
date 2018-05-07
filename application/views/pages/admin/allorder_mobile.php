
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="w3-container w3-col l12 s12 m12 w3-margin-top ">
    <div class="w3-border" id="All_Orders" name="All_Orders" style="height: 450px;overflow: scroll ">
      <div class="w3-col l12">
        <table>
          <tbody>
           <tbody><!-- table body starts here -->
                    <?php
                                        //print_r($orders);
                    $count = 1;
                    $status = '';
                    $color = '';
                    $value = '';
                    if ($orders['status'] == 200) {
                      for ($i = 0; $i < count($orders['status_message']); $i++) {
                                      //print_r($orders['status_message']);
                        if($orders['status_message'][$i]['business_field'] == 1){
                          $value = 'Mobile Accessories';  
                        } 
                        if($orders['status_message'][$i]['business_field'] == 2){
                          $value = 'Cosmetics';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 3){
                          $value = 'Watch';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 4){
                          $value = 'Glasses';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 5){
                          $value = 'Ladies Bags';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 6){
                          $value = 'Hardware';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 7){
                          $value = 'Wallets';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 8){
                          $value = 'Imitation';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 9){
                          $value = 'Mobile Spare parts';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 10){
                          $value = 'Garments';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 11){
                          $value = 'Baby clothes';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 12){
                          $value = 'Car Spare parts';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 13){
                          $value = 'Perfumes';  
                        }
                        if($orders['status_message'][$i]['business_field'] == 14){
                          $value = 'Other';  
                        }  
                echo'<tr id="divID">               
                <td class="text-center">' . $count . '.</td>
                <td class="text-center">#OID-'.$orders['status_message'][$i]['order_id'].'</td>
                <td class="text-center">' . $orders['status_message'][$i]['username'] . '</td>
                <td class="text-center">' . $orders['status_message'][$i]['order_date'] . '</td>
                <td class="text-center '.$color.'">' .$status. '</td>
                <td class="text-center">
                <a class="btn w3-text-grey w3-medium w3-padding-small" data-toggle="modal" data-target="#myModalnew_' . $orders['status_message'][$i]['order_id'] . '" title="View Order" style="padding:0"><i class="fa fa-eye"></i></a>
                <a class="btn w3-text-grey w3-medium w3-padding-small" title="Open Order" id="OpenOrder_'.$orders['status_message'][$i]['order_id'].'" onclick="Open_Orders('.$orders['status_message'][$i]['order_id'].');" style="padding:0"><i class="fa fa-refresh"></i></a>
                </td>                                  
                <a class="btn w3-text-grey w3-medium w3-padding-small" title="Close Order" id="CloseOrder_'.$orders['status_message'][$i]['order_id'].'" onclick="delOrder('.$orders['status_message'][$i]['order_id'].');" style="padding:0"><i class="fa fa-close"></i></a>
                </tr>';
                
                echo'<tr id="" style=" display: none;">
                <td colspan="4" class="text-left" style="vertical-align: middle;">
                
                </td> 
                </tr>'; 
                ?>
                <?php }}?>
                
              </tbody>         		
            </table>
          </div>
        </div>
      </div>
      

       <script>
        function slidedownn(user_id){
          $("#slideDIV_"+user_id).slideToggle("slow");
          $("#slideDIVnew_"+user_id).slideToggle("slow");
        }
        </script>
     <script>
  function reOpen_Orders(id){
    $.confirm({
      title: '<h4 class="w3-text-green"><i class="fa fa-folder-open"></i> Are you sure you want to Reopen Order!</h4>',
      content:'',
      type: 'green',
      buttons: {
        confirm: function () {
          var dataS = 'order_id='+ id;
          $.ajax({
            url:"<?php echo base_url(); ?>admin/orders/reOpen_Orders", 
            type: "POST", 
            data: dataS,
            cache: false,
            success:function(html){     
              $.alert(html);              
              $('#All_Orders').load(location.href + " #All_Orders>*", ""); 
              $('#Opened_Orders').load(location.href + " #Opened_Orders>*", ""); 
              $('#Closed_Orders').load(location.href + " #Closed_Orders>*", "");
              location.reload();
            }
          });
        },
        cancel: function () {

        }
      }
    });

  }
  function Open_Orders(id){
    $.confirm({
      title: '<h4 class="w3-text-green"><i class="fa fa-folder-open"></i> Are you sure you want to Open Order!</h4>',
      content:'',
      type: 'green',
      buttons: {
        confirm: function () {
          var dataS = 'order_id='+ id;
          $.ajax({
            url:"<?php echo base_url(); ?>admin/orders/reOpen_Orders", 
            type: "POST", 
            data: dataS,
            cache: false,
            success:function(html){     
              $.alert(html);              
              $('#All_Orders').load(location.href + " #All_Orders>*", ""); 
              $('#Opened_Orders').load(location.href + " #Opened_Orders>*", ""); 
              $('#Closed_Orders').load(location.href + " #Closed_Orders>*", "");
                        //location.reload();
                      }
                    });
        },
        cancel: function () {

        }
      }
    });

  }
</script>

<!-- script to delete order -->
<script>
  function delOrder(id){
    $.confirm({
      title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to Close Order!</h4>',
      content: '',
      type: 'red',
      buttons: {
        confirm: function () {
          var dataS = 'order_id='+ id;
          $.ajax({
            url:"<?php echo base_url(); ?>admin/orders/closeOrder", 
            type: "POST", 
            data: dataS,
            cache: false,
            success:function(html){     
              $.alert(html);              
              $('#All_Orders').load(location.href + " #All_Orders>*", ""); 
              $('#Opened_Orders').load(location.href + " #Opened_Orders>*", ""); 
              $('#Closed_Orders').load(location.href + " #Closed_Orders>*", "");
                        //location.reload();
                      }
                    });
        },
        cancel: function () {        
        }
      }
    });

  }
  function regretProduct(prod_no,order_id){
    $.confirm({
      title: '<h4 class="w3-text-orange"><i class="fa fa-minus-square"></i> Are you sure you want to proceed further?</h4>',
      content:'',
      type: 'orange',
      buttons: {
        confirm: function () {

          $.ajax({
            url:"<?php echo base_url(); ?>admin/orders/regretProduct", 
            type: "POST", 
            data: {
              prod_no: prod_no,
              order_id: order_id
            },
            cache: false,
            success:function(html){     
              $.alert(html);              
              
              $('#myModalnew_'+order_id).load(location.href + " #myModalnew_"+order_id+">*", ""); 
              $('#openOrder_'+order_id).load(location.href + " #openOrder_"+order_id+">*", ""); 
            }
          });
        },
        cancel: function () {
          $('#myModalnew_'+order_id).load(location.href + " #myModalnew_"+order_id+">*", ""); 
          $('#openOrder_'+order_id).load(location.href + " #openOrder_"+order_id+">*", ""); 

        }
      }
    });
  }
</script>

</body>
</html>
