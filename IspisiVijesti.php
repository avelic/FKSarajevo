
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="korisnik-css.css">
 
  </head>
  <body>
    

    <?php
    
   print "<h1 align='center'> Igraci</h1>";
    
	$veza = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "wt", "wt");
    $veza->exec("set names utf32");
	if(!isset($_GET['vijest'])) {    
     $rezultat = $veza->query("select id, ime, slika, opis,komenatar,autor,broj, UNIX_TIMESTAMP(vrijeme) vrijeme2 from vijest");
     
     if (!$rezultat) {
          $greska = $veza->errorInfo();

          print "SQL greška: " . $greska[2];
          exit();
     }
     
     foreach ($rezultat as $vijest) {

     	print "<div class='col'  > ";
     	
     			print "<h2><a id='pokazi' href='pokazi.php?IID=".$vijest['id']."' >".$vijest['ime']."</a></h2><br>";
		
		print  "<img alt='Jesic' class='Jesic' src='".$vijest['slika'].".jpg'><br>";   
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
    ?>
  </body>
</html>
