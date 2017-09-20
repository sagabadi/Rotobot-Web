/*
 *	VALIDATION (Wizard)
 *	 ~ function naming: validateStep[index]()
*/

// STEP-2: Input Pembayaran
function validateStep2(){
	var wizard = $(".wizard form");
	wizard.validate({
        errorElement: 'p',
        inputContainer: 'form-group',

		rules: {
			username2: "required",
			pembayaran2: {
				required: true,
				number: true
			},
			total_bayar2: {
				required: true,
				number: true
			}
		},

		messages: {
			username2: "Username masih kosong",
			pembayaran2: {
				required: "Pembayaran masih kosong",
				number: "Angka yang anda masukkan tidak benar"
			},
			total_bayar2:{
				required: "Total pembayaran masih kosong",
				number: "Total pembayaran yang anda masukkan tidak benar"
			}
		},

		highlight: function(element) {
	        $(element).parent('div.form-group').addClass('has-error');
		},
	    
	    unhighlight: function(element) {
	        $(element).parent('div.form-group').removeClass('has-error');
	    }

	});

	if (wizard.valid()) {
		return true;
	} else {
		return false;	
	}
}