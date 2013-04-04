
$(document).ready(function(){

	var login = $('#loginform');
	var speed = 400;

	
	$('#to-login').click(function(){
	
	});
    
    if($.browser.msie == true && $.browser.version.slice(0,3) < 10) {
        $('input[placeholder]').each(function(){ 
       
        var input = $(this);       
       
        $(input).val(input.attr('placeholder'));
               
        $(input).focus(function(){
             if (input.val() == input.attr('placeholder')) {
                 input.val('');
             }
        });
       
        $(input).blur(function(){
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });

        
        
    }
});

function validar(form){
	
	var user = $('#usuario').val();
	var senha = $('#senha').val();
	var validado = 1;
	if(user==""){
		$('#usuario').addClass("login_errado");
		validado = 0;
    }else{
		$('#usuario').removeClass("login_errado");
	}
	if(senha==""){
		$('#senha').addClass("login_errado");
		validado = 0;
	}else{
		$('#senha').removeClass("login_errado");
	}
	if(validado) return true;
	else return false;
}