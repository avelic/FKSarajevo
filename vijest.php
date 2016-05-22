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
        
    if(isset($_REQUEST['Naslov']) && isset($_REQUEST['image']) && isset($_REQUEST['uvod']) && isset($_REQUEST['telephone']))
    {    
       
      file_put_contents("vijesti.csv"," ".htmlentities($_REQUEST['Naslov'],ENT_QUOTES).",".htmlentities($_REQUEST['image'],ENT_QUOTES).",".htmlentities($_REQUEST['uvod'],ENT_QUOTES).",".htmlentities($_REQUEST['codeCountry'],ENT_QUOTES).",".htmlentities($_REQUEST['telephone'],ENT_QUOTES)." \n",FILE_APPEND);
    }
    
  ?>

   

  <form action="vijest.php" method="post" id="vijest">
    <div class="form-frame">
    <label>Unesite ime igraca:</label><br/>
     
     <input id="naslov"  name="Naslov" type="text" required placeholder="Ime igraca" onkeyup="validateNaslov()"/><br/>
     <label>Odaberite sliku iz www foldera:</label><br/>

  <select class="slika" id="imgFile" name="image">
  
  <option value="Benkoslika">Leon Benko</option>
   <option value="Delacslika">Matej Delac</option>
  <option value="Duljevicslika">Haris Dulejivc</option>
 
 
</select><br>
     
   
     <textarea id="message" class="input"  rows="7" cols="30" placeholder="Uvodne recenice:" name="uvod"></textarea><br />
     <label>Odaberite drzavu:</label><br/>
     <select class="countryCode" id="countryCode" onChange="phoneCode()" name="codeCountry">
  
  <option value="BA">Bosnia and Herzegovina (BA)</option>
  <option value="HR">Croatia (HR)</option>
  <option value="ME">Montenegro (ME)</option>
  <option value="RS">Serbia (RS)</option>
  <option value="SI">Slovenia (SI)</option>
</select><br>
<input id="phone" type="tel" name="telephone" required placeholder="Phone number" oninput="ispravnostTelefona()" />
     <h4><?php echo $msg; ?></h4>
     <input type="submit" name="novaVijest" value="Dodaj vijest" >
     <h4 class="success"><?php echo $success; ?></h4>
   </div>
 </form>

</body>
</html>

