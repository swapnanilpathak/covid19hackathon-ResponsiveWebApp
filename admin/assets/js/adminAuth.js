$(document).on("submit",".adminForm",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorText__ = $(".errorText",__form__);



	var dataObject = {
		adminusername : $("input[name='adminusername']",__form__).val(),
		
		adminpassword : $("input[name='adminpassword']",__form__).val()
		
	};








	$.ajax(
	{
		type: 'POST',
		url: '/admin/ajax/adminAuthAjax.php',
		data : dataObject,
		dataType: 'json',
		async:true
	}
		)
	.done(
		function ajaxDone(data){
			console.log(data);

			if(data.redirect !==undefined){
				window.location = data.redirect;
			}
			
			else if(data.error != undefined){
				__errorText__.html(data.error).show();
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
}).on("submit",".employeeForm",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorText__ = $(".errorText",__form__);



	var dataObject = {
		employeeusername : $("input[name='employeeusername']",__form__).val(),
		
		employeepassword : $("input[name='employeepassword']",__form__).val()
		
	};








	$.ajax(
	{
		type: 'POST',
		url: '/admin/ajax/employeeAuthAjax.php',
		data : dataObject,
		dataType: 'json',
		async:true
	}
		)
	.done(
		function ajaxDone(data){
			console.log(data);

			if(data.redirect !==undefined){
				window.location = data.redirect;
			}
			
			else if(data.error != undefined){
				__errorText__.html(data.error).show();
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