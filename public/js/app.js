$(document).ready(function () {
	$('.btn-submit').on('click',function (e) {
		e.stopPropagation();
	});
	var $password = $('.password');
	//var $email  = $('#email');
	var glyphicon = $('.glyphicon');
	glyphicon.click(function () {
		if($(this).hasClass('glyphicon-eye-open')){
			$(this).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
			$password.attr('type','text');
		}
		else{
			$(this).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
			$password.attr('type','password');
		}
	});
	
});
	//rest
	

