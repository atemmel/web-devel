window.onscroll = function() { displayNav(); };

function displayNav()
{
	document.getElementById("navigation-sticky").style.top
		= document.body.scrollTop > 48 || document.documentElement.scrollTop > 48 ?
		"0em" : "-70px";
}
