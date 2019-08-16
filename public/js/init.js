$(document).ready(function(){
	$('.sidenav').sidenav();
	$('.slider').slider({		
		fullWidth: true,
		duration: 100
	});
	$('select').formSelect();	 
	$('.dropdown-trigger').dropdown();	
});

autoplay()   
function autoplay() {
    $('.slider').slider('next');
    setTimeout(autoplay, 10000);
}

function sliderPrev(){
	$('.slider').slider('pause');
	$('.slider').slider('prev');	
}

function sliderNext(){
	$('.slider').slider('pause');
	$('.slider').slider('next');		
}
