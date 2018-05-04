<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Users</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-users"></i> All Registered Users</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-col l12 w3-margin-top" style="overflow-x: scroll;">
        <div class="w3-col l12 w3-margin-bottom">
          <span class="w3-margin-right"><i class="fa fa-square w3-border w3-text-light-grey"></i> <span class="w3-small">Pending Requests.</span></span>
          <span class="w3-margin-right"><i class="fa fa-square-o w3-border w3-text-white"></i> <span class="w3-small">Processed Requests.</span></span>
        </div>
        <div class="" id="All_users" name="All_users">
          <table class="table table-responsive w3-small"> 
            <!-- table starts here -->
            <thead>
              <tr class="">
                <th class="text-center">Sr.No</th>
                <th class="text-center">User Code</th>
                <th class="text-center">Role</th>
                <th class="text-center">Username</th>
                <th class="text-center">Email-ID</th>
                <th class="text-center">Mobile No.</th>
                <th class="text-center">Action</th>  
              </tr>
            </thead>
            <tbody ><!-- table body starts here -->
              <?php

              $count=0; 
              if($all_users['status']!=500){
                foreach ($all_users['status_message'] as $key) {
                  $count++;
                // -----auto generated password
                  $auto_passwd='';
                  $auto_passwd=md5($key['email'].'#'.$private_key['setting_value']);
                  ?>
                  <tr class="w3-center <?php if($key['status']==0){echo 'w3-light-grey';} ?>">
                    <td><?php echo $count; ?></td>
                    <td><?php echo '#UID-0'.$key['user_id']; ?></td>
                    <td><?php if($key['role']==2){echo '<label class="w3-yellow w3-text-black w3-padding-tiny">Admin</label>';}elseif($key['role']==3){echo '<label class="w3-yellow w3-text-black w3-padding-tiny">Wholesaler</label>';}else{echo '<label class="w3-red w3-text-white">Not Defined</label>';} ?></td>
                    <td><?php echo $key['username']; ?></td>
                    <td><?php echo $key['email']; ?></td>
                    <td><?php echo $key['phone']; ?></td>
                    <td>
                      <?php 
                      $password=substr($auto_passwd, 12, -12);
                      switch ($key['status']) {
                        case '0':
                        echo '
                        <a class="btn w3-padding-small" onclick="apprUser(\''.$key['user_id'].'\',\''.$password.'\')" title="Approve request"><i class="w3-text-green w3-large fa fa-check-circle"></i></a>
                        <a class="btn w3-padding-small" onclick="rejectUser(\''.$key['user_id'].'\')" title="Reject request"><i class="w3-text-red w3-large fa fa-minus-circle"></i></a>
                        ';
                        break;

                        case '1':
                        echo '
                        <label class="badge w3-green" title="User Approved">Approved</label>
                        ';
                        break;

                        case '2':
                        echo '
                        <label class="badge w3-red" title="User Rejected">Rejected</label>
                        ';
                        break;

                        default:
                        echo '
                        <label class="badge w3-orange" title="Value Undefined">Data Undefined</label>
                        ';
                        break;
                      }
                      ?>

                    </td>
                  </tr>
                  <?php 
                }
              }
              else{
                ?>
                <tr>
                  <td colspan="9" class="w3-center"><b><?php echo $all_users['status_message']; ?></b></td>
                </tr>
                <?php 
              } 
              ?>
            </tbody><!-- table body close here -->
          </table>   <!-- table closed here -->
        </div>      
      </div>
    </div>
    <!-- End page content -->
  </div>


  <!-- script to accept or reject registration request -->
  <script type="text/javascript">
    function apprUser(user_id,password)
    {   
      $.confirm({      
        title: '<label class="w3-label w3-medium"><i class="fa fa-lock w3-large"></i> Send Password to User</label>',
        type: 'green',
        content: '' +
        '<form action="" class="formName">' +
        '<div class="form-group">' +
        '<input type="text" placeholder="Enter user password" value="'+password+'" id="auto_passwd" class="w3-border auto_passwd w3-input" required>' +
        '<br><span class="w3-small w3-text-red"><b>[NOTE: You can modify this Auto-generated Password.]</b></span>' +
        '</div>' +
        '</form>',
        buttons: {
          submit: function () {
            var auto_passwd = this.$content.find('#auto_passwd').val();
            $.ajax({
              type:'POST',
              url:"<?php echo base_url(); ?>admin/all_users/apprUser",
              data:{
                user_id:user_id,
                auto_passwd:auto_passwd
              },
            //cache: false,
            success:function(response) {
              $.alert(response);              
              $('#All_users').load(location.href + " #All_users>*", "");
            }
          });
          },
          cancel: function () {}
        }
      });
    }
  </script>
  <!-- script ends here -->

  <!-- script to reject user request -->
  <script>
    function rejectUser(user_id){
      $.confirm({
        title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Reject User Request?</h4>',
        type: 'red',
        content:'',
        buttons: {
          confirm: function () {
            $.ajax({
              url:"<?php echo base_url(); ?>admin/all_users/rejectUser", 
              type: "POST", 
              data: 'user_id='+ user_id,
              cache: false,
              success:function(html){     
                $.alert(html);              
                $('#All_users').load(location.href + " #All_users>*", ""); 
              }
            });
          },
          cancel: function () {

          }
        }
      });

    }
  </script>
  <!-- script ends here -->

</body>
</html>
