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
			
		</style>
		
		
		<script type='text/javascript' src='jquery-3.3.1.js'></script>
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#submit_dugme').click(function(){    
					var jmbg=$('#jmbg').val();
					
					if(jmbg.length!=13){
						window.alert("Pogresna duzina jmbg-a");
						return;
					}
					
					jmbg=parseInt(jmbg);
					if(isNaN(jmbg)){
						window.alert("Jmbg nije broj");
						return;
					}
					if(jmbg<0){
						window.alert("Nema minusa ispred");
						return;
					}
					
					var datum=$('#datum').val();
					var dan=datum.substring(0,2);
					var mesec=datum.substring(3,5);
					var godina=datum.substring(6,10);
					var treci_karakter=datum.substring(2,3);
					var sesti_karakter=datum.substring(5,6);
			
					
					if(isNaN(parseInt(dan)) || isNaN(parseInt(mesec)) || isNaN(parseInt(godina)) || sesti_karakter!='.' || treci_karakter!='.' ){
						window.alert("Nije dobar datum");
						return;
					}
					
					var jelovnik=$('#selekt_jelovnik').val();
					if(jelovnik=='-'){
						window.alert("Nije odabran jelovnik");
						return;
					}
					
					var br_gostiju=$('#br_gostiju').val();
					br_gostiju=parseInt(br_gostiju);
					if(isNaN(br_gostiju)){
						window.alert("Nije unet broj gostiju");
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
					<a href="rezervacije.php" id="link_za_rezervacije">Rezervacije</a>
					<a href="administracija.php">Administracija</a>
				</nav>
			</div>
		</header>
		
		<main>
			<div id="glavni_div">
				<p id='poruka'>
					<?php 
						if(isset($_GET['submit_dugme'])){
							include('funkcije.php');
							konektuj_se();
					
							$jmbg=$_GET['jmbg'];
							$datum=$_GET['datum'];
							$jelovnik=$_GET['jelovnik'];
							$broj=$_GET['broj'];
							
							if(strlen($jmbg)==13 and intval($jmbg)!=0 and strpos($jmbg,'-')==false and intval(substr($datum,0,2))!=0 and intval(substr($datum,3,2))!=0 and intval(substr($datum,6,4))!=0 and substr($datum,2,1)=='.' and substr($datum,5,1)=='.' and $jelovnik!="-" and intval($broj)!=0 ){
								//provera dali postoji korisnik sa tim jmbg-om
							
								$upit_jmbg="select*
									from musterija
									where JMBG='$jmbg'";
						
								$rezultat_upita=mysqli_query($veza,$upit_jmbg) or die("Neto nije ok sa upit ".mysqli_error($veza));
								$red=mysqli_fetch_assoc($rezultat_upita);
								
					
								$n=mysqli_num_rows($rezultat_upita);
					
								if($n==0){
									echo "Niste registrovani. Molimo registrujte se i tek onda popunite formular za rezervaciju.";
								}
								else{
									
								
											
									//ako postoji onda se upisuje u tabeli sala rezervacija AKO TAJ DATUM NIJE ZAUZET
									
									
									$upit_datum="select*
									from sala
									where datum='$datum'";
						
									$rezultat_upita=mysqli_query($veza,$upit_datum) or die("Neto nije ok sa upit ".mysqli_error($veza));
									$red=mysqli_fetch_assoc($rezultat_upita);
								
					
									$n=mysqli_num_rows($rezultat_upita);
									
									if($n!=0){
										echo "Nije slobodan trazeni datum, pokusajte sa jos nekim";
									}
									else{
									
										//ako datum slobodan
										$upit="insert into sala
											values('$jmbg','$datum','$jelovnik','$broj');";
									
										$rezultat=mysqli_query($veza,$upit) or die("Nije dobar upit".mysqli_error($veza));
										
										
										if($rezultat==true){
											echo "Cestitamo. Odabrali ste da na pravom mestu organizujete svoje slavlje.<br>";
											echo "U sledecih 48 sati bicete pozvani zbog potvrdjivanja dogovora i ostalih formalnosti.";
										}
										else{
											echo "Problem sa bazom, Pokusajte registraciju kasnije. Hvala.";
										}
									}
								
								}
							}
							
							
							
						}
				
					?>
				</p>
				<form id="rezervacija" metod='GET' action='' >
					<span><a href='registracija.php' target='blank' id='pravljenje_naloga'>Registruj se</a></span>
					<div>
						<label for="jmbg">Unesite JMBG:</label>
						<br>
						<input id="jmbg" name='jmbg' type="text"></input>
					</div>
					<div>
						<label for="datum">Zeljeni datum <br> (u obliku dd.mm.gggg):</label>
						<br>
						<input id="datum" name='datum' type="text"></input>
					</div>
					<div>
						<label for="selekt_jelovnik">Izaberi jelovnik:</label>
						<br>
						<select id="selekt_jelovnik" name='jelovnik'>
							<option value="-">--select--</option>
							<option value="Jelovnik 1">Jelovnik 1</option>
							<option value="Jelovnik 2">Jelovnik 2</option>
							<option value="Jelovnik 3">Jelovnik 3</option>
						</select>
					</div>
					<div>
						<label for="br_gostiju">Broj gostiju:</label>
						<br>
						<input id="br_gostiju" name='broj' type="text"></input>
					</div>
					<div>
						<input id="submit_dugme" name='submit_dugme' type="submit" value="Rezervisi"></input>
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