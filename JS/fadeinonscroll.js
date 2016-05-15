$(document).ready(function() {
//Original snippit from http://jsfiddle.net/tcloninger/e5qad/ , but is heavily modified
	var fadeinIdentifier = '.page p, .page h1, .page h2,.page h3,.page .roundedimage,.imagebox,.page .layout, .page .staffpic,.page input,.page form';
	$(fadeinIdentifier).css('opacity',0);
    $(window).scroll( function(){FadeUpdate() });
	FadeUpdate();
	function FadeUpdate(){
		 $(fadeinIdentifier).each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var top_of_object = $(this).offset().top ;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            if( bottom_of_window > top_of_object+150 ){
                
                $(this).animate({'opacity':'1'},700);
                    
            }
        }); 
	}
    
});