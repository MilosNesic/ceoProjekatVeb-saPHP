<DOCTYPE html>
<html>
	<head>
		<title>Restoran MN</title>
		
		<meta charset="UTF-8">
		<meta name="autor" content="Milos Nesic">
		<meta name="description" content="Seminarski iz veb programiranja">
		
		<meta name="viewport" content="width=device-width,initial-scale=1.0" >
		
		<link rel="stylesheet" type="text/css" href="glavna.css" media="screen and (min-width: 800px)">
		<link rel="stylesheet" type="text/css" href="glavna_mobilni.css" media="screen and (max-width: 799px)">
	</head>

	<body>
	
		<header>
			<div id="div_heder">
				<img id="logo" src="logo.png" alt="logo">
				<nav>
					<a id="link_za_pocetnu" href="">Početna</a>
					<div class="dropdown">
						<a class="dropbtn">Jelovnik
						  <i class="fa fa-caret-down"></i>
						</a>
						<div class="dropdown-content">
						  <a href="jelovnik1.php">Jelovnik 1</a>
						  <a href="jelovnik2.php">Jelovnik 2</a>
						  <a href="jelovnik3.php">Jelovnik 3</a>
						</div>
					 </div>
					<a href="rezervacije.php">Rezervacije</a>
					<a href="administracija.php">Administracija</a>
				</nav>
			</div>
		</header>
		
		<main>
			<div id="glavni_div">
				<h1>
				DOBRODOSLI U RESTORAN MN !!!
				</h1>
				<p>
					Ukoliko ste resili da kazete veliko "DA" onda je svakako najbitnije kome cete to reci.
					<br>A da Vase slavlje bude nezaboravno pobrinuce se osoblje restorana MN!
				</p>
				<div id="omotac1">
					<img id="sala1" src="sala1.jpg" alt="sala">
					<p >
						
						Za modernu i prostranu salu koja prima cak i do 400 gostiju sami birate dekoraciju.
					</p>
				</div>
				<div id="omotac2">
					<img id="sala2" src="sala2.jpg" alt="sala2">
					<p>
						Dobra hrana, ljubazno osoblje i odlicna atmosfera!
					</p>
				</div>
				<p id="zadnji">
					<br>
					<br>
					Cekamo Vas!
					
				</p>
			</div>
		</main>
		
		<footer>
			<div id="glavni_footer_div">
				<div id="footer_div_levi">
					<p>Kontakt:
						<br>Adresa: selo Orašac
						<br>Tel: 123-456
						<br>Mail: nekimail@gmail.com
					</p>
					
				</div>
				
			</div>
		</footer>


	</body>
</html>