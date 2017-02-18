<?php 
	include "meny.php";
	include "produkter.php";
	include "functions.php";

	// Kolla om telefonnummer är ifyllt

		if($_POST["tfn"] == "") {
			echo "<p>Ojdå! Du glömde visst fylla i telefonnummer. Backa för att rätta till det.</p>";
			exit; // stänger ner programmet
	}
	// Om telefonnummer är ifyllt visas detta istället
		if($_POST['tfn'] != "") {
			echo "<h2>Tack för din beställning!</h2><p>Nedan följer din beställningsbekräftelse samt dina kontaktuppgifter.</p>";
	}
		?>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="tack">
			<?php
				if ($_POST) {
						echo "<p>Dina kontaktuppgifter<br>" 
						. $_POST['namn'] . "<br>"
						. "Adress: " . $_POST['adress'] . "<br>"
						. "Telefonnummer: " . $_POST['tfn'] . "<br>"
						. "E-post: " . $_POST['mail'] 
						. "<br></p>";
					}
				?>
			</div>
			<h2>Din beställning:</h2>
			<?php

			$totalpris = 0;

			for ($i = 0; $i<count($products); $i++) {
				$sort = $products[$i][0];
				$pris = discountPrice($products[$i][2]);
				$antal = $_POST["f-".$i];
				
					// Om det inte är något beställt av en viss frukt, visa inget om den

					if($antal <= 0){
						continue;

						//använd break när man vill avbryta hela loopen
						//andvänd continue när man vill avbryta aktuell iteration/loop, men fortsätta med övriga
					}


					$pris_produkt = $pris * $antal;
					$totalpris += $pris_produkt;

					// visar vad priset per produkt blir och hur många en beställt

					echo $sort . " kostar " . $pris . " kr/st. Du beställde " . $antal . " st. Det blir " . $pris_produkt . " kr.<br>";

				}

				// visar beräknat leveransdatum och eventuellt reducerat/höjt totalpris

					echo "<p class='totalt'>Det totala beloppet blir " . deliveryday($totalpris) . " kr.</p>";
				?>

		</div>
</main>

<?php include "footer.php" ?>