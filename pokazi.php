<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Fudbalski Klub Sarajevo</title>
    <link rel="stylesheet" type="text/css" href="korisnik-css.css">
    <script src="VrijemeIspisi.js" type="text/javascript"> </script>
    <script src="Filtriraj.js" type="text/javascript"> </script>

    


  </head>
  <body > 

    <header>

      <h1 >Fudbalski Klub Sarajevo</h1>
      
      <h2 class="Logo">HzsA</h2>
      <h4 id="log"><a href = "./../logout.php" title = "Logout">Logout</a></h4>
      <nav>
        <ul class="intro" >
          <li><a href="korisnik.php" class="meni">POČETNA</a></li>
          <li><a href="Historija.php" class="meni" >HISTORIJAT</a></li>
          <li><a href="Tabela.php" class="meni" >TABELA</a></li>
          <li><a href="Clanovi.php" class="meni" >ČLANOVI</a></li>
          <li><a href="Kontakt.php" class="meni" >KONTAKT</a></li>
          <li><a href="vijest.php" class="meni" >DODAJ VIJEST</a></li>
        </ul>
      </nav>
    </header>   <br>
    <p class="rec">"...Od malena pa za sva vremena..." </p> 
 
    
<h1>Igrac </h1>
    <?php
    $komen = 0;
    $pisac = $_SESSION['id'];
	$veza = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "wt", "wt");
    $veza->exec("set names utf8");
	if(!isset($_GET['vijest'])) {    
	$i = $_GET['IID'];	
        
     $rezultat = $veza->query("select ime, slika, opis,komenatar,autor,broj, UNIX_TIMESTAMP(vrijeme) vrijeme2 from vijest where id = '$i'");
     
     if (!$rezultat) {
          $greska = $veza->errorInfo();

          print "SQL greška: " . $greska[2];
          exit();
     }
     
     foreach ($rezultat as $vijest) {
        $pom = $vijest['autor'];
        $rez = $veza->query("select username, password from autori where id ='$pom' ");
        $admin = $rez->fetch();
        $komen = $vijest['komenatar'];
     	print "<div class='col'  > ";
     	
     			print "<h2>".$vijest['ime']."</h2><br>";
		
		print  "<img alt='Jesic' class='Jesic' src='".$vijest['slika'].".jpg'><br>";
		print "<p>".$vijest['opis']."</p><br>";
		print "<a id='pokazi' href='pisac.php?IID=".$pom."' ><p> Autor: ".$admin['username']."</p></a><br>";
		print "<small> Datum objave:" .date("d.m.Y. (h:i)",$vijest['vrijeme2'])."</small><br>";   
    if ($komen){  print "<p> Komentari dozvoljeni</p><br>";}
    else{ print "<p>Komentari zabranjeni</p><br>";} 
		print "</div>";  
		
/*$brojKomentara = $veza->query("select count(*) from komentar where vijest=".$vijest['id'].";");				
		if (!$brojKomentara) {
	      $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
		}	
		$broj = $brojKomentara->fetchColumn();
		
		if($broj == 0) print "<small>Nema komentara</small>";
		else { 
			if($broj == 1) print "<a href=t8.php?vijest=".$vijest['id'].">".count($brojKomentara)." komentar </small>";
			else print "<small>".count($brojKomentara)." komentara </small>";
		}*/
     }

     if ($komen){
      $kom = $veza->query("select Autor_ID, Kom, UNIX_TIMESTAMP(Vrijeme) vrijeme2 from komentar where Vijest_ID = '$i'");
     
     if (!$rezultat) {
          $greska = $veza->errorInfo();

          print "SQL greška: " . $greska[2];
          exit();
     }

      foreach ($kom as $komentar) {
        $pom = $komentar['Autor_ID'];
        $rez = $veza->query("select username, password from autori where id ='$pom' ");
        $admin = $rez->fetch();
     	print "<div class='komentar'> ";
     	
 
		
		print "<p>".$komentar['Kom']."</p>";
		print "<a id='pokazi' href='pisac.php?IID=".$pom."' ><p> Autor: ".$admin['username']."</p></a>";
		print "<small> Datum objave:" .date("d.m.Y. (h:i)",$komentar['vrijeme2'])."</small>";    
		print "</div>";  
		}

		}

	}


	/*else {
		$rezultat = $veza->query("select id, Naslov,Slika,Opis, UNIX_TIMESTAMP(Vrijeme) vrijeme2, from vijest where id=".$_GET['vijest'].";");
	    if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: ". $greska[2];
          exit();
     }
		
		 foreach ($rezultat as $vijest) {
		print "<h2>".$vijest['Naslov']."</h2><br>";
		print  "<img alt='Jesic' class='Jesic' src='".$vijest['Slika']."jpg'><br>";
		print "<p>".$vijest['Opis']."</p><br>";
		print "<small>".date("d.m.Y. (h:i)",$vijest['vrijeme2'])."</small><br>";      
		$rezultat = $veza->query("select Text,Vrijeme from komentar where id=".$_GET['vijest'].";");
		echo "<h3>Komentar</h3>";
		foreach($rezultat as $komentar) {
			print "<p>".$komentar['Text']."</p>";
			print "<small>".date("d.m.Y.(h:i)",$komentar['Vrijeme'])."<small>";
			
			
		}
		}
	}
	*/
	if (isset($_POST['dajkom']) && !empty($_POST['kom']) )
        { 
             $te = $_POST['kom'];
            $veza = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "wt", "wt");
    $veza->exec("set names utf32");
    if(!isset($_GET['pokazi'])) {    
           
             $ko = $veza->query ("INSERT INTO komentar (Vijest_ID,Autor_ID,Kom,Vrijeme) VALUES ('$i', '$pisac', '$te',CURRENT_TIMESTAMP)"); 

              header('Refresh: 1; URL = ./../pokazi.php?IID='.$i.'');
             
     if (!$ko) {
      $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
    }
		}}
    ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
    <div class="komentar">
     <input align="right" id="kom"  name="kom" type="text" required placeholder="Unesite komenar" /><br><br>
     <input align="right" id ="komb" type="submit" name="dajkom" value="Ostavi Komentar" >
   </div>
 </form>
  </body>
</html>
