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
  <body onload=" PostaviVrijemeObjave() "> 

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
    <p class="sortiraj">Filter novosti: </p>
        
    <select class="sortirajm"  id="sel" onchange=" filter();">
   <option value="sve">Sve novosti </option>
   <option value="danas">Novosti od danas</option>
   <option value="sed">Novosti od ove sedmice</option>
   <option value="mje">Novosti od ovog mejeseca</option>

   
     </select>  
    
    <div class="novine">

      <div class="col"  id="n1" >
        
        <p > 

          <a  class="n" href="http://fksinfo.com/novosti/video-izvjestaj-sa-utakmice-sarajevo---slavija-30/2718" >
            <strong>VIDEO: Izvještaj sa utakmice Sarajevo - Slavija 3:0</strong></a>
            <br>

            <img src="slavija.jpg" alt="Jesic" class="Jesic">
            Almir Hurtić je drugi put ove sezone preuzeo stručni štab i ovaj mandat je započeo pobjedom protiv S...

            <label id="n1da"> May 17, 2016 11:13:00</label><br>Datum objave:<br> <label id="n1d"> May 17, 2016 11:13:00</label><br>

          </p>


        </div>
        <div class="col" id="n2">
          <p>
            <a  class="n" href="http://fksinfo.com/novosti/gospodine-jesicu-da-li-je-jos-rano-za-analizu/2717" >
              <strong> Gospodine Ješiću, da li je još rano za analizu? </strong></a>
              <br>


              <img src="Jesic.jpg" alt="Jesic" class="Jesic">
              FK Sarajevo je ispalo iz Kupa BiH nakon najgore odigrane utakmice koju su navijači imali priliku da ...
              <label id="n2da">May 16, 2016 11:13:00</label><br>Datum objave:<br> <label id="n2d">May 16, 2016 11:13:00</label><br>
            </p>


          </div>

          <div class="col" id="n3">
            <p> 
              <a  class="n" href="http://fksinfo.com/novosti/video-izvjestaj-sa-utakmice-rudar-p---sarajevo-11/2716" >
                <strong>VIDEO: Izvještaj sa utakmice Rudar (P) - Sarajevo 1:1</strong></a>
                <br>


                <img src="rudar.jpg" alt="Jesic" class="Jesic">
                Remijem u Prijedoru sa Rudarom bordo tim je smanjio šanse na minimum za odbranu prošlosezonske titul...
                <label id="n3da"> May 14, 2016 11:13:00 </label><br>Datum objave:<br>
                 <label id="n3d"> May 14, 2016 11:13:00</label><br>
              </p>


            </div>
            <div class="col" id="n4">
              <p> 
                <a  class="n" href="http://fksinfo.com/novosti/video-izvjestaj-sa-utakmice-sarajevo---celik-21/2715" >
                  <strong>VIDEO: Izvještaj sa utakmice Sarajevo - Čelik 2:1</strong></a>
                  <br>

                  <img src="celik.jpg" alt="Jesic" class="Jesic">
                  Zenički Čelik je na Koševu pružio dobru predstavu, ali up8rkos tome nisu uspjeli izdržati, jer je Har...
                                                <label id="n4da">May 9, 2016 11:13:00</label><br>Datum objave:<br> 
                                <label id="n4d">May 9, 2016 11:13:00 </label><br>


              </div>

              <div class="col" id="n5">

                <p>
                  <a  class="n" href="http://fksinfo.com/novosti/velkoski-karijeru-nastavlja-u-incheonu/27135" >
                    <strong>Velkoski karijeru nastavlja u Incheonu</strong> </a>

                    <br>

                    <img src="Velkoski.jpg" alt="Velkoski" class="Jesic">
                    Makedonski internacionalac, Krste Velkoski na Koševo je stigao u januaru 2014. godine. Nakon fantast...
                     <label id="n5da">May 8, 2016 11:13:00</label><br>Datum objave:<br> 
                    <label id="n5d"> May 8, 2016 11:13:00</label><br>
                    
                  </p>

                </div>
                <div class="col" id="n6">

                  <p>
                    <a  class="n" href="http://fksinfo.com/novosti/video-izvjestaj-sa-utakmice-zrinjski---sarajevo-22/2712" >
                      <strong>VIDEO: Izvještaj sa utakmice Zrinjski - Sarajevo 2:2</strong> </a>


                      <br>

                      <img src="zrinjski.jpg" alt="Velkoski" class="Jesic">
                      Nastavak prvenstva je obilježilo gostovanje SarajevA Zrinjskom u Mostaru, a na kraju je završilo 2:2...
                       <label id="n6da"> May 5, 2016 11:13:00</label><br>Datum objave:<br> 
                      <label id="n6d"> May 5, 2016 11:13:00</label><br>
                    
                    </p>

                  </div>
                  <div class="col" id="n7" >

                    <p>
                      <a  class="n" href="http://fksinfo.com/novosti/delac-duljevic-i-benko-najbolje-ocijenjeni/2711" >
                        <strong>Delač, Duljević i Benko najbolje ocijenjeni</strong> </a>

                        <br>

                        <img src="najbolji.jpg" alt="Velkoski" class="Jesic">
                        U tradicionalnoj anketi, koja se na završetku svake polusezone organizuje na našem...<br>
                         <label id="n7da"> May 3, 2016 11:13:00</label><br>Datum objave:<br> 
                        <label id="n7d"> May 3, 2016 11:13:00 </label><br>
                        
                      </p>

                    </div>
                    <div class="col" id="n8" >
                      <p>  
                        <a  class="n" href="http://fksinfo.com/novosti/benko-izjednacio-rekord-susica-i-antica/2709" >
                          <strong>Benko izjednačio rekord Sušića i Antića</strong>  </a>
                          <br>
                          <img src="Benko.jpg" alt="Benko" class="Jesic">
                          Sa 20 postignutih pogodaka u 2015. godini, Benko se izjednačio sa učinkom dvojice slavnih fudbalera...<br>
                           <label id="n8da"> May 1, 2016 11:13:00</label><br>Datum objave:<br> 
                          <label id="n8d"> May 1, 2016 11:13:00</label><br>
                          
                        </p>  
                      </div>
                      <div class="col" id="n9" >
                        <p>  
                          <a  class="n" href="http://fksinfo.com/novosti/kusturica-postoje-dvije-mogucnosti-za-stadion/2704" >
                            <strong>Kusturica: Postoje dvije mogućnosti za stadion</strong>  </a>
                            <br>
                            <img src="Benko.jpg" alt="Benko" class="Jesic">
                            Edis Kusturica je otkrio planove Kluba sa kampom u Butmiru, kada će biti završeni travnati tereni te...<br>
                             <label id="n9da"> April 30, 2016 11:13:00</label><br>Datum objave:<br> 
                             <label id="n9d"> April 30, 2016 11:13:00 </label><br>
                          
                          </p>  
                        </div>
                        <div class="col" id="n10" >
                          <p>  
                            <a  class="n" href="http://fksinfo.com/novosti/velkoski-upisao-deseti-nastup-za-makedoniju/2705" >
                              <strong>Velkoski upisao deseti nastup za Makedoniju</strong>  </a>
                              <br>
                              <img src="mak.jpg" alt="Benko" class="Jesic">
                              Krste Velkoski je na Koševo stigao u januaru 2014. godine, a samo dva mjeseca kasnije upisao je svoj...<br>
                                 <label id="n10da">  April 25, 2016 11:13:00</label><br>Datum objave:<br> 
                                <label id="n10d">  April 25, 2016 11:13:00 </label><br>
                            
                            </p>  
                          </div>
                          <div class="col" id="n11">
                            <p>  
                              <a  class="n" href="http://fksinfo.com/novosti/video-golijada-na-kosevu/2703" >
                                <strong>VIDEO: Golijada na Koševu</strong>  </a>
                                <br>
                                <br>
                                <img src="kosevo.jpg" alt="Benko" class="Jesic">
                                Iako su gosti uspjeli povesti sa 2:0, bordo tim se vratio u igru te golovima Duljevića i Amera Bekić...<br>
                                <label id="n11da">  April 20, 2016 11:13:00</label><br>Datum objave:<br> 
                                <label id="n11d">  April 20, 2016 11:13:00 </label><br>
                              </p>  
                            </div>
                            <div class="col" id="n12" >
                              <p>  
                                <a  class="n" href="http://fksinfo.com/novosti/oprostajna-utakmica-za-obucu-i-skoru/2702" >
                                  <strong>Oproštajna utakmica za Obuću i Škoru</strong>  </a>
                                  <br>
                                  <img src="obuca.jpg" alt="Benko" class="Jesic">
                                  Gotovo da ne postoji nijedan mlađi navijač FK Sarajevo, koji prati ovaj klub u periodu nakon agresij...
                                <label id="n12da"> April 10, 2016 11:13:00 </label><br>Datum objave:<br> 
                                <label id="n12d">  April 10, 2016 11:13:00 </label><br>
                                </p>  
                              </div>

                               <?php include 'Ispisipisac.php';?>

                            </div>
                            <footer>

                              Copyright © 2016 by MojeSarajevo.ba | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno
                              Owned by TKC Team | Designed by Adin Velic| Developed by Adin Velic
                            </footer>





                          </body>
                          </html>