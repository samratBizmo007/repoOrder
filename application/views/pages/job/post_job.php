<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>POST JOB</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>css/freelancer.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/stylesheet.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/editor.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/site.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/richtext.min.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>css/js/jquery.richtext.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/selectize.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/index.js"></script>
    <!---<script src="bootstrap/dist/js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>dist/editor.js"></script>
    <!--    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/country2.js"></script>-->


    <!--    <script>-->
        <!--        $(document).ready(function () {-->
        <!--            print_country("job_country");-->
        <!--        });-->
        <!--    </script>-->
        <style>
        .scrolly::-webkit-scrollbar
        {
            width: 4px;  /* for vertical scrollbars */
        }
        .scrolly::-webkit-scrollbar-track {
            background-color: rgba(0, 0, 0, 0.1);;

        }

        .scrolly::-webkit-scrollbar-thumb
        {
            background: rgba(0, 0, 0, 0.5);
        }
    </style>
<!-- <script>
    $(document).ready(function() {
        $('.content').richText();
    });
</script> -->

<script>
    $(document).ready(function () {
        $("#Requirements").richText();
    });
    $(document).ready(function () {
        $("#Address").richText();
    });
    $(document).ready(function () {
        $("#Responsibility").richText();
    });
</script>
</head>
<body>


    <div id="session_values">
        <?php 
        //start session     
        $user_id=$this->session->userdata('user_id');
        $profile_type=$this->session->userdata('profile_type');

        ?>
        <input type="hidden" id="userValue" value="<?php echo $user_id; ?>">
        <input type="hidden" id="profileValue" value="<?php echo $profile_type; ?>">
    </div>

    <!-- 
    |                                                                                                        |
    ||||||||||||||||||||||||||||||||||||||||||LOGIN/REGISTER FORM STARTS HERE|||||||||||||||||||||||||||||||||||
    |                                                                                                        |  
-->
<div class="w3-container" id="loginDiv_beforeLogin" style="display: none;">
    <div class="w3-middle" id="spinnerDiv"></div>

    <div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
        <div class="row">
            <div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv">
                <div class="alert alert-warning w3-medium">
                    <strong><i class="fa fa-warning"></i> You need to login/register to proceed further</strong> 
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 w3-card-2">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="w3-col l12 w3-margin w3-left" id="message_div">
                            <?php 
                            if(isset($status)!=''){
                                if($status==200){
                                    echo '<center><label class="w3-green w3-padding-small w3-round"><i class="fa fa-check "></i>  '.$status_message.'.</label></center>';
                                }
                                else{
                                    echo '<center><label class="w3-red w3-padding-small w3-round"><i class="fa fa-warning "></i>  '.$status_message.'.</label></center>';
                                }
                            }
                            ?>

                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login_form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register_form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12" id="Login_RegisterDiv">
                                <form id="login_form" role="form" style="display: block;">
                                    <div class="w3-col l12 " id="login_err"></div>
                                    <div class="form-group">
                                        <select name="login_profile_type" id="login_profile_type" tabindex="1" class="form-control">
                                            <option class="w3-red" selected <?php if($this->uri->segment(2)=='') echo 'selected'; ?> value="0">Select profile type</option>
                                            <option value="4" selected>Job Employer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="login_username" id="login_username" tabindex="2" class="form-control" placeholder="Username" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="login_password" id="login_password" tabindex="3" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="4" class="" name="login_remember" id="login_remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login_login_submit" id="login_login_submit" tabindex="5" class="form-control btn btn-login bluishGreen_bg" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" tabindex="5" id="forget_link" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form id="forget_password" action="" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <select name="forget_profile_type" id="forget_profile_type" tabindex="1" class="form-control">
                                            <option class="w3-light-grey" value="0">Select profile type</option>
                                            <option class="" value="2" selected>Freelance Employer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="forget_email" id="femail" tabindex="1" class="form-control" placeholder="Enter your Email Address" value="" required>
                                    </div>
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn bluishGreen_bg" value="Submit">
                                    </div>
                                </form>

                                <form id="register_form" role="form" style="display: none;">
                                    <div class="w3-col l12 " id="registration_err"></div>
                                    <div class="form-group">
                                        <select name="register_profile_type" id="register_profile_type" tabindex="1" class="form-control">
                                            <option class="w3-light-grey" selected <?php if($this->uri->segment(2)=='') echo 'selected'; ?> value="0">Select profile type</option>
                                            <option value="4" selected>JobSeeker Employer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="register_username" id="register_username" tabindex="2" class="form-control" placeholder="Username" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="register_email" id="register_email" tabindex="4" class="form-control" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="register_password" onkeyup="checkPassword();" id="register_password" tabindex="4" class="form-control" placeholder="Password" minlength="8" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="register_confirm_password" id="register_confirm_password" tabindex="5" onkeyup="checkPassword();" class="form-control" minlength="8" placeholder="Confirm Password" required>
                                    </div>
                                    <div id="message"></div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register_register_submit" id="register_register_submit" tabindex="5" class="form-control  btn btn-register bluishGreen_bg" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            $('#login_form-link').click(function(e) {
                $("#login_form").delay(100).fadeIn(100);
                $("#register_form").fadeOut(100);
                $("#forget_password").fadeOut(100);
                $('#login_form-link').html('<i class="fa fa-unlock-alt"></i> Login');
                $('#register_form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register_form-link').click(function(e) {
                $("#register_form").delay(100).fadeIn(100);
                $("#login_form").fadeOut(100);
                $("#forget_password").fadeOut(100);
                $('#login_form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#forget_link').click(function(e) {
                $("#forget_password").delay(100).fadeIn(100);
                $("#login_form").fadeOut(100);
                $('#login_form-link').html('<i class="fa fa-unlock"></i> Forget Password');
                $('#register_form-link').html('');
                $('#login_form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

        });

    </script>

    <script>
        $(function () {
            $("#forget_password").submit(function (e) {
                e.preventDefault();
                dataString = $("#forget_password").serialize();

                $("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
                $.ajax({
                    type: "POST",
                    url: BASE_URL+"auth/login/get_forget_password",
                    dataType : 'text',
                    data: dataString,
                return: false, //stop the actual form post !important!
                success: function (data)
                {
                    //alert(data);
                    var key=JSON.parse(data);
                    
                    $("#spinnerDiv").html('');
                    if(key.status == 200){                    

                        $('#Login_RegisterDiv').load(location.href + " #Login_RegisterDiv>*", ""); 
                        $('#login_form-link').html('<i class="fa fa-unlock-alt"></i> Login');
                        $("#messageDiv").html('<div class="alert alert-success" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div><div class="col-lg-12 alert alert-info alert-dismissable fade in"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><strong><i class="fa fa-warning"></i></strong>Please Check your Email... We have sent your password on your Registered Email-ID..!</span></div>');                       

                    }else{ 
                        $("#messageDiv").html('<div class="alert alert-danger" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div>');
                    }
                }
            });
            return false;  //stop the actual form post !important!
        });
        });
    </script>

    <script>
    //  -------------------REGISTER FORM------------------------ //
    $(function () {
        $("#register_form").submit(function () {
            dataString = $("#register_form").serialize();

            $("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
            $.ajax({
                type: "POST",
                url: BASE_URL + "auth/login/register_beforeSubmit",
                data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data){  
                var key=JSON.parse(data);
                $("#spinnerDiv").html('');
                if(key.status=='200'){
                    $("#session_values").load(location.href + " #session_values>*", "");
                    $("#postJobDiv").show();
                    $("#loginDiv_beforeLogin").hide();
                }
                else{
                    $("#message_div").html('<div class="alert alert-danger"><strong>'+key.status_message+'</strong></div>');
                }
            }
        });
        return false;  //stop the actual form post !important!
    });
    });
//  --------------------END --------------------------------- //
</script>

<script>
    //  ------------------------LOGIN FORM -------------------------//
    $(function () {
        $("#login_form").submit(function () {
            dataString = $("#login_form").serialize();
            jobString = $("#post_jobForm").serialize();
            $("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
            $.ajax({
                type: "POST",
                url: BASE_URL + "auth/login/login_beforeSubmit",
                data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                var key=JSON.parse(data);
                $("#spinnerDiv").html('');
                if(key.status=='200'){

                    $.ajax({
                        type: "POST",
                        url: BASE_URL + "job/Post_jobs/SaveJOB",
                        data: jobString,
                        success: function (html){
                            $.alert(html);
                        }
                    });
                }
                else{
                    $("#login_err").html('<div class="alert alert-danger"><strong>'+key.status_message+'</strong></div>');
                }
            }
        });
        return false;  //stop the actual form post !important!
    });
    });
//  -------------------------END -------------------------------//

</script>
<script>
    //-------------------fucntion to check confirm password---------------
    function checkPassword() {
        if ($('#register_password').val() == $('#register_confirm_password').val()) {
            $('#register_register_submit').prop("disabled", false);
            $('#message').html('');
        } else {
            $('#message').html('<label>Password Not Matching</label>').css('color', 'red');
            $('#register_register_submit').prop("disabled", true);
        }
    }
//-----------function ends------------------------
</script>

</div>




    <!-- 
    |                                                                                                        |
    ||||||||||||||||||||||||||||||||||||||||||POST JOB FORM STARTS HERE|||||||||||||||||||||||||||||||||||
    |                                                                                                        |  
-->
<div class="container w3-margin-bottom w3-padding-bottom" id="postJobDiv">
	<label><h2 class="bluishGreen_txt w3-margin-left w3-padding-left"><b><i class="fa fa-briefcase"></i> Post Job</b></h2></label>



    <div class="w3-col l12 ">
        <div class="col-lg-2"></div>
        <div class=" w3-col l8 bind-main">
            <!-- /////////////////-Div to bind for project Description/////////////////////-->
            <div class=" w3-margin-top" id="post_job">
                <!--/////////////// div for project description////////////////////////////-->
                <form id="post_jobForm" name="post_jobForm" >
                    <div class=" w3-container">
                        <div class="w3-col l12">
                            <div class="col-lg-6">
                                <label class="w3-small">Job Name :</label>
                                <span class="w3-text-red">*</span>                                                                          
                                <input  type="text" name="jobpost_name" id="jobpost_name" class="form-control" placeholder="Post Name..." required>
                            </div>
                            <div class="col-lg-6">
                                <label class=" w3-small">Company :</label>
                                <span class="w3-text-red">*</span>                                                                          
                                <input  type="text" name="Company_name" id="Company_name" class="form-control" placeholder="Company Name..." required>
                            </div>
                        </div>
                    </div>
                    <div class="w3-container" style="padding: 28px">
                        <label class="w3-small  " >Educational Qualification :</label>
                        <!--                        <div class="col-lg-12 scrolly page-wrapper box-content" style="padding-right: 5px;max-height: 350px;">-->
                            <textarea id="Requirements" name="Requirements" class="content" rows="4 " cols="50" placeholder="Describe Requirements..." ></textarea> 
                            <!--                        </div>-->
                        </div>

                        <div class="w3-container" style="padding: 28px">
                            <label class=" w3-small w3-margin-top" style="margin-top:30px;">Responsibility :</label>
                            <!--                        <div class="col-lg-12 scrolly page-wrapper  w3-padding box-content" style="padding-right: 5px;max-height: 350px;">-->
                              <textarea id="Responsibility" name="Responsibility" class="content" rows="4 " cols="50" placeholder="Describe Responsibilities..." ></textarea> 
                              <!--                        </div>-->
                          </div>
                          <div class=" w3-container">

                            <div class="col-lg-6">
                                <label class=" w3-small w3-margin-top">Choose Categories :</label>
                                <span class="w3-text-red">*</span>                                    
                                <select id="categories" name="categories" class="form-control" placeholder="Select Job Type..." required>
                            		<?php foreach ($all_categories['status_message'] as $row) { ?>  
                                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['jm_category_name']; ?></option>
                                    <?php } ?>            
                                </select>    
                            </div>

                        </div>
                        <div class="w3-container" w3-margin-top">

                            <div class="col-lg-6" id="selectDiv">
                                <label class=" w3-small">Required Skills :</label>
                                <span class="w3-text-red">*</span>                                  
                                <select id="select-skill" style="width: 100%; top: 36px; height: 34px; left: 0px;" name="skill[]" multiple class="selectized" placeholder="Select a skill..." required>
                                   <!--  <?php 
                                    foreach ($all_skills['status_message'] as $row) { ?>	
                                    <option value="<?php echo $row['jm_skill_id']; ?>"><?php 
                                    echo $row['jm_skill_name']; ?></option>
                                    <?php } ?> -->
                                </select>
                                <!-- <script>$('#select-skill').selectize({});</script> -->
                            </div>
                            <div class="col-lg-6">
                                <label class=" w3-small">Job Type :</label>
                                <span class="w3-text-red">*</span>                                    
                                <select id="select_jobType" name="select_jobType"  class="form-control" placeholder="Select Job Type..." required>
                                    <option value="Full_Time">Full Time</option>
                                    <option value="Part_Time">Part Time</option>
                                    <option value="Intern">Intern</option>                                        
                                </select>                                    
                            </div>

                        </div>
                        <div class=" w3-container" style="padding: 28px" >
                            <label class="w3-small">Date & Venue Address :</label>
                            <!--                        <div class="col-lg-12 page-wrapper  box-content" style="padding-right: 5px;max-height: 350px;">-->
                                <textarea id="Address" name="Address" class="content" rows="4 " cols="50" placeholder="Describe Job Address And Date..." ></textarea> 
                                <!--                        </div>-->
                            </div>
                            <div class="w3-container w3-margin-top">
                                <div class="w3-col l12">
                                    <div class="col-lg-6 w3-padding-right">
                                        <label class="w3-small">Salary Range :</label>
                                        <span class="w3-text-red">*</span>
                                        <select required id="Salary_range" name="Salary_range" class="form-control" placeholder="Select a skill..." required>
                                            <option value="0">Do Not Disclose</option>
                                            <option value="0-1 LPA">0-1 LPA</option>
                                            <option value="1-2 LPA">1-2 LPA</option>
                                            <option value="2-3 LPA">2-3 LPA</option>
                                            <option value="3-4 LPA">3-4 LPA</option>
                                            <option value="4-5 LPA">4-5 LPA</option>
                                            <option value="More Than 5 LPA">More Than 5 LPA</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-6 ">
                                        <label class="w3-small">Positions:</label>
                                        <span class="w3-text-red">*</span>                                        
                                        <input  type="number" name="Positions" id="Positions" min="1" class="form-control" placeholder="No Of Positions..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="w3-container">
                                <div class="w3-col l12">
                                    <div class="col-lg-4">
                                        <label class="w3-small">Country:</label>
                                        <span class="w3-text-red">*</span>
                                        <!--         	<span id = "countrydata" name = "countrydata" style = "color:red; display: block;">&nbsp;</span>-->
                                        <select class=" form-control"   id="user_country" name="user_country" required>
                                         <?php 
                                         foreach ($country['status_message'] as $key){?>
                                         <option value="<?php echo $key['id']; ?>"  <?php if($jm_userCountry == $key['id']){ echo 'selected=selected'; } ?> ><?php echo $key['name']; ?></option>
                                         <?php }
                                         ?>
                                     </select>
                                 </div>

                                 <div class="col-lg-4">
                                    <label class="w3-small">State:</label>
                                    <span class="w3-text-red">*</span>
                                    <!--         	<span id = "statedata" name = "statedata" style = "color:red; display: block;">&nbsp;</span>-->
                                    <select class="form-control" name="user_state" id="user_state" required>
                                     <?php if($jm_userState != ''){?>
                                     <option value="<?php echo $jm_userState ?>"><?php echo $jm_userState ?></option>
                                     <?php } //echo $jm_userState; ?>
                                 </select>
                             </div>

                             <div class="col-lg-4">
                                <label class="w3-small">City:</label>
                                <span class="w3-text-red">*</span>
                                <input class="form-control" type="text" pattern="^[_A-z]{1,}$" oninvalid="this.setCustomValidity('No whitespaces, special characters and numeric values allowed.')" oninput="setCustomValidity('')" placeholder="Enter your city" id="Job_Location" name="Job_Location" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="w3-container w3-margin-top">
                        <div class="col-lg-12 w3-center">                            
                            <input type="submit" class="btn btn-lg w3-text-white w3-center" value="Submit Job" style=" background-color: #00B59D;">               										
                            <span class=""></span>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
//----this fun is used to add job details information---------------------//
$(function () {
    $("#post_jobForm").submit(function (e) {
        e.preventDefault();
        var $Requirements = $("#Requirements");
        //$Requirements.text($Requirements.richText("getText"));
        $Requirements=$("#Requirements").richText("getContent");

        var $Address = $("#Address");
       // $Address.text($Address.richText("getText"));
       $Address=$("#Address").richText("getContent");

       var $Responsibility = $("#Responsibility");
       // $Responsibility.text($Responsibility.richText("getText"));
       $Responsibility=$("#Responsibility").richText("getContent");

       dataString = $("#post_jobForm").serialize();
       var user_id=$('#userValue').val();
       var profile_id=$('#profileValue').val();

       $("#session_values").load(location.href + " #session_values>*", "");
       if(user_id=='' || profile_id==''){
        $("#postJobDiv").hide();
        $("#loginDiv_beforeLogin").show();
        $('html,body').animate({
            scrollTop: $("#loginDiv_beforeLogin").offset().top},
            'slow');
    }
    else{               
     $.ajax({
        type: "POST",
        url: BASE_URL + "job/Post_jobs/SaveJOB",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
            // return: false, //stop the actual form post !important!
            success: function (data){
         		//alert(data);
                $.alert(data);
            }
        });
 }

                    return false;  //stop the actual form post !important!
                });
});
//this fun is used to add job details ends here----------------------------------//
</script>
<script>   
  $(document).ready(function () {
      $("#user_country").change(function(){
        var country_id = $('#user_country').val();
        //$("#state").load(location.href + " #state>*", "");
        //alert(country_id);
        $('#user_state').html('');
        $.ajax({
            type: "POST",
            url: BASE_URL + "job/Post_jobs/getStateby_country",
            data: {
               country_id: country_id 
           },  
           dataType: "text",
        return: false, //stop the actual form post !important!
        success: function (data)
        {
            //alert(data);
            var obj = JSON.parse(data);
            //alert(obj.status_message[0].name);
            for(var i=0; i<(obj.status_message).length; i++){
                $('#user_state').append('<option value="'+obj.status_message[i].name+'">'+obj.status_message[i].name+'</option>');
            }           
        }
    });
    return false; //stop the actual form post !important!
});
  });
</script>
<script >
    // SELECT BOX DEPENDENCY CODE
    $(document).ready(function()
    {
        $("#categories").change(function()
        {
            $("#selectDiv").load(location.href+" #selectDiv>*", "");  
            var category_id=$('#categories').val();
            var dataString = 'category_id='+category_id;
            $('#selectDiv').html('<span class="w3-text-grey w3-small"><i class="fa fa-circle-o-notch fa-spin"></i> Loading skills</span>');
            $.ajax
            ({
              type: "POST",
              url: BASE_URL+"job/post_jobs/getSkill_byCategory",
              data: dataString,
              //cache: false,
              //dataType: "text",
              success: function(data)
              {
                var key=JSON.parse(data);

                if(key['status'] == '200'){
                    for(var i=0; i<(key['status_message']).length; i++){                                              
                        $('#select-skill').append('<option value="'+key['status_message'][i]['jm_skill_id']+'"><b>'+key['status_message'][i]['jm_skill_name']+'</b></option>');
                    }
                    $('#select-skill').selectize({});
                }
            }
        }).done(function() {
        });                                    
    });

    });

</script>
<!-- <script >
    // SELECT BOX DEPENDENCY CODE
    $(document).ready(function()
    {
            $("#selectDiv").load(location.href+" #selectDiv>*", "");  
            var category_id=$('#categories').val();
            var dataString = 'category_id='+category_id;

            $.ajax
            ({
              type: "POST",
              url: BASE_URL+"job/post_jobs/getSkill_byCategory",
              data: dataString,
              cache: false,
              //dataType: "text",
              success: function(data)
              {
                alert(data);
                var key=JSON.parse(data);

                if(key['status'] == '200'){
                    for(var i=0; i<(key['status_message']).length; i++){                                              
                        $('#select-skill').append('<option value="'+key['status_message'][i]['jm_skill_id']+'"><b>'+key['status_message'][i]['jm_skill_name']+'</b></option>');
                    }
                    $('#select-skill').selectize({});
                }
            }
        }).done(function() {
        });                                    

    });

</script> -->
</body>
</html>
