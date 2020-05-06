$(document)
.on("submit",".updateProfileForm",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorText__ = $(".errorText",__form__);



	var dataObject = {
		f_id : $("input[name='f_id']",__form__).val(),
		f_fullname : $("input[name='f_fullname']",__form__).val(),
		f_phone : $("input[name='f_phone']",__form__).val()
	};



	




	__errorText__.hide();




	$.ajax(
	{
		type: 'POST',
		url: '/covid19hackathon/ajax/updateProfileAjax.php',
		data : dataObject,
		dataType: 'json',
		async:true
	}
		)
	.done(
		function ajaxDone(data){
			//console.log(data);

			 //after ajax call is done successfully
			 $("input[name='f_fullname']").val(data.fullname);
			 $("input[name='f_phone']").val(data.phone);
			__errorText__.html(data.message).show();
			
		}

		)
	.fail(
		function ajaxFailed(e){
			console.log(e);
		}
		)
	.always(
		function ajaxAlwaysDoThis(data){
			console.log('Always');
		}
		)

	return false;
}).on("submit",".passwordChangeForm",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorTextPasswordChangeForm__ = $(".errorTextPasswordChangeForm",__form__);



	var dataObject = {
		f_id : $("input[name='f_id']",__form__).val(),
		f_oldpassword : $("input[name='f_oldpassword']",__form__).val(),
		
		f_newpassword1 : $("input[name='f_newpassword1']",__form__).val(),
		
		f_newpassword2 : $("input[name='f_newpassword2']",__form__).val()
	};





	__errorTextPasswordChangeForm__.hide();


//ajax part

	$.ajax(
	{
		type: 'POST',
		url: '/covid19hackathon/ajax/updateProfilePasswordAjax.php',
		data : dataObject,
		dataType: 'json',
		async:true
	}
		)
	.done(
		function ajaxDone(data){
			

			
			 if(data.error != undefined){
				__errorTextPasswordChangeForm__.html(data.error).show();
			}
		}

		)
	.fail(
		function ajaxFailed(e){
			console.log(e);
		}
		)
	.always(
		function ajaxAlwaysDoThis(data){
			console.log('Always');
		}
		)

	return false;
})