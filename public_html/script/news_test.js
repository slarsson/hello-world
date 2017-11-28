$(function(){

	var p = new panel();

	var items = document.getElementsByClassName("news-a");

	for (var i = 0; i < items.length; i++) {

		items[i].addEventListener("click", function(e){

			if(window.innerWidth < 500) {return;}

			var test = this["href"] + "?json=true";

			p.create(this["href"]);
			p.fetch(test, "<div class='news-date' title='##'>{{time_ago}}</div> <h1>{{headline}}</h1> <p>{{content}}</p><div class='news-bottom'>{{date}}<br>{{username}}</div>");
			//setTimeout(function(){p.fetch(test, "<div class='news-date' title='##'>{{time_ago}}</div> <h1>{{headline}}</h1> <p>{{content}}</p><div class='news-bottom'>{{date}}<br>{{username}}</div>")}, 1000);

			e.preventDefault();


		});

	}
	
});

class panel	 {

	constructor(){

		this.container = "panel";

		this.back = "<div id='back' class='panel back'></div>";
		this.front = "<div id='front' class='panel front'></div>";
		this.window = "<div id='content' class='window'><div class='loading'><div class='l-1'><div class='l-3'><div class='l-2'></div></div></div></div></div>";

		document.body.innerHTML += "<div id='"+this.container+"'></div>";

	}

	create(url){

		var panel = document.getElementById("panel");
		var old_url = window.location.href;

		panel.innerHTML += this.back;
		panel.innerHTML += this.front;

		window.history.pushState('x', 'x', url);
		
		document.body.style.overflow = "hidden";
		
		document.getElementById("front").innerHTML = this.window;
		
		document.getElementById("front").addEventListener("click", function(e){

			if(e.target.id == "front"){
				
				window.history.pushState('x', 'x', old_url);
				document.body.style.overflow = "auto";
				panel.innerHTML = "";

			}

		});

	}

	fetch(url, template){
		
		var xhr = new XMLHttpRequest();
		
			xhr.open("GET", url);
        	xhr.send();

      		xhr.addEventListener("readystatechange", function () {
        		
        		if(xhr.readyState == 4) {
  					
  					var data = JSON.parse(xhr.response);
  					
  					for(let x in data) {
  						
  						var reg = new RegExp("{{"+x+"}}","g");

  						template = template.replace(reg, data[x]);

  					}

					document.getElementById("content").innerHTML = template;

					/*var t = 2;
					var x;

					setInterval(function(){

						x = t*0.1;

						if(x > 1){return;}

						document.getElementById("content").style.opacity = x;

						t += 0.5;

						console.log(t);

					}, 10);*/

            	}

        	});

	}

}