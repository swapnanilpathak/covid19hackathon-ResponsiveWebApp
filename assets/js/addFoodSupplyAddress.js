$(document)
.on("submit",".foodSupply",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorText__ = $(".errorText",__form__);

	

	var dataObject = {
		f_id : $("input[name='f_id']",__form__).val(),
		f_fullname : $("input[name='f_fullname']",__form__).val(),
		f_address1 : $("input[name='f_address1']",__form__).val(),
		f_address2 : $("input[name='f_address2']",__form__).val(),
		f_city : $("input[name='f_city']",__form__).val(),
		f_pincode : $("input[name='f_pincode']",__form__).val(),
		f_phoneno : $("input[name='f_phoneno']",__form__).val(),
		f_district : $("select[name='district']",__form__).val(),
	};

//form validiation

	if(dataObject.f_fullname.length<1){

		__errorText__.text("Please enter your fullname").show();
		return false;
	}

	if(dataObject.f_address1.length<1){

		__errorText__.text("Please enter address line 1").show();
		return false;
	}

	if(dataObject.f_address2.length<5){

		__errorText__.text("Please enter address line 2").show();
		return false;
	}

	if(dataObject.f_city.length<1){

		__errorText__.text("Please enter city/town/village").show();
		return false;
	}

	if(dataObject.f_pincode.length<6){

		__errorText__.text("Please enter valid pin code").show();
		return false;
	}
	
	if(dataObject.f_phoneno.length!=10){

		__errorText__.text("Please enter valid phone number").show();
		return false;
	}
	if(dataObject.f_district == ''){

		__errorText__.text("Please enter valid district").show();
		return false;
	}

	console.log(dataObject);
	__errorText__.hide();




	$.ajax(
	{
		type: 'POST',
		url: '/ajax/foodSupplyAjax.php',
		data : dataObject,
		dataType: 'json',
		async:true
	}
		)
	.done(
		function ajaxDone(data){
			

			 if(data.error != undefined){
				__errorText__.html(data.error).show();
			}
			 if(data.success!=undefined){
			 	
				__errorText__.html(data.success).show();
				document.getElementById("form").reset();

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