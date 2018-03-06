//  -------------------REGISTER FORM------------------------ //
$(function () {
    $("#select_profileList").change(function () {
        var profile_type = $('#select_profileList').val();

        $.ajax({
            type: "POST",
            url: BASE_URL + "profile/dashboard/change_role",
            data: 'profile_id='+profile_type,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                var profile=profile_type;
                switch (profile) { 
                    case '1': 
                    $("#spinner_label").html('Fetching data for Freelancer...')
                    break;
                    case '2': 
                    $("#spinner_label").html('Fetching data for Freelancer Employer...')
                    break;
                    case '3': 
                    $("#spinner_label").html('Fetching data for Job Seeker...')
                    break;      
                    case '4': 
                    $("#spinner_label").html('Fetching data for Job Employer...')
                    break;
                    
                }
                fetch();
                //$("#mainDiv").load(location.href + " #mainDiv>*", "");
                //get_userSkill();
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

        $.ajax({
            type: "POST",
            url: BASE_URL + "auth/login/login_auth",
            data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                $("#login_err").html(data);
            }
        });
        return false;  //stop the actual form post !important!
    });
});
//  -------------------------END -------------------------------//

 //  ------------------- GET USER SKILL ------------------------ //
 // $(document).ready(function(){    
 //   function get_userSkill() { 
 //    alert('adadd');
 //    var profile_type = $('#select_profileList').val();
 //        $.ajax({
 //            type: "POST",
 //            url: BASE_URL + "profile/dashboard/get_userSkills",
 //            data: {
 //                   profile_type:profile_type
 //                  },
 //            return: false, //stop the actual form post !important!
 //            success: function (data)
 //            {
 //               alert(profile_type);
 //            }
 //        });
 //        return false;  //stop the actual form post !important!
 //    }
 //    });
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


