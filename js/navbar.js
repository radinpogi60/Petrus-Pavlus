var mediaScreen = window.matchMedia("(max-width: 750px)");
var mediaScreen1 = window.matchMedia("(max-width: 815px)");

if (mediaScreen.matches) {
	$(".navbar a").click(function() {
		$(".navbar").slideUp();
	});
}

var navList = document.getElementById('nav-list');

if (navList.className != "navbar") {
	$("#navbar a").css("color", "white");
}

window.onscroll = function() {scrollFunction()};


function functionToggle() {
	var navList = document.getElementById('nav-list');
	if (navList.className == "navbar") {
		navList.className += " responsive";
		$(".navbar").slideDown();
	}else{
		navList.className = "navbar";
		$(".navbar").slideUp();

	}
}

function scrollFunction() {
	var body = document.getElementsByTagName('body');
	var screenWidth = window.matchMedia("(max-width:716px)");
	if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
		$(".navcontainer-1").css("transition", "0.4s");
		$(".navcontainer-1").css("border", "3px solid orange");
		$(".navcontainer-1").css("border-width", "0 0 3px 0");
		if (!screenWidth.matches) {
			$(".navbar a").css("color", "black");
			$(".navcontainer-1").css("background-color", "#fff200");
		}else{
			$(".navcontainer-1").css("background-color", "#fff200");
			$(".navbar a").css("color", "white");
		}


	}else{
		if (!screenWidth.matches) {
			$(".navbar a").css("color", "white");
			$(".navcontainer-1").css("background-color", "transparent"); 
		}else{
			$(".navcontainer-1").css("background-color", "#fff200");
			$(".navbar a").css("color", "white");
		} 

		$(".navcontainer-1").css("border", "0");
	}
}

