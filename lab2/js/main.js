"use strict";

var baseURL = "http://api.arbetsformedlingen.se/af/v0";

// Wait for DOM to load
document.addEventListener("DOMContentLoaded", function()
{ 
    var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == XMLHttpRequest.DONE ) 
		{
			if (xmlhttp.status == 400) 
			{
				alert('There was an error 400');
			}
			else if (xmlhttp.status != 200) 
			{
				alert('something else other than 200 was returned');
			}
			else
			{
				var jsonData = JSON.parse( xmlhttp.responseText );
				document.getElementById("searchlan").innerHTML = "";

				for(var i=0; i < jsonData.soklista.sokdata.length; i++)
				{
					document.getElementById("mainnavlist").innerHTML 
						+= "<li id='"+jsonData.soklista.sokdata[i].id+"'>"+jsonData.soklista.sokdata[i].namn
						+" (" + jsonData.soklista.sokdata[i].antal_ledigajobb + ")</li>";    

					document.getElementById("searchlan").innerHTML 
						+= "<option value='"+jsonData.soklista.sokdata[i].id
						+"'>"+jsonData.soklista.sokdata[i].namn+"</option>";      
                }
			}
        }
    };

    xmlhttp.open("GET", baseURL+"/platsannonser/soklista/lan", true);
    xmlhttp.send();
}); 

//
// Create eventlistener for clicks on dynamically created list of LÃ„N in mainnavlist
document.getElementById('mainnavlist').addEventListener("click", function(e){
	loadContent(e.target.id, false);
}); 

function loadContent(lanId, dataOnly)
{
	var info = document.getElementById("info");
	var xmlhttp = new XMLHttpRequest();
	info.innerHTML = "";

	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == XMLHttpRequest.DONE ) 
		{
			if (xmlhttp.status == 400) 
			{
				alert('There was an error 400');
			}
			else if (xmlhttp.status != 200) 
			{
				alert('something else other than 200 was returned');
			}
			else
			{
				var jsonData = JSON.parse(xmlhttp.responseText);
				
				jsonData = jsonData.matchningslista.matchningdata;

				for(var i = 0; i < jsonData.length; i++)
				{
					var data = jsonData[i];
					var obj = "<div class='container'>";
					obj += "<h3>" + data.yrkesbenamning + "</h3><br>";
					obj += data.annonsrubrik + "<br><br>"; 
					obj += data.anstallningstyp + "<br>";
					obj += "Antal platser: " + data.antalPlatserVisa + "<br>";
					obj += "Publiceringsdatum: " + data.publiceraddatum + "<br>";
					obj += "Sista ansökningsdag: " + data.sista_ansokningsdag + "<br><br>";
					obj += "<div class='btn'>Sug mig</div>";
					obj += "</div>";
					
					info.innerHTML += obj;
				}
			}
		}
	}

    xmlhttp.open("GET", baseURL+"/platsannonser/matchning?lanid="+lanId, true);
    xmlhttp.send();
}
