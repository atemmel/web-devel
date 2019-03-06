//window.onscroll = function() { displayNav(); };

/*
function displayNav()
{
	document.getElementById("navigation-sticky").style.top
		= document.body.scrollTop > 48 || document.documentElement.scrollTop > 48 ?
		"0em" : "-70px";
}
*/

document.addEventListener('DOMContentLoaded', function()
	{
		var xmlHttp = new XMLHttpRequest();
		var url = "https://api.github.com/users/atemmel/repos";

		xmlHttp.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				var githubData = JSON.parse(this.responseText);
				loadProjects(githubData);
			}
		};

		xmlHttp.open("GET", url);
		xmlHttp.send();
	});

function loadProjects(githubData)
{
	var projects = document.getElementById("projects");
	console.log(projects);

	//for (project in githubData)
	githubData.forEach(function(project)
	{
		var newContent = '<div class="project">' + project.name + '</div>';

		console.log(newContent);
		projects.innerHTML += newContent;
	});
}
