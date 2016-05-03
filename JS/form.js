function validateForm(id) {
    var x = id;
    if (x == null || x == "" || x.indexOf(">") >= 0 || x.indexOf("<") >= 0 ||
    	x.indexOf("/") >= 0 || x.indexOf(";") >= 0) {
        return false;
    } else {
    	return true;
    }
}

$(document).on("keyup", ".js-user, .js-pass, .js-title", function(){
	var user = $(".js-user").val();
	var pass = $(".js-pass").val();
	$(".js-submit").attr("disabled", "disabled");
	if(user){
		$(".js-user").css('border', '1px white solid');
		if (!(validateForm(user))){
			$(".js-user").css('border', '1px red solid');
			$(".js-user").attr("placeholder", "Invalid Input!");
			};
		}
	if(pass){
		if (!(validateForm(pass))){
			$(".js-pass").css('border', '1px red solid');
			$(".js-pass").attr("placeholder", "Invalid Input!");
			};
		}
	if (validateForm(user) && validateForm(pass)){
		$(".js-submit").removeAttr("disabled");
	}
});


