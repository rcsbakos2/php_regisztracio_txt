<!DOCTYPE html>
<html>
	<head>
	<title>Bakos Richárd Gábor</title>
	<link rel="stylesheet" href="design.css" />
	<script type='text/javascript'>
    function showDiv() {
        if (document.getElementById('error').style.display == 'block') {
            document.getElementById('error').style.display = 'none';
        } else {
            
        }
    }
</script>
	<style>
	
	</style>
	 
	</head>
	<?php $valtoz =false;?>
	<body>
	
		<div id="login">
		<h1 id="kozepre">Regisztráció</h1>
		<div id="error"   <?php echo $valtoz?'style="display:none;"':'';  ?>>
		<?php
		$sikeres = false;
		if(isset($_POST["nev"])){
			$nev = $_POST["nev"];
			$jelszo1 = $_POST["jelszo1"];
			$jelszo2 = $_POST["jelszo2"];
			if(empty($nev) || !preg_match("/.{3,}/",$nev)) 
				{
					$valtoz=true; echo"Név üres vagy rövid!<br>";
				}
			if(empty($jelszo1) || $jelszo1 != $jelszo2 )
				echo"Jelszavak nem egyeznek vagy üresek!<br>";
			else {
				
				$szoveg=$nev.";".$jelszo1;
				$fn = "felhasznalok.txt";
				if( $fh=fopen($fn, "a+")){
				fputs($fh,  $szoveg  . "\r\n");
				fclose($fh);
				$sikeres = true;	
				}
			}
		}
		?>
		</div>
		<?php 
		
			echo $sikeres?"<center>Sikeres regisztráció!</center>":"";
		
		?>
	
	
		<form action="" method="POST" >
		
		
		<p id="kozepre"><Jelszó megadása:/p>
		
		<table class="x"style="width:50%">
					  
										  <tr>
											<td><label class="label_balra">Felhasználó név</label></td>
											
											<td> <input  type="text" name="nev" placeholder="min. 3 karakter"></td>
										
										  </tr>	
										   <tr>
											<td><label class="label_balra">Jelszó</label></td>
											
											<td> <input class="eltolva" type="password" name="jelszo1"></td>
											
										  </tr>	
										   <tr>
											<td><label class="label_balra">Jelszó mégegyszer</label></td>
													
											<td> <input class="eltolva" type="password" name="jelszo2"></td>
											
										  </tr>	
										  
		</table>	
		
		<br>		
		
		<input class="b_eltarol" type="submit" value="Regisztráció" onclick="showDiv()">
		
		<br>
		
		
		
		
		</div>
		
		</form>
	
	
	
	
	
	
	</body>


</html>