function KeyBoardEchapEvent(){
	$(document).keydown(function(e){
		if(e.which===27){
			$(".consol .close").trigger("click");
		}
	});
}

function howmanyPlanets(nbStars){
	if(nbStars>0){
		nbPlts = '<span>- <strong>'+nbStars+'</strong>';
		if(nbStars>1){
			nbPlts += ' planètes';
		}else{
			nbPlts += ' planète';
		}
		nbPlts += '</span>';
	}else{
		nbPlts = '';
	}
	return nbPlts;
}

function calculatePath(nodeTo){
	var lwya = $(".swya").position().left;
	var twya = $(".swya").position().top;
	var lywtg = nodeTo.position().left();
	var tywtg = nodeTo.position().top();
	var largeur = Math.abs(lwya-lywtg);
	var hauteur = Math.abs(twya-tywtg);
	var lcar = Math.pow(largeur,2);
	var hcar = Math.pow(hauteur,2);
}

function mouseoverstarover(){
	$(".starhover").bind("mouseover",function(){
		$(".infos").removeClass("more");
		$(".consol .infos").html("");
		$(".starhover").removeClass("active");
		var star = $(this).addClass("active");
		var star = $(this).next();
		calculatePath($(this));
		ttl = star.attr("title");
		var nbStars = star.children(".infoPlanet").length;
		var nbPlts = howmanyPlanets(nbStars);
		system = '<h1><span>Système stellaire de</span> '+ttl+' '+nbPlts+'</span></h1>';
		$("#subttl").html(system);
		star.children().clone().removeClass("h").appendTo(".consol .infos");
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
		$(".consol").css({"height":"100%"}).addClass("showed");
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