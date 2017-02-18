<?php include "meny.php"; ?>
		<h1>Frukt.</h1>
		<img src="img/peach.png">
		<p>Det behöver inte vara svårare än så. Som mellanmål, i en smoothie eller en frukttallrik.<br>Fyll i antal och kontaktuppgifter för att beställa frukt enkelt, snabbt och smidigt.</p>
		</div>
	</header>
	<main>
		<div class="container">
			<?php
				include "produkter.php";
				include "functions.php";

				?>
				<div class="special">
					<?php echo displayOffer(); ?>
				</div>
				<h2>1. Se vilka frukter vi har och fyll i vilket antal du vill ha.</h2>
			<form method="post" action="confirmation.php">
				<table>
					<tr>
						<th>Frukter</th>
						<th>Vikt</th>
						<th>Priser</th>
						<th>Ange antal</th>
					</tr>
					<?php
						for($i=0; $i<count($products); $i++) {
							?>
							<tr>
								<td><?php echo $products[$i][0]; ?></td>
								<td><?php echo $products[$i][1]; ?> g 
								</td>
								<td><?php echo discountPrice($products[$i][2]); ?> kr</td>
								<td><input type="number" name="f-<?php echo $i; ?>" placeholder="Fyll i antal"></td>
							</tr>
							<?php
						}
					?>
				</table>
			</div>
			<div class="kontakt">
				<section class="container">
					<h2>2. Fyll i dina kontaktuppgifter</h2>
					<label for="namn">Namn:</label>
					<input type="text" name="namn" placeholder="Fyll i för-och efternamn">
					<label for="adress">Adress:</label>
					<input type="text" name="adress" placeholder="Din adress">
					<label for="nummer">Telefonnummer:</label>
					<input type="tel" name="tfn" placeholder="Telefonnummer">
					<label for="mail">E-post:</label>
					<input type="email" name="mail" placeholder="E-post">
				</section>
			</div>
			<div class="container bestall">
				<h2>3. Beställ</h2>
				<input type="submit" value="Beställ" name="submit">
			</div>
		</form>
	</main>
	<?php include "footer.php"; ?>