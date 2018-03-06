

<div class="w3-col l12  w3-margin-bottom" id="showResult">
    <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-striped table-hover">          
            <thead>
                <tr class="w3-light-grey">
                    <th class="text-center"><h6>#</h6></th>
                    <th class="text-center"><h6>Name</h6></th>
                    <th class="text-center"><h6>Designation</h6></th>
                    <th class="text-center"><h6>Expected Salary</h6></th>
                    <th class="text-center"><h6>City</h6></th>
                    <th class="text-center"><h6>Email-ID</h6></th>
                    <th class="text-center"><h6>Action</h6></th>
              </tr>
        </thead>
        <tbody>
              <?php $i=1; 
              foreach ($result as $key => $value) { ?>
              <tr>
                  <td class="text-center"><?php echo $i.'.'; ?></td>
                  <td class="text-center"><?php if($value['jm_user_name']!='') {echo $value['jm_user_name'];}else{ echo '<b>Not Available</b>';} ?></td>
                  <td class="text-center"><?php if($value['jm_userDesignation']!='') {echo $value['jm_userDesignation'];}else{ echo '<b>Not Available</b>';} ?></td>
                  <td class="text-center"><?php if($value['expected_salary']!='') {echo $value['expected_salary'];}else{ echo '<b>N/A</b>';} ?></td>
                  <td class="text-center"><?php if($value['jm_userCity']!='') {echo $value['jm_userCity'];}else{ echo '<b>N/A</b>';} ?></td>
                  <td class="text-center"><?php echo $value['jm_email_id']; ?></td>
                  <td class="text-center"><?php  ?>
                      <a style="padding:2px" class="w3-medium btn " title="View Profile Card" ><i class="fa fa-address-card-o" style="color: #1fbea9" data-toggle="modal" data-target="#Profile_<?php echo $value['jm_user_id']; ?>"></i> </a>
                      <a href="" style="padding:2px" class="w3-medium btn " title="Chat with <?php echo $value['jm_username']; ?>"><i class="fa fa-weixin" style="color: #1fbea9"></i> </a></td>
                </tr>

                <!-- Modal -->
                <div id="Profile_<?php echo $value['jm_user_id']; ?>" class="modal fade" role="dialog"><!--  modal for vshow portfolio information -->
                      <div class="modal-dialog modal-md">
                          <!-- Modal content-->
                          <div class="modal-content">

                              <div class="modal-body w3-small w3-round-large">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <div class="w3-container w3-margin-bottom" >
                                      <div class="w3-col l12 w3-padding" >
                                          <div class="w3-col l4 w3-margin-top w3-round-large">
                                              <img class="img img-thumbnail" alt="Profile Image not found" style="height: 70%; width: 70%; object-fit: contain" src="<?php echo base_url().''.$value['jm_profile_image']; ?>" onerror="this.src='<?php echo base_url()?>css/logos/default_noimage.jpg'">
                                        </div>
                                        <div class="w3-col l8">
                                              <h4 class=""><?php echo $value['jm_user_name']; ?></h4>
                                              <div class="w3-col l12"><span class="w3-medium"><?php echo $value['jm_userDesignation']; ?></span></div>                              
                                              <?php

                                              echo 
                                              '<span class="w3-small">';
                                              if($value['jm_userCity']!=''){
                                                 echo '<i class="w3-large fa fa-map-marker"></i> '.$value['jm_userCity'].', '.$value['jm_userState'].', '.$value['jm_userCountry'].'</span>';
                                           }
                                           echo '<br>
                                           <span class="w3-tiny w3-text-grey">Member since '.date('M d,Y', strtotime($value['joining_date'])).'</span>';
                                           ?>                                
                                     </div>
                               </div> 
                               <div class="w3-col l12 w3-white w3-round">
                                    <div class="w3-col l6 w3-padding-small">
                                        <div class="w3-col l12"><label class="w3-medium">About Me</label></div>
                                        <div class="w3-col l12 w3-text-grey">
                                            <p>
                                                <?php 
                                                if($value['jm_userDescription']=='' || $value['jm_userDescription']=='<div><br></div>'){
                                                    echo 'No Description Available.';
                                              }
                                              else{
                                                    echo $value['jm_userDescription'];

                                              }
                                              ?>
                                        </p>
                                  </div>
                            </div>
                            <div class="w3-col l6 w3-padding-small">
                              <div class="w3-col l12"><label class="w3-medium">My Aspirations</label></div>
                              <div class="w3-col l12 w3-text-grey">
                                  <p>
                                      <?php 
                                      if($value['jm_userAspiration']=='' || $value['jm_userAspiration']=='<div><br></div>'){
                                          echo 'Not Available';
                                    }
                                    else{
                                          echo $value['jm_userAspiration'];                                  
                                    }
                                    ?>
                              </p>
                        </div>
                  </div>
            </div> 

      <div class="w3-col l12 ">
                        <div class="w3-col l6 w3-padding-small">
                          <label>Educational Details:</label>
                          <?php 
                                 //print_r($value['jm_education']);
                          if($value['jm_education']!='' || $value['jm_education']!='[]'){
                            foreach (json_decode($value['jm_education'],TRUE) as $key) {
                            	//echo $key['jm_course'];
                              echo '<li class="w3-text-grey"><b>'.$key['jm_course'].'</b> from <b>'.$key['jm_university'].'</b> passing year <b>'.$key['jm_passing_year'].'</b></li>';
                            }
                          }
                          else{
                            echo '<b>Not Available</b>';
                          }
                          ?>
                        </div>
                        <div class="w3-col l6 w3-padding-small">
                          <label>Experience Details:</label>
                          <?php 
                          //	print_r($value['jm_experience']);
                          if($value['jm_experience']!='' || $value['jm_experience']!=''){
                          	//echo "check if";
                            foreach (json_decode($value['jm_experience'],TRUE) as $key) {
                            	//echo($key);die();
                           // echo $key['jm_worked_till'];
                              echo '<li class="w3-text-grey"><b>'.$key['jm_designation'].'</b> at <b>'.$key['jm_organisation'].'</b> till <b>'.$key['jm_worked_till'].'</b></li>';
                            }
                          }
                          else{
                          	//echo "check else";
                            echo '<b>Not Available</b>';
                          }
                          ?>

                        </div>
                      </div>                          
</div>
</div>  
</div>
</div>
</div>
<!-- modal ends here -->
<?php $i++; } ?>
</tbody>
</table>
</div><!--end of .table-responsive--> 
</div>
<div class="w3-col l3 w3-padding"></div>
