$(document).ready(
	function() {
		$('.button-collapse').sideNav({'edge': 'left'});
	  
		$("#poele").hover(
			function(){
				if (!$(this).hasClass('animated')) {
					$(this).dequeue().stop().animate(
						{borderSpacing: 90}, 
						{
						step: 
							function(now,fx) {
								if(fx.pos<0.5){
									deg=fx.pos*2*30;
									$(this).css('-webkit-transform','rotate('+deg+'deg)'); 
									$(this).css('-moz-transform','rotate('+deg+'deg)');
									$(this).css('transform','rotate('+deg+'deg)');
								}
								else{
									deg=(1-fx.pos)*2*30;
									$(this).css('-webkit-transform','rotate('+deg+'deg)'); 
									$(this).css('-moz-transform','rotate('+deg+'deg)');
									$(this).css('transform','rotate('+deg+'deg)');
								}
							},
						duration:'fast',
						easing:'linear'
						}
					);
				}
			}, 
			function() {
				$(this).addClass('animated').animate(
					{}, 
					"normal", 
					"linear", 
					function() {
						$(this).removeClass('animated').dequeue();
					}
				);
			}
		);
	}
);