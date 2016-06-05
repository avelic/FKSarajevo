<!DOCTYPE html>
<html>
<head>
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">

		<title>Fudbalski Klub Sarajevo</title>
		<link rel="stylesheet" type="text/css" href="korisnik-css.css">
		<script type="text/javascript" src="Reg.js"></script>
	

	</head>
	<body>
		<header>

			<h1 >Fudbalski Klub Sarajevo</h1>
			<h2 class="Logo">HzsA</h2>
			<nav>
				<ul >
					<li><a href="korisnik.php" class="meni">POČETNA</a></li>
          <li><a href="Historija.php" class="meni" >HISTORIJAT</a></li>
          <li><a href="Tabela.php" class="meni" >TABELA</a></li>
          <li><a href="Clanovi.php" class="meni" >ČLANOVI</a></li>
          <li><a href="Kontakt.php" class="meni" >KONTAKT</a></li>
          <li><a href="vijest.php" class="meni" >DODAJ IGRACA</a></li>
				</ul>
			</nav>
		</header>		
		<p class="rec">"...Svi u napad jedna je Hase..." </p>
		
		<p class="rec1"> Postani član, registruj se:  </p>
		
		

		<div class="Forma">
			<div class="unos">
				<label for="kor" class="lab">Korisnik: </label> 
				<input class="polje" type="text" id="kor" oninput="ispravnostUser()" placeholder="Do 20 karaktera">

			</div>
			<div class="unos">
				<label for="em" class="lab" >E mail: </label> 
				<input class="polje" type="email" id="em" oninput="ispravnostEmail() " placeholder="Format:neko.neki@gmail.com">

			</div>
			<div class="unos">
				<label for="ps" class="lab">Lozinka: </label> 
				<input class="polje" type="password" id="ps">

			</div>
			<div class="unos">
				<label for="dr" class="lab">Drzava: </label> 
				<select class="polje"  id="dr"> 
                  <option value="bih">BIH </option>
                  <option value="hr">HR </option>
                  <option value="srb">SRB </option>
				</select> 

			</div>
			<div class="unos">
				<label for="bt" class="lab" >Broj Telefona:</label> 
				<input   class="polje" type="text" id="bt" oninput="ispravnostTelefona()"   placeholder="Format:+38762785852"  >

			</div><br>
			<button class="Reg" >Registracija</button> 
		</div>

		<br>
		<img class="clan" src="clan.jpg"  alt="clan">
		<footer>

			Copyright © 2016 by MojeSarajevo.ba | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno
			Owned by TKC Team | Designed by Adin Velic| Developed by Adin Velic
		</footer>
		

		


	</body>
	</html>