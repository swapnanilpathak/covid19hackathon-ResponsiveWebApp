	$.ajax(
        {
        type : 'POST',
        url : '/counselling.php',
        dataType: 'html',
        data : {f_id: $("input[name='f_id']",$(".counselling")).val()},
        async:true,
        success:function(data){
        $('#status').html(data);
        
        }
        }

        );
	$(document)
	.on("submit",".counselling",function(event){

		event.preventDefault();



		var __form__ = $(this);


		var __errorText__ = $(".errorText",__form__);

		

		var dataObject = {
			f_id : $("input[name='f_id']",__form__).val(),
			f_fullname : $("input[name='f_fullname']",__form__).val(),
			f_cdate : $("input[name='f_cdate']",__form__).val(),
			f_district : $("select[name='f_district']",__form__).val(),
			
			
			
		};

	//form validiation

		if(dataObject.f_fullname.length<1){

			__errorText__.text("Please enter your fullname").show();
			return false;
		}

		

		
		
		
		if(dataObject.f_cdate==''){

			__errorText__.text("Please enter valid date").show();
			return false;
		}
		
		if(dataObject.f_district==''){

			__errorText__.text("Please enter valid district").show();
			return false;
		}
		
		
		__errorText__.hide();




		$.ajax(
		{
			type: 'POST',
			url: '/ajax/counsellingAjax.php',
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


				$.ajax(
				{
				type : 'POST',
				url : '/counselling.php',
				dataType: 'html',
				data : {f_id:dataObject.f_id},
				async:true,
				success:function(data){
				$('#status').html(data);
				
				}
				}

				);

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