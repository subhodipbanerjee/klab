//jQuery to collapse the navbar on scroll
    $(document).ready(function (){

$(window).scroll(function() 
{
    if ($(".navbar").offset().top > 50)
    {
             $(".navbar-fixed-top").addClass("top-nav-collapse");		
            // $(".navbar-fixed-top").css({"background-color":"#313131"});
    } 
    else 
    {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");		
            //$(".navbar-fixed-top").css({"background-color":"#1B1B1B"});
    }
});



//jQuery for page scrolling feature - requires jQuery Easing plugin

/*$(function() 
{
	
    $('a.page-scroll').bind('click', function(event) 
	{
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        },1500, 'easeInOutExpo');
        event.preventDefault();
    });
	
});*/


// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function()
{
    $('.navbar-toggle:visible').click();
	
});




		  
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100)		
		{
			$('.scrollup').fadeIn();
		}		
		else		
		{
			$('.scrollup').fadeOut();
		}
		
	});
			  
		  
	$('.scrollup').click(function ()	
	 {
		$("html, body").animate({scrollTop:0},1500);
		return false;
		
	});
		  
});

