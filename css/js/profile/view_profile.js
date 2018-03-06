// ----function to preview selected image for profile------//
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#portfolio_imagePreview').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$(function () {
  $("#portfolio_image").change(function(){
    readURL(this);
  });
});
// ------------function preview image end------------------//

//-------------------fucntion to post portfolio-----------------//
$(function () {
  $("#post_form").submit(function (e) {
    var textarea = $("#jm_portfolio_details"); 
    //$textarea.text($textarea.richText("getText")); 
    dataString = $("#post_form").serialize();
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: BASE_URL + "profile/View_profile/add_portfolio",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function (data)
      {
          //$.alert(data);
          $('#msg').html(data);
          //alert(data);
          //location.reload();
          //$("#portfolio_list").load(location.href + " #portfolio_list>*", "");
        }

      });
  return false;  //stop the actual form post !important!
});
});
//----------------fucntion ends--------------------------------//

//-------------------fucntion to delete portfolio--------------------//
function del_portfolio(portfolio_id){
       // $.alert(portfolio_id);
       var uri=BASE_URL+"profile/view_profile/del_portfolio";

       dataString='portfolio_id='+portfolio_id;
       $.confirm({
        title: '<label class="w3-large w3-text-red"><i class="fa fa-stack-exchange"></i> Delete Portfolio.</label>',
        content: '<span class="w3-medium">Do you want to delete this Portfolio permanantly?</span>',
        type:'red',
        buttons: {
          confirm: function () {
            $.ajax({
              type: "POST",
              url: uri,
              data: dataString,
              return: false,                                      
              success:function(data) {
                  //location.reload(); 
                  $('#del_portMsg').html(data);   
                  $("#portfolio_list").load(location.href + " #portfolio_list>*", "");
                }
              });
          },
          cancel: function () {}
        }
      });

     }
//----------------------function ends-----------------//

$(function () {
  $('#addPortfolio').on('hidden.bs.modal', function () {
   location.reload();
 });
});

// --------------stars js--------------------



// --------------fucntion ends---------------//