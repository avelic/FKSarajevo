<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Postani bordo prijatelj</title>
  <link rel="stylesheet" type="text/css" href="./../loginStyle.css">
  <SCRIPT src="./../login.js"></SCRIPT>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
    <?php
    
    $msg = '';

    /*$sadrzaj=file('login.csv');

    if (isset($_POST['login']) && !empty($_POST['user-name']) 
     && !empty($_POST['password'])) {
      
        $array=explode(',',$sadrzaj[0]);

      if ($_POST['user-name'] == $array[0] && 
        sha1($_POST['password']) == $array[1]) {
        $_SESSION['valid'] = true;
      $_SESSION['timeout'] = time();
      $_SESSION['user-name'] = $array[0];

      header('Refresh: 1; URL = ./../korisnik.php');
    }else {
      $msg = 'Pogresni podaci za prijavu';
    }
  }*/ 


    if (isset($_POST['login']) && !empty($_POST['user-name']) 
     && !empty($_POST['password'])) {
      
        $veza = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "wt", "wt");
    $veza->exec("set names utf8");
  if(!isset($_GET['autori'])) {    
     $rezultat = $veza->query("select id, username, password from autori");
     
     if (!$rezultat) {
          $greska = $veza->errorInfo();

          print "SQL greška: " . $greska[2];
          exit();
     } 
   }
    foreach ($rezultat as $autori) {

      if ($_POST['user-name'] == $autori['username'] && 
        sha1($_POST['password']) == $autori['password'] ){
       $admini ='administrator' ; 
         if ( $_POST['user-name']==$admini){
          $_SESSION['valid'] = true;
          $_SESSION['timeout'] = time();
          $_SESSION['user-name'] = $autori['username'];
          $_SESSION['id'] = $autori['id'];
          header('Refresh: 1; URL = ./../dodajkorisnika.php');
         }
         else 
         {
          $_SESSION['valid'] = true;
      $_SESSION['timeout'] = time();
      $_SESSION['user-name'] = $autori['username'];
      $_SESSION['id'] = $autori['id'];

      header('Refresh: 1; URL = ./../korisnik.php');
         }
      
    }else {
      $msg = 'Pogresni podaci za prijavu';
    }}}
  ?>

  <form action="login.php" method="post">
    <div class="login-frame">
     <input id="userName"  name="user-name" type="text" required placeholder="Username=admin" /><br />
     <input id="pass" name="password" type="password" required placeholder="Password=admin" />
     <input type="submit" name="login" value="Login">
   </div>
 </form>
 <h4><?php echo $msg; ?></h4>
 <h4><a href="./../Pocetna.html">Nastavite kao gost</a></h4>

</body>
</html>