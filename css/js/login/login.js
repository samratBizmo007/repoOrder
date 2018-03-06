//  -------------------REGISTER FORM------------------------ //
$(function () {
    $("#register_form").submit(function () {
        dataString = $("#register_form").serialize();

        $("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
        $.ajax({
            type: "POST",
            url: BASE_URL + "login/registerCustomer",
            dataType : 'text',
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data){
                console.log(data);  
                var key=JSON.parse(data);
                if(key.status == 200){                    
                    $('#Login_RegisterDiv').load(location.href + " #Login_RegisterDiv>*", ""); 
                 $("#spinnerDiv").html('');
                 $("#messageDiv").html('<div class="alert alert-success" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div><div class="col-lg-12 alert alert-info alert-dismissable fade in"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><strong><i class="fa fa-warning"></i></strong>Please Verify Email..Sent To Your Registered Email-ID..!</span></div>');
                 window.setTimeout(
                    function(){
                        location.reload(true)
                    },
                    3000
                    );   
             }else{ 
                $("#spinnerDiv").html('');               
                $("#messageDiv").html('<div class="alert alert-danger" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div>');
            }
        }
    });
        return false;  //stop the actual form post !important!
    });
});
//  --------------------END --------------------------------- //

//  ------------------------LOGIN FORM -------------------------//
$(function () {
    $("#login_form").submit(function () {
        dataString = $("#login_form").serialize();

        $("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
        $.ajax({
            type: "POST",
            url: BASE_URL + "auth/login/login_auth",
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                $("#spinnerDiv").html('');
                $("#login_err").html(data);
            }
        });
        return false;  //stop the actual form post !important!
    });
});
//  -------------------------END -------------------------------//

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


