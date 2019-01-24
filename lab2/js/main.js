"use strict";

let baseURL = "http://api.arbetsformedlingen.se/af/v0";

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

//Ladda material vid länkclick
document.getElementById('mainnavlist').addEventListener("click", function(e)
{
	loadContent(e.target.id);
}); 

//Ladda material vid ändring i dropdownmenyn
document.getElementById("searchlan").addEventListener('change', function(e)
{
	var id = e.target.options[e.target.selectedIndex].value;

	loadContent(id);
});

document.getElementById("searchbutton").addEventListener('click', function(e)
{
	var query = document.getElementById("searchText").value;

	if(query == "") return;

	searchContent(query, false);
});

function createFullInfoStr(data)
{
	var obj = "<div class='container'>";
	obj += "<h3>" + data.yrkesbenamning + "</h3><br>";
	obj += data.annonsrubrik + "<br><br>"; 
	obj += "Anställningstyp: " + data.anstallningstyp + "<br>";
	obj += "Antal platser: " + data.antalPlatserVisa + "<br>";
	obj += "Publiceringsdatum: " + data.publiceraddatum + "<br>";
	obj += "Sista ansökningsdag: " + data.sista_ansokningsdag + "<br><br>";
	obj += "<a href='" + data.annonsurl + "'><div class='btn'>Sug mig</div></a>";
	obj += "</div>";

	return obj;
}

function createSmallInfoStr(data)
{
	var obj = "<div class='container'>";
	obj += "<h3>" + data.namn + "</h3>";
	obj += "Antal platsannonser: " + data.antal_platsannonser + "<br>";
	obj += "Antal lediga jobb: " + data.antal_ledigajobb + "<br>";
	return obj;
}

//Ladda generellt filtrerat via län
function loadContent(lanId)
{
	var info = document.getElementById("info");
	var xmlhttp = new XMLHttpRequest();
	var onlyData = document.getElementById("onlyit").checked;
	var numRows = document.getElementById("numrows").value;
	var target = onlyData ? 
		baseURL+"/platsannonser/matchning?lanid="+lanId+"&yrkesomradeid=3&antalrader="  + numRows:
		baseURL+"/platsannonser/matchning?lanid="+lanId+"&antalrader=" + numRows;

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
					var obj = createFullInfoStr(data);

					info.innerHTML += obj;
				}
			}
		}
	};

    xmlhttp.open("GET", target, true);
    xmlhttp.send();
}

function searchContent(query, dataOnly)
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
				jsonData = jsonData.soklista.sokdata;

				for(var i = 0; i < jsonData.length; i++)
				{
					var data = jsonData[i];
					var obj = createSmallInfoStr(data);
					info.innerHTML += obj;
				}
			}
		}
	};

    xmlhttp.open("GET", baseURL+"/platsannonser/soklista/yrken/"+query, true);
    xmlhttp.send();
}
