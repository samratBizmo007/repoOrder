$(document).ready(function(){
	
	$('select[name="skill"]').on('change', function(event){
		event.preventDefault();
		var id=$(this).val();

		if(id!=""){
			$.ajax({
				 url: BASE_URL + "profile/dashboard/get_userSkills1",
				type : 'post',
				dataType : 'text',
				data : {id:id}
			}).
			done(function(data){
				var rs=JSON.parse(data)
				$('.skill').html('');
				if(rs['status']=='200'){
				for (i = 0; i < rs['status_message'].length;i++){
					console.log(rs['status_message'][i].jm_skill_name);
					$('.skill').append('<span class="w3-text-grey w3-white w3-round-xxlarge w3-small" style="margin:2px;padding:2px 0px 2px 5px">'+rs['status_message'][i].jm_skill_name+'<a class="btn" onclick="del_userSkill('+rs['status_message'][i].skill_id+')" style="margin:0px;padding:0"><i class="fa fa-times-circle w3-medium" style="padding:2px"></i></a></span>')
				}
				}
			});//end of ajax
		}else{

		}//end of if
		
	});


});//end of jquery