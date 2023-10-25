$(document).ready(function () {
	$("#login-form").on("submit", function (e) {
		e.preventDefault();
        var error = 0;
		if ($("#loginName").val() == "") {
			ToastAlert('error','Username is Required','#d94637b8');
           error ++
		}
        if ($("#loginPassword").val() == "") {
			ToastAlert('error','Password is Required','#d94637b8');
           error ++
		}
        if(error > 0){
            return false;
        }

		var formData = new FormData($(this).get(0));
		$.ajax({
			type: "POST",
			url: `${base_url}user-login`,
			processData: false,
			contentType: false,
			data: formData,
			dataType: "json",
			success: function (data) {

                if(data.resultfetch == 0){
                    ToastAlert('error','Account Not Found!','#d94637b8')
                }
				if(data.resultfetch == 1){
					location.href = base_url + 'main-view';
				}
            },
		});
	});
	$(document).on('blur','#registerRepeatPassword',function(){
		if( $("#registerPassword").val() != $("#registerRepeatPassword").val()){
			ToastAlert('error','Pasword not Match','#d94637b8');
		}
	})

	$("#register-form").on("submit", function (e) {
		e.preventDefault();
        var error = 0;
		if ($("#registerfName").val() == "") {
			ToastAlert('error','First is Required','#d94637b8');
			error ++
         
		}
		if ($("#registerlName").val() == "") {
			ToastAlert('error','Last Name is Required','#d94637b8');
           error ++
		}
        if ($("#registerEmail").val() == "") {
			ToastAlert('error','Email is Required','#d94637b8');
           error ++
		}
		if ($("#registerPassword").val() == "") {
			ToastAlert('error','Pasword is Required','#d94637b8');
           error ++
		}
		if( $("#registerPassword").val() != $("#registerRepeatPassword").val()){
			ToastAlert('error','Pasword not Match','#d94637b8');
			error ++
		}
		if($('#registerCheck').is(':checked') == false){
			ToastAlert('error','Please Check Agree if you want to continue','#d94637b8');
           	error ++
		}
		
		
        if(error > 0){
            return false;
        }

		var formData = new FormData($(this).get(0));
		$.ajax({
			type: "POST",
			url: `${base_url}user-register`,
			processData: false,
			contentType: false,
			data: formData,
			dataType: "json",
			success: function (data) {
				
				if(data.error == 100){
					ToastAlert('error','This Date Already Have an account','#d94637b8');
				}
				if(data.error == true){
					$("#registerfName").val('')
					$("#registerlName").val('')
					$("#registerEmail").val('')
					$("#registerPassword").val('')
					$('#registerCheck').is(':checked',false) 
					ToastAlert('success','Success we sent the credential to your email','green');
					setInterval(function () {location.reload()}, 3000);
				}

            },
		});
	});
	function ToastAlert(className = 'error', text = 'error using this alert!',bg = 'red') {
		Toastify({
			text: text,
			className: className,
			style: {
				background: bg,
			},
		}).showToast();
	}
});
