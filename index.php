<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Gaïalaxy</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" id="favicon">

  <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="r/css/g.css">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="r/js/g.js"></script>
</head>
<body>

<?php
	include "r/php/generateroot.php";
	include "r/php/generateUniverse.php";
?>
	<section>
		<div id="board">
			<div id="path" class="h"></div>
			<?php

				echo "<pre>";
				//var_dump($aStars);
				echo "</pre>";

				for($stars=0; $stars<$nbStars; $stars++){
					$op = mt_rand(5, 10);
					$op = $op/10;
					$colStars = mt_rand(0, $colPoss-1);
					if($stars==0){$origin = " origin swya";}else{$origin = "";}
					echo '<div style="top:'.($aStars[$stars]["poX"]-2).'px;left:'.($aStars[$stars]["poY"]-2).'px;" class="starhover'.$origin.'" title="'.$aStars[$stars]["name"].'"></div>';
					echo '<div style="top:'.($aStars[$stars]["poX"]).'px;left:'.($aStars[$stars]["poY"]).'px;opacity:'.$op.';box-shadow:0 0 2px #'.$colors[$colStars].';" title="'.$aStars[$stars]["name"].'" class="star'.$origin.'">';
					
						if(array_key_exists("planet",$aStars[$stars])){
							$nbPlanet = count($aStars[$stars]["planet"]);
							for($planet=0;$planet<$nbPlanet;$planet++){
								if($stars==0 && $planet==0){$planetWhereYouAre = " pwya";}
								echo "<div class='h infoPlanet$planetWhereYouAre'>";
								echo "<span>".$aStars[$stars]["planet"][$planet]["name"]."</span>";
								echo "<div class='planet";
								$rayons = $aStars[$stars]["planet"][$planet]["rayon"];
								if($rayons>35 && $rayons<120){
									echo " habitable";
								}
								echo "' style='border-radius:".($rayons/16)."px;width:".($rayons/8)."px;height:".($rayons/8)."px;'></div>";
								echo "<div class='satellites'>";
								if(array_key_exists("sat",$aStars[$stars]["planet"][$planet])){
									$nbSat = count($aStars[$stars]["planet"][$planet]["sat"]);
									for($sat=0;$sat<$nbSat;$sat++){
										echo "<div class='satellite'>";
											echo "<div class='planet";
											$rayonsat = $aStars[$stars]["planet"][$planet]["sat"][$sat]["rayon"];
											if($rayonsat>35 && $rayonsat<120){
												echo " habitable";
											}
											echo "' style='border-radius:".($rayonsat/16)."px;width:".($rayonsat/8)."px;height:".($rayonsat/8)."px;'>";
											echo "</div>";
										echo $aStars[$stars]["planet"][$planet]["sat"][$sat]["name"];
										echo "</div>";
									}
								}
								echo "</div>";
								echo '</div>';
							}
						}else{
							echo "<div class='h'>Pas de planète autour de ce système stellaire</div>";
						}
					

					echo '</div>';
				}
			?>
		</div>

		<div class="consol">
			<div class="wrapTop">
				<div id="credits">1.000.000.000 ¤</div><div id="subttl"></div><div class="close"></div>
				<!-- https://en.wikipedia.org/wiki/Currency_sign_%28typography%29 -->
			</div>
			<div class="infos">
			</div>
		</div>

	</section>

</body>
</html>
