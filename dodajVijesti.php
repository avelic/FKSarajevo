<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="korisnik-css.css">
 <script src="VrijemeIspisi.js" type="text/javascript"> </script>
    <script src="Filtriraj.js" type="text/javascript"> </script>
    


  </head>
  <body > 
	<?php

	
     $broj =12 ;
	 $sadrzaj=file('vijesti.csv');

	 if (isset($_POST['sort'])){
foreach ($sadrzaj as $key => $row) { 
	$array=explode(',',$row);
    $dates[$key]  = $array[1];




}



array_multisort($dates, SORT_ASC, $sadrzaj);


   echo " <h1 class='align'>Igraci</h1> ";
	foreach ($sadrzaj as $key => $element) {
		$array=explode(',',$element);
		++$broj;


		echo        "<div class='col'  id='n$broj' > 
		             <p >  
		               <strong>$array[0]</strong></a><br>
		               <img alt='Jesic' class='Jesic' src='$array[1]".".jpg'>
		              				
                      
					</p>


				</div>"
					;

				}
	
	
	     }

	     else{

	     	echo " <h1 class='align'>Igraci</h1> ";
	foreach ($sadrzaj as $key => $element) {
		$array=explode(',',$element);
		++$broj;
               echo        "<div class='col'  id='n$broj' > 
		             <p >  
		               <strong>$array[0]</strong></a><br>
		               <img alt='Jesic' class='Jesic' src='$array[1]".".jpg'>
		              				
                      
					</p>


				</div>"
					;

				}
	     }

				?>
				<form action="korisnik.php" method="post">
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				
     <input id="sortb" type="submit" name="sort" value="Sortiraj abecedno igrace">
   </div>
 </form>
			</body>
			</html>