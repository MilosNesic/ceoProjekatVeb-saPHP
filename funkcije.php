<?php 
	function konektuj_se(){
		global $veza;
		$veza=mysqli_connect('localhost','root','root','restoran');
		//ako je doslo do greske
		if(mysqli_connect_errno()){
			die("Nije uspelo povezivanje sa bazom ".mysqli_connect_error(veza));
		}
	}
	
	function diskonektuj_se(){
		global $veza;
		mysqli_close($veza);
	}
?>