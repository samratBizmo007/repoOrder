
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
           <?php 
               if($orders['status'] == 200) {//print_r($Purchased['status_message']);
               $count=1;
               $value = '';

               for ($i = 0; $i < count($orders['status_message']); $i++) { 
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
                echo'<tr id="divID" onclick="slidedownn('.$value['jm_user_id'].');">               
                <td class="text-center">' . $count . '.</td>
                <td class="text-center">#OID-'.$orders['status_message'][$i]['order_id'].'</td>
                <td class="text-center">'.date('M d,Y', strtotime($orders['status_message'][$i]['order_date'])).'-'.date('h:i a', strtotime($orders['status_message'][$i]['order_time'])).'</td>
                <td class="text-center">
                <a class="btn w3-padding-small" data-toggle="modal" data-target="#myOrder_'.$orders['status_message'][$i]['order_id'].'" title="view order" style="padding:0"><i class="fa fa-eye"></i></a>
                <a class="btn w3-padding-tiny" id="delOrder_btn" name="delOrder_btn" onClick="delOrder('.$orders['status_message'][$i]['order_id'].')" title="delete order"><i class="fa fa-remove"></i></a>
                </td>                                  
                <a style="padding:2px" class="w3-medium btn '.$hide.'" onclick="awardProject('.$value['jm_user_id'].',\''.$value['jm_username'].'\','.$value['jm_project_id'].')" title="Award Project" ><i class="fa fa-trophy" style="color: #1fbea9"></i> </a>
                <a href="" style="padding:2px" class="w3-medium btn" title="Chat with '.$value['jm_username'].'"><i class="fa fa-weixin" style="color: #1fbea9"></i> </a></td>
                </tr>';
                
                echo'<tr id="slideDIV_'.$value['jm_user_id'].'" style=" display: none;">
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
        
    //-----this script is used to save the bidding and upload file for project cover letter-----------------// 
    $(function () {
      $("#Bidding_Form").submit(function (e) {
        e.preventDefault();
        dataString = $("#Bidding_Form").serialize();
            //$.alert(dataString);
            $.ajax({
              type: "POST",
              url: BASE_URL + "project/View_project/saveProjectBidding",
              data:  new FormData(this),
              contentType: false,
              cache: false,
              processData:false,
               // return: false, //stop the actual form post !important!
               success: function (data)
               {
                $.alert(data);
                // $("#Bidding_Form").load(location.href + "Bidding_Form>*", "");
              }               
            });          
            return false;  //stop the actual form post !important!
          });
    });
    //-----this script is used to save the bidding and upload file for project cover letter-----------------//
  </script>
  
</body>
</html>
