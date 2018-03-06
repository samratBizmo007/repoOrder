<?php //echo '<pre>';print_r($result); 
error_reporting(E_ERROR | E_PARSE); ?>

<div class="col-lg-12 w3-padding-small" id="showResult">
        <div class="table-responsive">
          <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-striped table-hover">          
            <thead>
              <tr class="w3-light-grey">
                <th class="text-center"><h6>#</h6></th>
                <th class="text-center"><h6>Name</h6></th>
                <th class="text-center"><h6>Designation</h6></th>
                <th class="text-center"><h6>Average Ratings</h6></th>
                <th class="text-center"><h6>City</h6></th>
                <th class="text-center"><h6>Email-ID</h6></th>
                <th class="text-center"><h6>Action</h6></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; 
              foreach ($result as $key => $value) { 
                    $rating = $value['jm_avg_rating'];
                  $rate = explode(".", $rating);
                  if ($rate[1] == 0) {
                      $rating = round($rating);
                  } else {
                      $rating = number_format($value['jm_avg_rating'], 1, '.', '');
                  }                                    
                  ?>
              <tr>
                <td class="text-center"><?php echo $i.'.'; ?></td>
                <td class="text-center"><?php if($value['jm_user_name']!='') {echo $value['jm_user_name'];}else{ echo '<b>Not Available</b>';} ?></td>
                <td class="text-center"><?php if($value['jm_userDesignation']!='') {echo $value['jm_userDesignation'];}else{ echo '<b>Not Available</b>';} ?></td>
                <td class="text-center"><span class="stars" data-rating="<?php echo $rating; ?>" data-num-stars="5" ></span></td>
                <td class="text-center"><?php if($value['jm_userDesignation']!='') {echo $value['jm_userCity'];}else{ echo '<b>N/A</b>';} ?></td>
                <td class="text-center"><?php echo $value['jm_email_id']; ?></td>
                <td class="text-center"><?php  ?>
                    <a style="padding:2px" class="w3-medium btn " title="View Profile Card" ><i class="fa fa-address-card-o" style="color: #1fbea9" data-toggle="modal" data-target="#Profile_<?php echo $value['jm_user_id']; ?>" onclick="getpercenteageDetails('<?php echo $value['jm_user_id']; ?>');"></i> </a>
                  <a href="" style="padding:2px" class="w3-medium btn " title="Chat with"><i class="fa fa-weixin" style="color: #1fbea9"></i> </a></td>
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
                         <div class="w3-col l12 w3-white w3-round w3-padding">
                          <div class="w3-col l6 ">
                            <div class="w3-col l12"><label class="w3-medium">About Me</label></div>
                            <div class="w3-col l12 w3-text-grey">
                              <p>
                                <?php 
                                if($value['jm_userDescription']=='' || $value['jm_userDescription']=='<div><br></div>'){
                                  echo 'No Description Available for this Freelancer';
                                }
                                else{
                                  echo $value['jm_userDescription'];
                                  
                                }
                                ?>
                              </p>
                            </div>
                          </div>
                          <div class="w3-col l6  w3-padding-top">
                            <div class="w3-col l6 w3-padding  w3-border-left w3-border-right">
                              <div class="col-lg-12 w3-white w3-center w3-margin-top w3-card w3-padding-small w3-circle prof_pic">
                                <div class="w3-padding-top"><h2><i class="fa fa-inr"></i> <?php echo $value['jm_ratePerHr']; ?></h2>
                                  <span>INR/hr</span></div>
                                </div>
                                <div class="w3-col l12 w3-center">                  
                                  <span class="stars" data-rating="<?php echo $value['jm_avg_rating']; ?>" data-num-stars="5" ></span><br>

                                  <!-- script to dispaly stars -->
                                  <script>
                                    $.fn.stars = function() {
                                      return $(this).each(function() {
                                        var rating = $(this).data("rating");
                                        var numStars = $(this).data("numStars");
                                        var fullStar = new Array(Math.floor(rating + 1)).join('<i class="fa fa-star" style="margin-right:3px"></i>');
                                        var halfStar = ((rating%1) !== 0) ? '<i class="fa fa-star-half-empty" style="margin-right:3px"></i>': '';
                                        var noStar = new Array(Math.floor(numStars + 1 - rating)).join('<i class="fa fa-star-o" style="margin-right:3px"></i>');
                                        $(this).html(fullStar + halfStar + noStar);
                                      });
                                    }
                                    $('.stars').stars();
                                  </script>
                                  <!-- script to dispaly stars ends-->
                                  <span class="w3-text-grey w3-small"><?php echo $value['jm_avg_rating']; ?> Feedback</span>
                                </div>
                              </div>
                              
                            <div class="w3-col l6  w3-tiny">
                            <div class="w3-col l12 w3-small  w3-padding-small">
                              <span><i class="w3-medium fa fa-check-square-o"></i>&nbsp;Jobs Completed</span> 
                              <div class="w3-col l10" style="padding-top: 7px">
                                <div class="w3-round-xlarge progress w3-border"  style="height: 7px ;">
                                    <div class="w3-green progress" id="jobcomplete_<?php echo $value['jm_user_id']; ?>" ></div>              
                                </div>
                              </div>           
                              <div class="w3-col l2">
                                <span class="w3-medium" id="jobcompleted_<?php echo $value['jm_user_id']; ?>" style="padding-top: 0"></span><br>
                              </div>  
                            </div>
                            <!-- progress bar ends -->

                            <!-- progress bar div -->
                            <div class="w3-col l12 w3-small  w3-padding-small">
                              <span><i class="w3-small fa fa-dollar w3-circle"></i>&nbsp;On Budget</span> 
                              <div class="w3-col l10" style="padding-top: 7px">
                                <div class="w3-round-xlarge progress w3-border"  style="height: 7px ;">
                                    <div class="w3-green progress" id="budget_<?php echo $value['jm_user_id']; ?>"></div>              
                                </div>
                              </div>           
                              <div class="w3-col l2">
                                <span class="w3-medium" id="budgetcomplete_<?php echo $value['jm_user_id']; ?>" style="padding-top: 0"><b>&nbsp;<?php// echo number_format($percentage['percentage_budget'],2);?>%</b></span><br>
                              </div>  
                            </div>
                            <!-- progress bar ends -->

                            <!-- progress bar div -->
                            <div class="w3-col l12 w3-small  w3-padding-small">
                              <span><i class="w3-small fa fa-hourglass-half"></i>&nbsp;On Time</span> 
                              <div class="w3-col l10" style="padding-top: 7px">
                                <div class="w3-round-xlarge progress w3-border" style="height: 7px ;">
                                  <div class="w3-green  progress" id="time_<?php echo $value['jm_user_id']; ?>"></div>              
                                </div>
                              </div>           
                              <div class="w3-col l2">
                                <span class="w3-medium" id="timecomplete_<?php echo $value['jm_user_id']; ?>" style="padding-top: 0"><b>&nbsp;<?php// echo number_format($percentage['percentage_time'],2);?>%</b></span><br>
                              </div>  
                            </div>
                            </div>
                              
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


  <script>
      function getpercenteageDetails(user_id){  
    	            $.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>freelancer/Freelancer_list/get_bars_value",
			data: {
                            user_id: user_id
                        },
			return: false,  
			success: function(data){
                        var key=JSON.parse(data);
                        var job_complete = key.percentage.toFixed(2);
                        var budget = key.percentage_budget.toFixed(2);
                        var time = key.percentage_time.toFixed(2);
                        $('#jobcomplete_'+user_id).css('width',+job_complete+'%');
                        $('#jobcompleted_'+user_id).html('<b>&nbsp;'+job_complete+'%</b>');
                        $('#budget_'+user_id).css('width',+budget+'%');
                        $('#budgetcomplete_'+user_id).html('<b>&nbsp;'+budget+'%</b>');
                        $('#time_'+user_id).css('width',+time+'%');
                        $('#timecomplete_'+user_id).html('<b>&nbsp;'+time+'%</b>');
    	            }
    	        });
        }
  $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('Hide');
            }
            else
            {
                currentButton.html('Expand');
            }
        })
    });
  });
</script>