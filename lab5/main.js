window.onscroll = function() { displayNav(); };

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

function displayNav()
{
	document.getElementById("navigation-sticky").style.top
		//= document.body.scrollTop > 48 || document.documentElement.scrollTop > 48 ?
		= document.body.scrollTop > 400 || document.documentElement.scrollTop > 400 ?
		"0em" : "-70px";
}

function loadProjects(githubData)
{
	var projects = document.getElementById("projects-container");
	console.log(projects);

	githubData.forEach(function(project)
	{
		if(project.name.length > 15)
		{
			project.name = project.name.substr(0, 12) + '...';
		}

		if(project.language == null)
		{
			project.language = 'Document';
		}

		var newContent = '<a target="_blank" href="' + project.html_url + '">'
			+ '<div class="project">' + project.name + '<div class="mini">' 
			+ project.language + '</div></div></a>';

		console.log(newContent);
		projects.innerHTML += newContent;
	});
}
