$(document)//select the document
.on("submit",".registerForm",function(event){//when form with className '.registerForm' is submitted do whatever is inside the function

	event.preventDefault();//prevent the default behaviour after form submision



	var __form__ = $(this);//the form is assigned to the variable __form__


	var __errorText__ = $(".errorText",__form__);



	var dataObject = {//create a dataObject object to hold the values of different fields of the form
		email : $("input[name='r_email']",__form__).val(),
		password1 : $("input[name='r_password1']",__form__).val(),
		password2 : $("input[name='r_password2']",__form__).val()
	};

//form validiation

	if(dataObject.password1.length<8){

		__errorText__.text("Password must be greater than or equal to 8 characters").show();
		return false;
	}else if(dataObject.password1!==dataObject.password2){
		__errorText__.text("Password do not match").show();
		return false;
	}






	$.ajax(
	{
		type: 'POST',
		url: '/ajax/registerAjax.php',
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
}).on("submit",".loginForm",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorText__ = $(".errorText",__form__);



	var dataObject = {
		email : $("input[name='l_email']",__form__).val(),
		
		password : $("input[name='l_password']",__form__).val()
		
	};








	$.ajax(
	{
		type: 'POST',
		url: '/ajax/loginAjax.php',
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


