$(document).ready(function() {
	
	$("#inquirySubmit").click(function() {
		if($("#inquiryName").val().length==0){
			$("#alertMsg").html("Please enter your Name.");
			$("#alertMsg").show();
			$('html, body').animate({scrollTop:200}, '600', 'swing');
		}else if($("#inquiryMobile").val().length==0){
			$("#alertMsg").html("Please fill in your mobile no.");
			$("#alertMsg").show();
			$('html, body').animate({scrollTop:200}, '600', 'swing');
		}else if(!validateEmail($("#inquiryEmail").val())){
			$("#alertMsg").html("Please provide a valid email");
			$("#alertMsg").show();
			$('html, body').animate({scrollTop:200}, '600', 'swing');
		}else if($("#inquiryDetail").val().length==0){
			$("#alertMsg").html("Please enter brief project description");
			$("#alertMsg").show();
			$('html, body').animate({scrollTop:200}, '600', 'swing');
		}else{
			$("#inquiryFrom").submit();
		}
	});
	
});

function validateEmail(sEmail){
	var filter = /^[^\s@]+@[^\s@]+\.[^\s@]+$/ ;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}