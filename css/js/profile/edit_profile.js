// ----function to preview selected image for profile------//
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#profile_imagePreview').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$(function () {
  $("#jm_profile_image").change(function(){
    readURL(this);
  });
});
// ------------function preview image end------------------//

// ---------------fucntion starts here------------------------//

// -----------fucntion ends here----------------------------//
// ---------------fucntion starts here------------------------//
$(document).ready(function () {
  var max_fields = 3;
  var wrapper = $("#more_education");
  var add_button = $("#add_more");

  var x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div class="w3-col l12"><a href="#" class="delete w3-text-grey w3-right w3-small" title="remove field"><i class="fa fa-remove"></i></a><div class="w3-col l12"><div class="col-lg-4"><label class="control-label">Course :</label><input class="w3-input" type="text" name="course[]" value=""></div><div class="col-lg-4"><label class="control-label">Passing Year :</label><input class="w3-input" type="number" min="1800" name="passing_year[]"  placeholder="passing year" value="" style=""></div><div class="col-lg-4"><label class="control-label">University :</label><input class="w3-input" type="text" name="university[]" value=""></div></div></div></div>');
    } else
    {
      $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xxlarge"></i> You Reached the maximum limit of adding 3 fields</label>'); //alert when added more than 4 input fields
    }

  });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});
// -----------fucntion ends here----------------------------//
// ---------------fucntion starts here------------------------//
$(document).ready(function () {
  var max_fields = 3;
  var wrapper = $("#more_experiance");
  var add_button = $("#add_more_experiance");
  var x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div class="w3-col l12"><a href="#" class="delete w3-text-grey w3-right w3-small" title="remove field"><i class="fa fa-remove"></i></a><div class="w3-col l12"> <div class="col-lg-4"><label class="control-label">Previous designation:</label><input class="w3-input"  type="text" name="jm_previous_designation[]" value=""></div><div class="col-lg-4 "><label class="control-label">Worked-till:</label><input class="w3-input" type="date" name="jm_worked_till[]" value="" style="padding:0 0 0 2px"></div><div class="col-lg-4"><label class="control-label">Organisation:</label><input class="w3-input" type="text" name="jm_organisation[]" value=""></div></div></div></div>');
    } else
    {
      $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xxlarge"></i> You Reached the maximum limit of adding 3 fields</label>'); //alert when added more than 4 input fields
    }

  });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});
// -----------fucntion ends here----------------------------//