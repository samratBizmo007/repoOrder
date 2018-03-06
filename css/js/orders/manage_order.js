/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// This script is used to save profile information -->

$(document).ready(function (e){
    $("#addOrder_form").on('submit',(function(e){       
        e.preventDefault();        
        $.ajax({
            url: BASE_URL + "orders/Manage_orders/addOrder",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                $.alert(data);
            },
            error: function(){}             
        });
    }));
});
//- This script is used to save profile information -->


// ----function to preview selected image for profile------//
function readURL(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prod_imagePreview_'+id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
// ------------function preview image end------------------//


