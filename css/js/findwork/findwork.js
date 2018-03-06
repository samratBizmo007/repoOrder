$(document).ready(function(){
	var skill='';
	
	function setUserSkill(){
		$.ajax({
			url :BASE_URL+'project/Project_listing/get_userSkills',
			type : 'POST',
			dataType : 'text',
		}).
		done(function(data){
			var rs=JSON.parse(data);
			if(rs.status=='200'){
				var res=(rs.status_message);

				for(i=0; i< res.length; i++){				
					if(skill==''){
						skill=res[i].skill_id;
						$('.skill').append('<div id="'+res[i].skill_id+'" class="skill-tabs"><span><a class="btn" onclick="delSkill('+res[i].skill_id+')" style="padding:0;margin:0"><i class="fa fa-times-circle-o" style="font-size: 15px; color: black"></i></a><span style="font-size:12px; padding-left:7px; color: black;text-decoration: none;"><label class="getskill">'+res[i].jm_skill_name+'</label></span></span></div>');
					}
					else{
						
						skill = skill+'|'+res[i].skill_id;						
						$('.skill').append('<div id="'+res[i].skill_id+'" class="skill-tabs"><span><a class="btn" onclick="delSkill('+res[i].skill_id+')" style="padding:0;margin:0"><i class="fa fa-times-circle-o" style="font-size: 15px; color: black"></i></a><span style="font-size:12px; padding-left:7px; color: black;text-decoration: none;"><label class="getskill">'+res[i].jm_skill_name+'</label></span></span></div>');

					}

					$('#skills_filtered').val(skill);
				}
			}
			});//end of ajax
	}
	setUserSkill();//end of user skill
	
	$('#hit').on('click',function(event){
		 //$('#showResult').html('<center><i class="fa fa-spinner fa-spin w3-jumbo w3-margin" style="font-size:24px;"></i></center>'); 
		event.preventDefault();
		var str = $('#term').val();

		skill=$('#skills_filtered').val();
		var skill_selected = $('#skill_list option[value="' + $('#term').val() + '"]').data('value');
		if(str!=""){
			if(skill==''){
				skill=skill_selected;
			}
			else{
				// ----------check skill already added or not
				// if(skill.includes(skill_selected))
				// {
				// 	return false;	
				// }

				skill = skill+'|'+skill_selected;
			}
			$('.skill').append('<div id="'+skill_selected+'" class="skill-tabs"><span><a class="btn" onclick="delSkill('+skill_selected+')" style="padding:0;margin:0"><i class="fa fa-times-circle-o" style="font-size: 15px; color: black"></i></a><span style="font-size:12px; padding-left:7px; color: black;text-decoration: none;"><label class="getskill">'+str+'</label></span></span></div>');
			$('#term').val('');
			$('#skills_filtered').val(skill);
		}//end if if
	});//end of click





	$('#hit').on('click',function(event){
		event.preventDefault();
		//var str = $('#term').val();
		skill = $('#skills_filtered').val();

		if(skill == ''){
			return false;
		}
		var rang = $('#myRange').val();
		var value =rang;// 10000 * (parseInt(rang)/100);
		var str = $('#strsearch').val();
		var sortby = $('#sortby').val();

		if(sortby){
			if(sortby == 'lastest'){
				var order = 'DESC';
				var field = 'jm_project_id';
			}
			if(sortby == 'high'){
				var order = 'ASC';
				var field = 'jm_project_price';
			}
			if(sortby == 'low'){
				var order = 'DESC';
				var field = 'jm_project_price';
			}
		}
		$('#showResult').html('<center><i class="fa fa-spinner fa-spin w3-jumbo w3-margin" style="font-size:24px;"></i></center>');

		setTimeout(function(){
			$.ajax({
				url :BASE_URL+'project/project_listing/filterProject',
				type : 'POST',
				dataType : 'text',
				data : {
					'fileds' : {
						'jm_project_title' : str+'/LIKE',
						'jm_project_skill' : skill+'/REGEXP',
						'jm_project_price' : value+'/<'
					},
					'order' : {
						'field' : field,
						'order' : order,
					},
					'table' : {
						'table' : 'jm_project_list',
					},
					'mode' : {
						'mode' : 'project_list',
					}
				},
			}).
			done(function(data){
				console.log(data);
				$('#showResult').html(data);
		});//end of ajax
		},1000);

	});


	$('#hit_mobile').on('click',function(event){
		event.preventDefault();
		//var str = $('#term').val();
		skill = $('#skills_filtered').val();
		if(skill == ''){
			return false;
		}
		var rang = $('#myRange').val();
		var value = rang;//10000 * (parseInt(rang)/100);
		var str = $('#strsearch').val();
		var sortby = $('#sortby').val();
		if(sortby){
			if(sortby == 'lastest'){
				var order = 'DESC';
				var field = 'jm_project_id';
			}
			if(sortby == 'high'){
				var order = 'ASC';
				var field = 'jm_project_price';
			}
			if(sortby == 'low'){
				var order = 'DESC';
				var field = 'jm_project_price';
			}
		}
		setTimeout(function(){
			$.ajax({
				url :BASE_URL+'project/project_listing/filterProject',
				type : 'POST',
				dataType : 'text',
				data : {
					'fileds' : {
						'jm_project_title' : str+'/LIKE',
						'jm_project_skill' : skill+'/REGEXP',
						'jm_project_price' : value+'/<'
					},
					'order' : {
						'field' : field,
						'order' : order,
					},
					'table' : {
						'table' : 'jm_project_list',
					},
					'mode' : {
						'mode' : 'project_list',
					}
				},
			}).
			done(function(data){
				console.log(data);
				$('#showResult').html(data);
		});//end of ajax
		},1000);

	});

	$('input[name="search"]').on('keyup',function(event){
		 $('#showResult').html('<center><i class="fa fa-spinner fa-spin w3-jumbo w3-margin" style="font-size:24px;"></i></center>');
		event.preventDefault();
		skill = $('#skills_filtered').val();
		//alert(skill);
		var rang = $('#myRange').val();
		var value = rang;//10000 * (parseInt(rang)/100);
		var str = $('#strsearch').val();
		var sortby = $('#sortby').val();
		if(sortby){
			if(sortby == 'lastest'){
				var order = 'DESC';
				var field = 'jm_project_id';
			}
			if(sortby == 'high'){
				var order = 'ASC';
				var field = 'jm_project_price';
			}
			if(sortby == 'low'){
				var order = 'DESC';
				var field = 'jm_project_price';
			}
		}
		if(str.length != 1 || event.keyCode != 32){
			setTimeout(function(){
				$.ajax({
					url :BASE_URL+'project/project_listing/filterProject',
					type : 'POST',
					dataType : 'text',
					data : {
						'fileds' : {
							'jm_project_title' : str+'/LIKE',
							'jm_project_skill' : skill+'/REGEXP',
							'jm_project_price' : value+'/<'
						},
						'order' : {
							'field' : field,
							'order' : order,
						},
						'table' : {
							'table' : 'jm_project_list',
						},
						'mode' : {
							'mode' : 'project_list',
						}
					},
				}).
				done(function(data){
					//alert(data);
					console.log(data);
					$('#showResult').html(data);
				});//end of ajax
			},1000);//end of timeout function
		}else{
			$('#err-msg').text("No content for search");
			$('.do-err').fadeIn("slow");
			$(".do-err").delay(1000).fadeOut();
		}
	});

	$('input[name="rangetype"]').on('change',function(event){
		 $('#showResult').html('<center><i class="fa fa-spinner fa-spin w3-jumbo w3-margin" style="font-size:24px;"></i></center>');
		event.preventDefault();
		skill = $('#skills_filtered').val();
		var rang = $('#myRange').val();
		var value =rang;// 1000 * (parseInt(rang)/100);
		var str = $('#strsearch').val();
		var sortby = $('#sortby').val();
		if(sortby){
			if(sortby == 'lastest'){
				var order = 'DESC';
				var field = 'jm_project_id';
			}
			if(sortby == 'high'){
				var order = 'ASC';
				var field = 'jm_project_price';
			}
			if(sortby == 'low'){
				var order = 'DESC';
				var field = 'jm_project_price';
			}
		}
		if(str.length != 1 || event.keyCode != 32){
			setTimeout(function(){
				$.ajax({
					url :BASE_URL+'project/project_listing/filterProject',
					type : 'POST',
					dataType : 'text',
					data : {
						'fileds' : {
							'jm_project_title' : str+'/LIKE',
							'jm_project_skill' : skill+'/REGEXP',
							'jm_project_price' : value+'/<'
						},
						'order' : {
							'field' : field,
							'order' : order,
						},
						'table' : {
							'table' : 'jm_project_list',
						},
						'mode' : {
							'mode' : 'project_list',
						}
					},
				}).
				done(function(data){
					console.log(data);
					$('#showResult').html(data);
				});//end of ajax
			},1000);//end of timeout function
		}else{
			$('#err-msg').text("No content for search");
			$('.do-err').fadeIn("slow");
			$(".do-err").delay(1000).fadeOut();
		}
	});

	$('select[name="searchby"]').on('change',function(event){
		 $('#showResult').html('<center><i class="fa fa-spinner fa-spin w3-jumbo w3-margin" style="font-size:24px;"></i></center>');
		event.preventDefault();
		skill = $('#skills_filtered').val();
		var rang = $('#myRange').val();
		var value = rang;//10000 * (parseInt(rang)/100);
		var str = $('#strsearch').val();
		var sortby = $('#sortby').val();
//alert(skill);

if(sortby){
	if(sortby == 'lastest'){
		var order = 'DESC';
		var field = 'jm_project_id';
	}
	if(sortby == 'high'){
		var order = 'ASC';
		var field = 'jm_project_price';
	}
	if(sortby == 'low'){
		var order = 'DESC';
		var field = 'jm_project_price';
	}
}


if(str.length != 1 || event.keyCode != 32){
	setTimeout(function(){
		$.ajax({
			url :BASE_URL+'project/project_listing/filterProject',
			type : 'POST',
			dataType : 'text',
			data : {
				'fileds' : {
					'jm_project_title' : str+'/LIKE',
					'jm_project_skill' : skill+'/REGEXP',
					'jm_project_price' : value+'/<'
				},
				'order' : {
					'field' : field,
					'order' : order,
				},
				'table' : {
					'table' : 'jm_project_list',
				},
				'mode' : {
					'mode' : 'project_list',
				}
			},
		}).
		done(function(data){
					//alert(data);
					console.log(data);
					$('#showResult').html(data);
				});//end of ajax
			},1000);//end of timeout function
}else{
	$('#err-msg').text("No content for search");
	$('.do-err').fadeIn("slow");
	$(".do-err").delay(1000).fadeOut();
}
});


	$('#view_bookmark').on('click',function(event){
		event.preventDefault();
		//alert('check function');
		//var str = $('#term').val();
		skill = $('#skills_filtered').val();
		// if(skill == ''){
		// 	//alert('check if');
		// 	return false;

		// }
		var rang = $('#myRange').val();
		var value =rang;// 10000 * (parseInt(rang)/100);
		var str = $('#strsearch').val();
		var sortby = $('#sortby').val();
		
		if(sortby){
			if(sortby == 'lastest'){
				var order = 'DESC';
				var field = 'jm_project_id';
			}
			if(sortby == 'high'){
				var order = 'ASC';
				var field = 'jm_project_price';
			}
			if(sortby == 'low'){
				var order = 'DESC';
				var field = 'jm_project_price';
			}
		}
		setTimeout(function(){
			//alert('check setTimeout');
			$.ajax({

				url :BASE_URL+'project/project_listing/show_bookmark',
				type : 'POST',
				dataType : 'text',
				data : {
					'fileds' : {
						'jm_project_title' : str+'/LIKE',
						'jm_project_skill' : skill+'/REGEXP',
						'jm_project_price' : value+'/<'
					},
					'order' : {
						'field' : field,
						'order' : order,
					},
					'table' : {
						'table' : 'jm_project_list',
					},
					'mode' : {
						'mode' : 'project_list',
					}
				},
			}).
			done(function(data){
				console.log(data);
				$('#showResult').html(data);
		});//end of ajax
		},1000);

	});

	// $('input[name="optradio"]').on('click',function(){
	// 	var str = $(this).val();
	// 	if(str!=''){
	// 		$.ajax({
	// 			url :BASE_URL+'project/project_listing/jobtypeproject',
	// 			type : 'POST',
	// 			dataType : 'text',
	// 			data : {str : str},
	// 		}).
	// 		done(function(data){
	// 			// $('#showResult').find('div').remove();
	// 			console.log(data);
	// 			$('#showResult').html(data);

	// 		});//end of ajax
	// 	}//end of if
	// });




	$('input[name="optradio"]').on('click',function(){
		var radioValue = $("input[name='optradio']:checked").val();
		if(radioValue == 'All'){
			radioValue = '';
		}
		skill = $('#skills_filtered').val();
		var rang = $('#myRange').val();
		var value = rang;//10000 * (parseInt(rang)/100);
		var str = $('#strsearch').val();
		var sortby = $('#sortby').val();
		
		if(sortby){
			if(sortby == 'lastest'){
				var order = 'DESC';
				var field = 'jm_project_id';
			}
			if(sortby == 'high'){
				var order = 'ASC';
				var field = 'jm_project_price';
			}
			if(sortby == 'low'){
				var order = 'DESC';
				var field = 'jm_project_price';
			}
		}


		if(str.length != 1 || event.keyCode != 32){
			setTimeout(function(){
				$.ajax({
					url :BASE_URL+'project/project_listing/filterProject',
					type : 'POST',
					dataType : 'text',
					data : {
						'fileds' : {
							'jm_project_title' : str+'/LIKE',
							'jm_project_skill' : skill+'/REGEXP',
							'jm_project_price' : value+'/<',
							'jm_job_type' : radioValue+'/=',
						},
						'order' : {
							'field' : field,
							'order' : order,
						},
						'table' : {
							'table' : 'jm_project_list',
						},
						'mode' : {
							'mode' : 'project_list',
						}
					},
				}).
				done(function(data){
					console.log(data);
					$('#showResult').html(data);
				});//end of ajax
			},1000);//end of timeout function
		}else{
			$('#err-msg').text("No content for search");
			$('.do-err').fadeIn("slow");
			$(".do-err").delay(1000).fadeOut();
		}
	});


	// $('button[name="reset"]').on('click',function(event){
	// 	var skill = '';
	// 	var rang = '';
	// 	var value = '';
	// 	var str = '';
	// 	setTimeout(function(){
	// 		$.ajax({
	// 			url :BASE_URL+'project/project_listing/filterProject',
	// 			type : 'POST',
	// 			dataType : 'text',
	// 			data : {
	// 					    'fileds' : {
	// 						        'jm_project_title' : str+'/LIKE',
	// 						        'jm_project_skill' : skill+'/REGEXP',
	// 						        'jm_project_price' : value+'/<'
	// 						    },
	// 						    'order' : {
	// 						        'field' : field,
	// 						        'order' : order,
	// 						    },
	// 						    'table' : {
	// 						        'table' : 'jm_project_list',
	// 						    },
	// 						    'mode' : {
	// 						        'mode' : 'project_list',
	// 						    }
	// 					},
	// 		}).
	// 		done(function(data){
	// 			console.log(data);
	// 			$('#showResult').html(data);
	// 		});//end of ajax
	// 	},1000);//end of timeout function
	// });//





	

	//end of click event

	// code for slider
	var slider = document.getElementById("myRange");
	var output = document.getElementById("demo");
	output.innerHTML = slider.value;

	slider.oninput = function() {
		output.innerHTML =this.value;// 10000 * (parseInt(this.value)/100);
	}//end of function



});//end of ready function


//-------------------fucntion to mark bookmark--------------------//
function add_bookmark(user_id,project_id){
		//alert(project_id);
		var uri=BASE_URL+"project/Project_listing/add_bookmark";
		if($('#project_'+project_id).hasClass('fa-bookmark')){
			uri=BASE_URL+"project/Project_listing/del_bookmark";
		}		
		dataString='user_id='+user_id+'&project_id='+project_id;
		$.LoadingOverlay("show");

		$.ajax({
			type: "POST",
			url: uri,
			data: dataString,
			return: false,  

			success: function(data)
			{		
				$.LoadingOverlay("hide");
				$('#bookmark_msg').html(data); 
				location.reload(); 
				//$("#showResult").load(location.href + " #showResult>*", "");        
			}
		});	

	}
//----------------------function ends-----------------//

function delSkill(id){
	$('#'+id+'').remove();
	var strValue=$('#skills_filtered').val();

	var res; 
	if(strValue.includes(id))
	{
		res= strValue.replace(id, '');
	}
	else{
		res= strValue.replace('|'+id, '');
	}
	//var res = strValue.replace('|'+id, '');
	$('#skills_filtered').val(res);
	skill = $('#skills_filtered').val();

	var div=$('.skill').html();
	if(div ==''){
		$('#skills_filtered').val('');
		skill = '';
	}
	//var str = $('#term').val();

	var rang = $('#myRange').val();
	var value =rang;// 10000 * (parseInt(rang)/100);
	var str = $('#strsearch').val();
	var sortby = $('#sortby').val();
	if(sortby){
		if(sortby == 'lastest'){
			var order = 'DESC';
			var field = 'jm_project_id';
		}
		if(sortby == 'high'){
			var order = 'ASC';
			var field = 'jm_project_price';
		}
		if(sortby == 'low'){
			var order = 'DESC';
			var field = 'jm_project_price';
		}
	}

	$.ajax({
		url :BASE_URL+'project/project_listing/filterProject',
		type : 'POST',
		dataType : 'text',
		data : {
			'fileds' : {
				'jm_project_title' : str+'/LIKE',
				'jm_project_skill' : skill+'/REGEXP',
				'jm_project_price' : value+'/<'
			},
			'order' : {
				'field' : field,
				'order' : order,
			},
			'table' : {
				'table' : 'jm_project_list',
			},
			'mode' : {
				'mode' : 'project_list',
			}
		},
	}).
	done(function(data){
		console.log(data);
		$('#showResult').html(data);
		});//end of ajax
	
}