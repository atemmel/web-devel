var form = document.getElementById("visitcard");

form.addEventListener("submit", function(e) 
	{
		e.preventDefault();

		var company 	= e.srcElement[0].value;
		var surname 	= e.srcElement[1].value;
		var firstname 	= e.srcElement[2].value;
		var title 		= e.srcElement[3].value;
		var phone 		= e.srcElement[4].value;
		var email 		= e.srcElement[5].value;
		var background 	= e.srcElement[6].value;
		var textcolor 	= e.srcElement[7].value;
		var textfont 	= e.srcElement[8].value;

		$("#inputs").hide();
		$("result").show();

		var result = document.getElementById("result");
		result.style.background = background;
		result.style.color		= textcolor;
		result.style.fontFamily = textfont;

		document.getElementById("company").innerHTML = company;
		document.getElementById("name").innerHTML = firstname + " " + surname;
		document.getElementById("title").innerHTML = title;
		document.getElementById("phone").innerHTML = "Tfn " + phone;
		document.getElementById("email").innerHTML = "E-post: " + email;
	});
