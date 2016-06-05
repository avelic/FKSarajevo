<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tutorijal 8, Uvod</title>
  </head>
  <body>
    
<h1>Vijesti</h1>
    <?php
	$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
    $veza->exec("set names utf8");
	if(!isset($_GET['vijest'])) {    
     $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest order by vrijeme desc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
     
     foreach ($rezultat as $vijest) {
		print "<h1>".$vijest['naslov']."</h1><br>";
		print "<small>".$vijest['autor']."</small><br>";
		print "<p>".$vijest['tekst']."</p><br>";
		print "<small>".date("d.m.Y. (h:i)",$vijest['vrijeme2'])."</small><br>";      
		
$brojKomentara = $veza->query("select count(*) from komentar where vijest=".$vijest['id'].";");				
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
		}
     }
	}else {
		$rezultat = $veza->query("select naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme, autor from vijest where id=".$_GET['vijest'].";");
	    if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: ". $greska[2];
          exit();
     }
		
		foreach($rezultat as $vijest) {
		print "<h1>".$vijest['naslov']."</h1><br>";
		print "<small>".$vijest['autor']."</small><br>";
		print "<p>".$vijest['tekst']."</p><br>";
		print "<small>".date("d.m.Y. (h:i)",$vijest['vrijeme'])."</small><br>";      
		$rezultat = $veza->query("select autor, tekst, vrijeme from komentar where vijest=".$_GET['vijest'].";");
		echo "<h3>Komentari</h3>";
		foreach($rezultat as $komentar) {
			print "<h4>".$komentar['autor']."</h4>";
			print "<small>".date("d.m.Y.(h:i)",$komentar['vrijeme'])."<small>";
			print "<p>".$komentar['tekst']."</p>";
			
		}
		}
	}
	
    ?>
  </body>
</html>
