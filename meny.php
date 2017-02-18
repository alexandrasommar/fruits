<!DOCTYPE html>
<html>
<head>
	<title>Frukt</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body>
	<header>
			<div class="container">
			<div class="time">
						<?php 
						setlocale(LC_ALL, 'sv_SE');
						echo strftime('%A' . "en" . " den" . '%e %B %G' . ".");
						?>
					</div>
			
