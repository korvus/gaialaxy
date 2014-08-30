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
	var lwya = $(".swya").position().left+3;
	var twya = $(".swya").position().top+3;
	var lywtg = nodeTo.position().left+3;
	var tywtg = nodeTo.position().top+3;
	var largeur = lwya-lywtg;
	var hauteur = twya-tywtg;
	var largeurpos = Math.abs(largeur);
	var hauteurpos = Math.abs(hauteur);
	var lcar = Math.pow(largeurpos,2);
	var hcar = Math.pow(hauteurpos,2);
	var total = lcar+hcar;
	var path = Math.round(Math.sqrt(total));
	var degree = Math.acos(largeurpos/path)*(180/Math.PI);
	if(tywtg>twya && lywtg>lwya){degree = degree+90;}//Bas droite
	if(tywtg<twya && lywtg>lwya){degree = Math.abs(degree-90);}//haut droite
	if(tywtg<twya && lywtg<lwya){degree = degree-90;}//haut gauche
	if(tywtg>twya && lywtg<lwya){degree = (degree+90)*-1;}//Bas gauche
	$("#path").height(path).css({"top":tywtg,"left":lywtg,'transform':'rotate('+degree+'deg)'}).removeClass("h");
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
		$(".consol").height("200px").removeClass("showed");
		mouseoverstarover();
		//$(".starhover").bind("mouseover");
	})
}

$(document).ready(function(){

	mouseoverstarover();
	starclick();
	closeclick();

})