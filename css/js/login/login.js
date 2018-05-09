//  -------------------REGISTER FORM------------------------ //
$(function () {
    $("#register_form").submit(function () {
        dataString = $("#register_form").serialize();
        // alert(dataString);
        $.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: BASE_URL + "registration/registerCustomer",
            dataType : 'text',
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data){
                $.LoadingOverlay("hide");
               // alert(data);  
                if(navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
                    $("html,body").animate({scrollTop:0},"slow");
                    document.scrollingElement.scrollTop;
                } else {
                   $("html,body").animate({scrollTop:0},"slow");
               }
               $("#spinnerDiv").html('');
               $("#registration_err").html(data);
               
           }
       });
        return false;  //stop the actual form post !important!
    });
});
//  --------------------END --------------------------------- //


//  -------------------REGISTER FORM------------------------ //
//$(function () {
//    $("#register_form").submit(function () {
//      
//        dataString = $("#register_form").serialize();
//        $("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
//        $.ajax({
//            type: "POST",
//            url: BASE_URL + "login/registerCustomer",
//            dataType : 'text',
//            data: dataString,
//            return: false, //stop the actual form post !important!
//            success: function (data){
//                //console.log(data);  
//                var key=JSON.parse(data);
//                if(key.status == 200){  
//                  //$('#OTP_div').css('display','block');
//                  $('#hide_div').css('display','block');
//                  $('#message_div').css('display','block');
//                  $('#heading_div').css('display','block');
//                  $('#Login_RegisterDiv').css('display','block');
//                       // $('#OTP_div').css('display','block');
//                        $('#registerDiv').css('display','block');
//                $('#user_id').val(key.user_id);   
//                $('#OTP_id').val(key.otp);    
//                 //$('#Login_RegisterDiv').load(location.href + " #Login_RegisterDiv>*", ""); 
//                 $("#spinnerDiv").html('');
//                 $("#messageDiv").html('<div class="alert alert-success" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div>');
//                 window.setTimeout(
//                    function(){
//                       // location.reload(true)
//                    },
//                    2000
//                    );   
//             }else{ 
//                $("#spinnerDiv").html('');               
//                $("#messageDiv").html('<div class="alert alert-danger" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div>');
//            }
//        }
//    });
//        return false;  //stop the actual form post !important!
//    });
//});
//  --------------------END --------------------------------- //

//  ------------------------LOGIN FORM -------------------------//
$(function () {
    $("#login_form").submit(function () {
        dataString = $("#login_form").serialize();

        $.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: BASE_URL + "login/loginCustomer",
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                $.LoadingOverlay("hide");
                if(navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
                    $("html,body").animate({scrollTop:0},"slow");
                    document.scrollingElement.scrollTop;
                } else {
                   $("html,body").animate({scrollTop:0},"slow");
               }
               
               $("#spinnerDiv").html('');
               $("#login_err").html(data);
           }
       });
        return false;  //stop the actual form post !important!
    });
});
//  -------------------------END -------------------------------//

//  ------------------------LOGIN FORM -------------------------//
$(function () {
    $("#Adminlogin_form").submit(function () {
        dataString = $("#Adminlogin_form").serialize();
        $.LoadingOverlay("show");

        $.ajax({
            type: "POST",
            url: BASE_URL + "admin_login/adminLogin",
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                $.LoadingOverlay("hide");
                if(navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
                    $("html,body").animate({scrollTop:0},"slow");
                    document.scrollingElement.scrollTop;
                } else {
                   $("html,body").animate({scrollTop:0},"slow");
               }
               
               $("#spinnerDiv").html('');
               $("#login_err").html(data);
            }
        });
        return false;  //stop the actual form post !important!
    });
});
//  -------------------------END -------------------------------//

//-------------------REGISTER FORM------------------------ //
$(function () {
    $("#admin_register_form").submit(function () {
        dataString = $("#admin_register_form").serialize();
         // alert(dataString);
        $.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: BASE_URL + "admin_login/admin_registration",
            dataType : 'text',
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data){
              // alert(data);
                $.LoadingOverlay("hide");
               // console.log(data);  
                if(navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
                    $("html,body").animate({scrollTop:0},"slow");
                    document.scrollingElement.scrollTop;
                } else {
                   $("html,body").animate({scrollTop:0},"slow");
               }
               $("#spinnerDiv").html('');
               $("#registration_err").html(data);
                 $('form :input').val("");
               
           }
       });
        return false;  //stop the actual form post !important!
    });
});
//  --------------------END --------------------------------- //







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


