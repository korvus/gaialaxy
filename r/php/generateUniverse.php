<?php

$aStars = array();

$nbStars = mt_rand(50, 150);

/* colors Shadow */
$colors = array("a2ceff","e02dda","bcff75","ffc3c3","fcff0b","ffffff");
$colPoss = count($colors);

function generateSatelits($ss,$planet,$sizePlanet){
	global $aStars;
	$more = round(pow($sizePlanet, 0.2));
	if($sizePlanet>30){
		$maxSats = round($sizePlanet/100)+$more;
		$sats = mt_rand(0, $maxSats);
		if($sats>0){
			$sat = array();
			$max = round($sizePlanet/8);
			for($h=0;$h<$sats;$h++){
				$aStars[$ss]["planet"][$planet]["sat"][$h]["rayon"] = mt_rand(1,$max);
				$aStars[$ss]["planet"][$planet]["sat"][$h]["name"] = createAname(2,10);
				if($aStars[$ss]["planet"][$planet]["sat"][$h]["rayon"]>35 && $aStars[$ss]["planet"][$planet]["sat"][$h]["rayon"]<120){
					$aStars[$ss]["planet"][$planet]["sat"][$h]["habitabilite"] = 1;
				}
			}
		}
	}
}

for($g=0; $g<$nbStars; $g++){
	$aStars[$g]["id"] = $g;
	if($g==0){
		$aStars[$g]["poX"] = 470;
		$aStars[$g]["poY"] = 470;
	}else{
		$aStars[$g]["poX"] = mt_rand(1, 980);
		$aStars[$g]["poY"] = mt_rand(1, 980);
	}
	$aStars[$g]["name"] = createAname(2,10);
	if($g==0){
		$nbrPlanet = mt_rand(1, 15);
	}else{
		$nbrPlanet = mt_rand(0, 15);
	}
	if($nbrPlanet>0){
		for($g1=0; $g1<$nbrPlanet; $g1++){
			if($g==0 && $g1==0){
				$aStars[$g]["planet"][$g1]["name"] = createAname(4,8);
				$aStars[$g]["planet"][$g1]["rayon"] = mt_rand(35,120);								
				$aStars[$g]["planet"][$g1]["habitabilite"] = 1;
				generateSatelits($g,$g1,$aStars[$g]["planet"][$g1]["rayon"]);
			}else{
				$aStars[$g]["planet"][$g1]["name"] = createAname(4,8);
				$aStars[$g]["planet"][$g1]["rayon"] = mt_rand(15,1000);
				if($aStars[$g]["planet"][$g1]["rayon"]>35 && $aStars[$g]["planet"][$g1]["rayon"]<120){
					$aStars[$g]["planet"][$g1]["habitabilite"] = 1;
				}
				generateSatelits($g,$g1,$aStars[$g]["planet"][$g1]["rayon"]);
			}
			//if()
		}
	}
}

//var_dump($aStars);