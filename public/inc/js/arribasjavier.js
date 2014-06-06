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
	$('body>nav.navbar').affix({
		offset: {
			top: function () {
				return (this.top = $('header').outerHeight(true));
			}
		}
	}).on("affixed.bs.affix",function(){$("body").addClass("nav-fixed");}).on("affixed-top.bs.affix",function(){$("body").removeClass("nav-fixed");});
	
	//Icon link
	$("header h1").click(function(){location.href=$(".navbar-brand").attr("href");});
	
});
