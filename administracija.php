<DOCTYPE html>
<html>
	<head>
		<title>Restoran MN</title>
		
		<meta charset="UTF-8">
		<meta name="autor" content="Milos Nesic">
		<meta name="description" content="Seminarski iz veb programiranja">
		
		<meta name="viewport" content="width=device-width,initial-scale=1.0" >
		
		<link rel="stylesheet" type="text/css" href="rezervacije.css" media="screen and (min-width: 800px)">
		<link rel="stylesheet" type="text/css" href="rezervacije_mobilni.css" media="screen and (max-width: 799px)">
		<style>
			
			
			
			#link_za_administraciju{
				background-color:#8B5A2B; 
			}
			
		</style>
		
		<script type='text/javascript' src='jquery-3.3.1.js'></script>
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#submit_dugme').click(function(){    
					var lozinka=$('#lozinka').val();
					
					if(lozinka!="milos"){
						window.alert("Pogresna lozinka");
						return;
					}
					
				});
			});
		</script>
		
		
		
	</head>

	<body>
		<header>
			<div id="div_heder">
				<img id="logo" src="logo.png" alt="logo">
				<nav>
					<a href="glavna.php">Početna</a>
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
					<a href="rezervacije.php" >Rezervacije</a>
					<a href="" id="link_za_administraciju">Administracija</a>
				</nav>
			</div>
		</header>
		
		
		<main>
			<div id="glavni_div">
				
				<form id="admin_log" metod='GET' action='admin_ulogovano.php' >
					
					<div>
						<label for="lozinka">Unesite lozinku:</label>
						<br>
						<input id="lozinka" name='lozinka' type="password"></input>
					</div>
					
					<div>
						<input id="submit_dugme" name='submit_dugme' type="submit" value="Uloguj se"></input>
					</div>
				</form>
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