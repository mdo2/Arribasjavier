/*
|--------------------------------------------------------------------------
| Base JS script
|--------------------------------------------------------------------------
|
| Scripts that affect thew whole site
|
*/

$(function(){

	/* Navigation */
	//Navbar fixed
	$('.navbar').affix({
		offset: {
			top: function () {
				return (this.top = $('header').outerHeight(true))
			}
		}
	});
	
	//Icon link
	$("header .header-site-icon").click(function(){location.href=$(".navbar-brand").attr("href");});
	
});
