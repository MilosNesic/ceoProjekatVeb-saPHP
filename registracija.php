<DOCTYPE html>
<html>
	<head>
		<title>Registracija</title>
		
		<meta charset="UTF-8">
		<meta name="autor" content="Milos Nesic">
		<meta name="description" content="Seminarski iz veb programiranja">
		
		<meta name="viewport" content="width=device-width,initial-scale=1.0" >
		
		<link rel="stylesheet" type="text/css" href="rezervacije.css" media="screen and (min-width: 800px)">
		<link rel="stylesheet" type="text/css" href="rezervacije_mobilni.css" media="screen and (max-width: 799px)">
		<style>
			#poruka{
				font-size:35;
				color:red;
				font-weight:bold;
				text-align:center;
			}
		</style>
		
		<script type='text/javascript' src='jquery-3.3.1.js'></script>
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#registruj_se').click(function(){    
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
					
					var ime=$('#ime').val();
					var prezime=$('#prezime').val();
					var telefon=$('#telefon').val();
					
					telefon=parseInt(telefon);
					if(isNaN(telefon)){
						window.alert("Nepravilno unet telefon, postoji nesto sto nije broj");
						return;
					}
					
			
				});
				
				
			});
		</script>
	</head>

	<body>
	
		
		<main>
			<div id="glavni_div">
				
				<p id='poruka'>
					<?php 
						if(isset($_GET['registruj_se'])){
							include('funkcije.php');
							konektuj_se();
					
							$jmbg=$_GET['jmbg'];
							$ime=$_GET['ime'];
							$prezime=$_GET['prezime'];
							$telefon=$_GET['telefon'];
							
							if(strlen($jmbg)==13 and strlen($telefon)>0 and strpos($jmbg,'-')==false and intval($jmbg)!=0 and intval($telefon)!=0){
							
								//provera da li vec postoji korisnik sa tim jmbg-om
								
								$upit_jmbg="select*
									from musterija
									where JMBG='$jmbg'";
						
								$rezultat_upita=mysqli_query($veza,$upit_jmbg) or die("Neto nije ok sa upit ".mysqli_error($veza));
								$red=mysqli_fetch_assoc($rezultat_upita);
								
					
								$n=mysqli_num_rows($rezultat_upita);
								
								if($n==1){
									echo "Vec postoji korisnik sa tim jmbg-om. Proverite da li ste dobro uneli svoj jmbg.";
								}
								else{
									$upit="insert into musterija
									values('$jmbg','$ime','$prezime','$telefon');";
								
									$rezultat=mysqli_query($veza,$upit) or die("Nije dobar upit".mysqli_error($veza));
									
									
									if($rezultat==true){
										echo "Uspesno ste se registrovali.";
									}
									else{
										echo "Problem sa bazom, Pokusajte registraciju kasnije. Hvala.";
									}
								}
								
								
							}
					
							
							
						}
				
					?>
				</p>
				
				<form id="rezervacija" metod='GET' action=''>
					
					<div>
						<label for="jmbg">Unesite JMBG:</label>
						<br>
						<input id="jmbg" name='jmbg' type="text"></input>
					</div>
					<div>
						<label for="ime">Ime:</label>
						<br>
						<input id="ime" name='ime' type="text"></input>
					</div>
					
					<div>
						<label for="prezime">Prezime:</label>
						<br>
						<input id="prezime" name='prezime' type="text"></input>
					</div>
					
					<div>
						<label for="telefon">Broj telefona:</label>
						<br>
						<input id="telefon" name='telefon' type="text"></input>
					</div>
					<div>
						<input id="registruj_se" name='registruj_se' type="submit" value="Registruj se"></input>
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