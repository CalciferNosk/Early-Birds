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
