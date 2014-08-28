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
			<?php
				for($stars=0; $stars<$nbStars; $stars++){
					$op = mt_rand(5, 10);
					$op = $op/10;
					$colStars = mt_rand(0, $colPoss);
					if($stars==0){$origin = " origin";}else{$origin = "";}
					echo '<div style="top:'.($aStars[$stars]["poX"]-2).'px;left:'.($aStars[$stars]["poY"]-2).'px;" class="starhover'.$origin.'" title="'.$aStars[$stars]["name"].'"></div>';
					echo '<div style="top:'.$aStars[$stars]["poX"].'px;left:'.$aStars[$stars]["poY"].'px;opacity:'.$op.';box-shadow:0 0 2px #'.$colors[$colStars].';" title="'.$aStars[$stars]["name"].'" class="star'.$origin.'">';
					
						$nbPlanet = count($aStars[$stars]["planet"]);
						if($nbPlanet>0){
							for($planet=0;$planet<$nbPlanet;$planet++){
								echo "<div class='infoPlanet'>";
								echo "<span>".$aStars[$stars]["planet"][$planet]["name"]."</span>";
								echo "<div class='planet";
								$rayons = $aStars[$stars]["planet"][$planet]["rayon"];
								if($rayons>35 && $rayons<120){
									echo " habitable";
								}
								echo "' style=';border-radius:".($rayons/16)."px;width:".($rayons/8)."px;height:".($rayons/8)."px;'></div>";
								echo '</div>';
							}
						}else{
							echo "<div class='infoPlanet'>Pas de planète autour de ce système stellaire</div>";
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