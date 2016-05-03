$(document).ready(function() {
//Original snippit from http://jsfiddle.net/tcloninger/e5qad/
	var fadeinIdentifier = '.page p, .page h1, .page h2,.page h3,.page .roundedimage,.page .imagebox,.page .layout, .page .staffpic,input,form';
	$(fadeinIdentifier).css('opacity',0);
    $(window).scroll( function(){
        $(fadeinIdentifier).each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},400);
                    
            }
        }); 
    });
    
});