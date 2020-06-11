$(document)
.on("submit",".doctorAppointment",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorText__ = $(".errorText",__form__);

	

	var dataObject = {
		f_id : $("input[name='f_id']",__form__).val(),
		f_fullname : $("input[name='f_fullname']",__form__).val(),
		f_gender : $("input[name='f_gender']",__form__).val(),
		
		f_district : $("select[name='f_district']",__form__).val(),
		
		
		f_phoneno : $("input[name='f_phoneno']",__form__).val(),
		
		f_dept : $("input[name='f_dept']",__form__).val(),
		f_date : $("input[name='f_date']",__form__).val()
		
	};

//form validiation

	if(dataObject.f_fullname.length<1){

		__errorText__.text("Please enter your fullname").show();
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
	if(dataObject.f_dept.length<1){

		__errorText__.text("Please enter valid regdno").show();
		return false;
	}
	
	if(dataObject.f_date==''){

		__errorText__.text("Please enter valid from date").show();
		return false;
	}
	
	
	console.log(dataObject);
	__errorText__.hide();




	$.ajax(
	{
		type: 'POST',
		url: '/ajax/doctorAppointmentAjax.php',
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