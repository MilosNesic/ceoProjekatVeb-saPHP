<DOCTYPE html>
<html>
	<head>
		<title>Restoran MN</title>
		
		<meta charset="UTF-8">
		<meta name="autor" content="Milos Nesic">
		<meta name="description" content="Seminarski iz veb programiranja">
		
		<meta name="viewport" content="width=device-width,initial-scale=1.0" >
		
		<link rel="stylesheet" type="text/css" href="admin_ulogovano.css" media="screen and (min-width: 800px)">
		<link rel="stylesheet" type="text/css" href="admin_ulogovano_mobilni.css" media="screen and (max-width: 799px)">
		
		<style>
		
			#submit_dugme{
				margin-left:auto;
				margin-right:auto;
				color:#B8860B;
				background-color:white;
				font-size:20;
				border: solid #B8860B 3px;
			}
			#tabela{
				font-size:15;
				text-align:center;
				margin-left:auto;
				margin-right:auto;
				border:solid blue 1px;	
			}
			
			tr{
				background-color:white;
			}
						
			tr:nth-child(even){
				background-color:#f2f2f2;
			}
						
			#prva_vrsta{
				font-weight:bold;
							
			}
						
						
			h1{
				text-align:center;
				color:orange;
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
			<div id='glavni_div'>
				<?php 
					$lozinka=$_GET['lozinka'];
					if(strcmp($lozinka,"milos")!=0){
					echo "  
						<form id='admin_log' metod='GET' action='admin_ulogovano.php' >
							
							<div>
								<label for='lozinka'>Unesite lozinku:</label>
								<br>
								<input id='lozinka' name='lozinka' type='password'></input>
							</div>
							
							<div>
								<input id='submit_dugme' name='submit_dugme' type='submit' value='Uloguj se'></input>
							</div>
						</form>
					";
						
					}
					else{
					
						echo "<h1>Informacije:</h1>";
						
						include('funkcije.php');
						konektuj_se();
						
						$upit="select JMBG,ime,prezime,telefon,datum,jelovnik,broj_gostiju
							from musterija m, sala s
							where m.JMBG=s.jmbg_korisnika
							order by JMBG asc
						";
							
						$rezultat_upita=mysqli_query($veza,$upit) or die("Nesto nije ok sa upit ".mysqli_error($veza));
						
						
						echo "<div style='overflow-x:auto;'>";
						echo "<table id='tabela'>";
						echo "<tr id='prva_vrsta'><td>JMBG</td> <td>Ime</td><td>Prezime</td><td>Telefon</td><td>Datum</td><td>Jelovnik</td><td>Broj gostiju</td><tr>";
						while($red=mysqli_fetch_assoc($rezultat_upita)){
							echo "<tr>";
							$jmbg=$red['JMBG'];
							$ime=$red['ime'];
							$prezime=$red['prezime'];
							$telefon=$red['telefon'];
							$datum=$red['datum'];
							$jelovnik=$red['jelovnik'];
							$br=$red['broj_gostiju'];
							
							echo "<td>$jmbg</td> ";
							echo "<td>$ime</td> ";
							echo "<td>$prezime</td> ";
							echo "<td>$telefon</td> ";
							echo "<td  class='datum'>$datum</td> ";
							echo "<td>$jelovnik</td> ";
							echo "<td>$br</td> ";
							
							echo "</tr>";
						}
						echo "</table>";
						echo "</div>";
						
						
						
						diskonektuj_se();
					}
		
				?>
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