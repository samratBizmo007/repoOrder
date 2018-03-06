<?php error_reporting(E_ERROR | E_PARSE);
$class="fa-bookmark-o";
$title="Add Bookmark";
$user_id=$this->session->userdata('user_id');

$userBookmark=array();
if($user_details['status']==200){
  $userBookmark=json_decode($user_details['status_message'][0]['jm_userBookmark'],TRUE);
}
?>
<?php foreach ($result as $key) { 

  $view_link=base_url().'project/view_project/'.base64_encode($key['jm_project_id']);

  if($user_id=''|| $profile_type==''){
    $view_link=base_url().'auth/login?profile=1&payload=ViewProject&value='.base64_encode($key['jm_project_id']);
  }
  $class="fa-bookmark-o";
  $title="Add Bookmark";
  if($userBookmark){ 
    if(in_array($key['jm_project_id'], $userBookmark)){

      $class="fa-bookmark";
      $title="Bookmarked";
    }
  }         
  ?>
  <div class="w3-col l12 w3-padding">              
    <div class="w3-col l12 w3-border-bottom">

      <?php 
      if (($user_id != '') || ($user_name != '') || ($profile_type != '')) { ?> 
      <div class="w3-right w3-margin-right w3-padding-right">
       <a onclick="add_bookmark('<?php echo $user_id ?>','<?php echo $key['jm_project_id'];?>');" title="<?php echo $title ?>" ><i id='project_'<?php echo $key['jm_project_id']; ?> class="fa <?php echo $class; ?>" style="font-size:25px; color: black"></i></a>
     </div>
     <?php } ?> 
     
     <div class="col-lg-8">
      <h4><?php echo $key['jm_project_title'] ?></h4>
      <div>
        <p>
          <div style="max-height:200px;overflow: hidden">
            <?php echo $key['jm_project_description']?><a class="w3-margin-left" href="<?php echo $view_link; ?>"><span style="color:#02b28b"><i>more</i></span></a>
          </div>
        </p>
      </div>
      <div class="w3-col l12" style="overflow-wrap:break-word;">                                
        <div class="w3-padding-bottom w3-medium w3-col l12" id="Skills_<?php echo $key['jm_project_id']; ?>">
          <label>Skills:</label>
        </div>
      </div>
      <div class="w3-col l8 w3-margin-bottom">
        <div class="w3-col l12">
          <div class="w3-col l3 s3 w3-padding-tiny w3-tiny"><b><?php echo $key['jm_job_type']?></b></div>
          
        </div>
      </div>              
    </div>
    <div class="col-lg-4 w3-hide-small">
      <div class="">
        <div class="w3-small w3-col l12 "><b class="w3-right w3-margin-top w3-margin-bottom"><?php echo $key['jm_projectbudget_type']?></b></div>
        <div class="w3-col l12"><a href="<?php echo $view_link; ?>" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a></div>
        <div class=" w3-col l12 w3-small"><span class="w3-right" style="padding-right:5px;margin-top:10px"><?php echo $key['jm_project_bid']?> Proposals</span></div>
        <div class="w3-col 12 w3-padding-tiny w3-margin-top w3-right w3-tiny w3-text-grey"><i class="w3-right">posted <?php echo timeago($key['jm_posting_date'])?></i></div>
      </div>
    </div>
    
    <div class="col-lg-4 w3-hide-large">
      <div class="">
        <div class="w3-small w3-col l6 s6"><b class="w3-left w3-margin-top w3-margin-bottom"><?php echo $key['jm_projectbudget_type']?></b></div>
        <div class="w3-col l6 s6"><a href="<?php echo $view_link; ?>" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a>
        </div>
        
        <div class=" w3-col l12 s6 w3-small">
          <span class="w3-right" style="padding-right:5px; margin-top:10px"><?php echo $key['jm_project_bid']?> Proposals</span></div>
          
          <div class="w3-col l6 s6 w3-padding-tiny w3-margin-top w3-left w3-tiny w3-text-grey"><i class="w3-left">posted <?php echo timeago($key['jm_posting_date'])?></i></div>
        </div>
      </div>
    </div>             
  </div>
  <script>
   $(document).ready(function () {       
     FetchSkills('<?php echo $key['jm_project_id']; ?>','<?php echo $key['jm_project_skill']; ?>');
   });
 </script>
 <?php } ?>
 <script>
   function FetchSkills(jm_project_id,Skills){
    		//alert(jm_project_id);
    		//alert(Skills);  
        $('#Skills_'+jm_project_id).append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');       
        $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>project/Project_listing/Get_Skills",
         dataType: 'text',
         data: {
          jm_project_id: jm_project_id,
          Skills: Skills
        },
        cache: false,
        success: function(data) {
          $('#Skills_'+jm_project_id).html('');
          var key=JSON.parse(data);
    	                //alert(key);
                      for(i=0; i< key.length; i++){
    	                    //$.alert(key[i].jm_skill_name);
    	                    $('#Skills_'+jm_project_id).append('<span span w3-padding><span  class="w3-padding-small w3-round w3-light-grey" style="display:inline-block;margin-top:5px; margin-right: 5px; background-color:#787878;font-size:8px;">'+key[i].jm_skill_name+'</span></span>');
                       }
                     }
                   });
      }
    </script>         