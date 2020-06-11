$(document)
.on("submit",".buymsmeproducts",function(event){

	event.preventDefault();



	var __form__ = $(this);


	var __errorText__ = $(".errorText",__form__);

	

	var dataObject = {
		f_msmeid : $("input[name='f_msmeid']",__form__).val(),
		f_userid : $("input[name='f_userid']",__form__).val(),
		f_productid : $("input[name='f_productid']",__form__).val(),
		f_quantity : $("input[name='f_quantity']",__form__).val(),
		f_fullname : $("input[name='f_fullname']",__form__).val(),
		f_address : $("input[name='f_address']",__form__).val(),
		
		f_district : $("select[name='f_district']",__form__).val(),
		f_pincode : $("input[name='f_pincode']",__form__).val(),
		f_phoneno : $("input[name='f_phoneno']",__form__).val(),
		
	};

//form validiation

	if(dataObject.f_fullname.length<1){

		__errorText__.text("Please enter your fullname").show();
		return false;
	}

	if(dataObject.f_address.length<1){

		__errorText__.text("Please enter address ").show();
		return false;
	}

	if(dataObject.f_quantity==''){

		__errorText__.text("Please enter quantity").show();
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
		url: '/ajax/buyMsmeProductsAjax.php',
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