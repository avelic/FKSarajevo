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
  <script src="login.js" type="text/javascript"> </script>


</head>
<body > 

  <header>

    <h1 >Fudbalski Klub Sarajevo</h1>

    <h2 class="Logo">HzsA</h2>
    <h4 id="log"><a href = "logout.php" title = "Logout">Logout</a></h4>
    <nav>
      <ul class="intro" >
        <li><a href="korisnik.php" class="meni">POČETNA</a></li>
        <li><a href="Historija.php" class="meni" >HISTORIJAT</a></li>
        <li><a href="Tabela.php" class="meni" >TABELA</a></li>
        <li><a href="Clanovi.php" class="meni" >ČLANOVI</a></li>
        <li><a href="Kontakt.php" class="meni" >KONTAKT</a></li>
        <li><a href="vijest.php" class="meni" >DODAJ IGRACA</a></li>
      </ul>
    </nav>
  </header>   <br><br> <br><br>

</head>
<body>
 <?php
 $msg = '';
 $success ='';
 if(isset($_POST['novaVijest']))

 {
  $Naslov = trim($_POST['Naslov']);
  $uvod = trim($_POST['uvod']);


  if(empty($Naslov) || empty($uvod))
  {
    $msg = "There is empty field.";
  }

  else if(!preg_match("/^(?!\s)(?!.*\s$)(?=.*[a-zA-Z0-9])[a-zA-Z0-9 '~?!]{5,60}$/", $Naslov) )
  {
    $msg = "Nalov nije validan";
  }

  else if(strlen($Naslov) < 5 )
  {
    $msg = "Minimum 20 slova za naslov !";
  }
  else if(strlen($Naslov) > 60 )
  {
    $msg = "Maximum 30 slova za naslov!";
  }
  else{
    $success ="Uspjesno daodana vijest.";
  }


}   
if(isset($_POST['novaVijest'])) { 
  if(isset($_REQUEST['Naslov']) && isset($_REQUEST['image']) && isset($_REQUEST['uvod']) && isset($_REQUEST['telephone']))
  {       


    $ime = $_POST['Naslov'];
    $picture = $_POST['image'];
    $opis = $_POST['uvod'];
    $broj = $_POST['telephone'];


    if (isset($_POST['komentar']) && !empty($_POST['komentar']) && $_POST['komentar'] === 'on')               
        $kom = 1;  
    else 
        $kom = 0; 
    $pisac = $_SESSION['id'];

    $veza = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "wt", "wt");
    $veza->exec("set names utf32");
    if(!isset($_GET['vijest'])) {    
           
             $rezultat = $veza->query ("INSERT INTO vijest (ime,slika,opis,komenatar,autor,broj,vrijeme) VALUES ('$ime', '$picture', '$opis','$kom','$pisac','$broj',CURRENT_TIMESTAMP)"); 
     if (!$rezultat) {
      $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
    }


  }
}
}
?>



<form action="vijest.php" method="post" id="vijest">
  <div class="form-frame">
    <label>Unesite ime igraca:</label><br/>

    <input id="naslov"  name="Naslov" type="text" required placeholder="Ime igraca" onkeyup="validateNaslov()"/><br/>
    <label>Odaberite sliku za igraca:</label><br/>

    <select  class="slika" id="imgFile" name="image">



      <option value="Benkoslika">Leon Benko</option>
      <option value="Delacslika">Matej Delac</option>
      <option value="Duljevicslika">Haris Dulejivc</option>
      <option value="Berberovicslika">Dzelam Bererovic</option>
      <option value="Radovacslika">Samir Radovac</option>
      <option value="Markoslika">Marko Mihojević</option>
      <option value="Rustemovicslika">Edin Rustemović</option>
      <option value="Bekicslika">Amer Bekić</option>
      <option value="Okicslika">Ševko Okić</option>



    </select><br>


    <textarea id="message" class="input"  rows="7" cols="30" placeholder="Opis:" name="uvod"></textarea><br />
    <label>Odaberite drzavu:</label><br/>
    <select class="countryCode" id="countryCode"  onChange="phoneCode()" name="codeCountry">
     <option value="BA">Bosnia and Herzegovina (BA)</option>
     <option value="HR">Croatia (HR)</option>
     <option value="ME">Montenegro (ME)</option>
     <option value="RS">Serbia (RS)</option>
     <option value="SI">Slovenia (SI)</option>

   </select><br>
   <input id="phone" type="tel" name="telephone" required placeholder="Phone number" oninput="ispravnostTelefona()" /><br>
   <label>Omoguceni komentari za igraca</label> <input name="komentar" id="cb" type="checkbox" checked="checked"><br>
   <h4><?php echo $msg; ?></h4>
   <input type="submit" name="novaVijest" value="Dodaj vijest" >
   <h4 class="success"><?php echo $success; ?></h4>
 </div>
</form>

</body>
</html>

