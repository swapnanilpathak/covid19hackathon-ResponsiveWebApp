$(document)
.on("submit",".essentialPass",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorText__ = $(".errorText",__form__);

	

	var dataObject = {
		f_id : $("input[name='f_id']",__form__).val(),
		f_fullname : $("input[name='f_fullname']",__form__).val(),
		f_address : $("input[name='f_address']",__form__).val(),
		
		f_city : $("input[name='f_city']",__form__).val(),
		f_pincode : $("input[name='f_pincode']",__form__).val(),
		f_phoneno : $("input[name='f_phoneno']",__form__).val(),
		f_district : $("select[name='f_district']",__form__).val(),
		f_reason : $("input[name='f_reason']",__form__).val(),
		f_tod : $("input[name='f_tod']",__form__).val(),
		f_fromd : $("input[name='f_fromd']",__form__).val(),
		f_vregdno : $("input[name='f_vregdno']",__form__).val(),
		f_destination: $("input[name='f_destination']",__form__).val()
	};

//form validiation

	if(dataObject.f_fullname.length<1){

		__errorText__.text("Please enter your fullname").show();
		return false;
	}

	if(dataObject.f_address.length<1){

		__errorText__.text("Please enter address line 1").show();
		return false;
	}

	if(dataObject.f_reason.length<5){

		__errorText__.text("Please enter reason").show();
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
	if(dataObject.f_vregdno.length<1){

		__errorText__.text("Please enter valid regdno").show();
		return false;
	}
	
	if(dataObject.f_fromd==''){

		__errorText__.text("Please enter valid from date").show();
		return false;
	}
	if(dataObject.f_tod==''){

		__errorText__.text("Please enter valid to date").show();
		return false;
	}
	if(dataObject.f_destination.length<1){

		__errorText__.text("Please enter valid destination").show();
		return false;
	}
	console.log(dataObject);
	__errorText__.hide();




	$.ajax(
	{
		type: 'POST',
		url: '/ajax/essentialPassAjax.php',
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