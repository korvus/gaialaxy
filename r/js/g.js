function KeyBoardEchapEvent(){
	$(document).keydown(function(e){
		if(e.which===27){
			$(".consol .close").trigger("click");
		}
	});
}


function mouseoverstarover(){
	$(".starhover").bind("mouseover",function(){
		$(".infos").removeClass("more");
		$(".consol .infos").html("");
		$(".starhover").removeClass("active");
		var star = $(this).addClass("active");
		var star = $(this).next();
		ttl = star.attr("title");
		system = '<h1><span>Système stellaire de</span> '+ttl+'</h1>';
		$("#subttl").html(system);
		star.children().clone().appendTo(".consol .infos");
		var w = 0;
		var wUnit = 0;
		star.find(".infoPlanet").each(function(i){
			wUnit = $(this).width();
			w = w+wUnit;
		});
		if(w>950){
			$(".infos").addClass("more");
		}
	})	
}

function starclick(){
	$(".starhover").click(function(e){
		$(".starhover").unbind("mouseover");
		$(".infos").removeClass("more");
		e.preventDefault();
		$(".consol").height("500px").addClass("showed");
		KeyBoardEchapEvent();
	})
}

function closeclick(){
	$(".consol .close").click(function(e){
		e.preventDefault();
		$(".consol").height("100px").removeClass("showed");
		mouseoverstarover();
		//$(".starhover").bind("mouseover");
	})
}

$(document).ready(function(){

	mouseoverstarover();
	starclick();
	closeclick();

})