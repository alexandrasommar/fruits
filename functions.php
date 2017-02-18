<?php

	include "produkter.php";
	
	// visar specialerbjudandet om villkoren uppfylls
	function displayOffer() {

		//Om det är en jämn dag, en udda vecka och klockan är efter 13.00 men innan 17.00 så ska ett specialmeddelande visas innan beställningsformuläret där det står att varorna kan levereras redan nästa dag och att man får hela 5 % rabatt på hela beställningen.

		if (date("N") % 2 == 0 && date("W") % 2 == 1 && date("G") > 13 && date("G") < 17) {
				echo "<h3>Specialerbjudande!</h3> Gäller bara idag fram till 17:00. Varorna kan levereras redan imorgon och du får 5% rabatt på hela beställningen";
			}
	}

	// beräknar eventuella prisreduceringar/höjningar

	function discountPrice($price) {
			//med lika med tecknet sparas det nya priset i variabeln
			
			// om den aktuella dagen är en måndag ska samtliga priser reduceras med 50 %

			if (date("N")==1) {
				$price *= 0.5;

			}
			// om den aktuella dagen är en onsdag ska samtliga priser höjas till 110%

			if (date("N")==3) {
				$price *= 1.1;
			}

			// om den aktuella dagen är en fredag ska samtliga priser som är över 20 kr minskas med 1 kr

			if (date("N")==5 && $price > 20) {
				$price -= 1;
			}

			//Om det är en jämn dag, en udda vecka och klockan är efter 13.00 men innan 17.00 så ska ett specialmeddelande visas innan beställningsformuläret där det står att varorna kan levereras redan nästa dag och att man får hela 5 % rabatt på hela beställningen.

			if (date("N") % 2 == 0 && date("W") % 2 == 1 && date("G") > 13 && date("G") < 17) {
				$price *= 0.95;
			}

		return $price;

	}
	
	// beräknar leveransdatum och eventuellt reducerat totalpris

	function deliveryDay($totalpris) {
		/* Om det är en jämn måndag får man 10 kr rabatt på beställningen och den levereras redan nästa dag. */
		
		if (date("N")==1 && date("d") % 2 == 0) {
			
			$totalpris -= 10;
		
			echo "<br><h3>Speciellt idag!</h3> <p>Du får 10 kr rabatt på beställningen.</p>";

			echo "<p>Din beställning levereras redan i morgon, "
			. date("Y-m-d", strtotime("+1 day")) . "</p>";
		}

		/* Om det är en udda onsdag kostar beställningen 20 kr extra och levereras inom två arbetsdagar. */

		if (date("N")==3 && date("d") % 2 == 1) {
			
			$totalpris += 20;

			echo "<br><p>Din beställning levereras inom två arbetsdagar, senast " . date("Y-m-d", strtotime("+2 days")) . " och kostar 20 kr extra.</p>";

		}

		/* Om det är en jämn vecka och torsdag levereras beställningen om en vecka. */

		if (date("W") % 2 == 0 && date("N")==4) {
			echo "<br><p>Din beställning levereras om en vecka, " . date("Y-m-d", strtotime("+1 week")) . "</p>";
		}
		
		/* Om det är en udda vecka och söndag levereras beställningen efter fem timmar från beställningstidpunkten. */

		if (date("W") % 2 == 1 && date("N")==7) {
			echo "<br><p>Din beställning levereras idag, " . date("Y-m-d") . " om fem timmar klockan " . date("H:i", strtotime("+5 hours")) . "</p>";
		}
		

		return $totalpris;
	}


?>