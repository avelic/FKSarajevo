

var regexName = /^[A-Za-z]{3,20}$/; 

function validateName (){
   
   var form=document.getElementById('storyForm');

   if(!regexName.test(form['firstName'].value)){
   	form['firstName'].style.borderColor  = "red";
   	
   }
   else{
     form['firstName'].style.borderColor  = "green"; 
   }
 
} 

function validateLastName (){
   
   var form=document.getElementById('storyForm');

   if(!regexName.test(form['lastName'].value)){
    form['lastName'].style.borderColor  = "red";
    
   }
   else{
     form['lastName'].style.borderColor  = "green"; 
   }
 
}

function validateNaslov()
{
  if (/^(?!\s)(?!.*\s$)(?=.*[a-zA-Z0-9])[a-zA-Z0-9 '~?!]{5,60}$/.test(document.getElementById("naslov").value)) {
             document.getElementById("naslov").style.backgroundColor="green";
  }
    else
    {
          document.getElementById("naslov").style.backgroundColor="red";
    }
}
function phoneCode(){
  var ajax = new XMLHttpRequest();
  var all;
  var code=document.getElementById('countryCode').value;
  code = encodeURIComponent(code);

  var splitCode = code.split(/[()]/);

  ajax.onreadystatechange = function() {// Anonimna funkcija
    if (ajax.readyState == 4 && ajax.status == 200){
        all= JSON.parse(ajax.responseText);
        document.getElementById("phone").value = "+"+all[0].callingCodes;
       }
     
  }

  ajax.open("GET", "https://restcountries.eu/rest/v1/alpha?codes="+splitCode, true);
  ajax.send();

  }



function ispravnostTelefona() {
  
 if (/(\+[0-9]{12})$/.test(document.getElementById("phone").value)) {
      
    var req = new XMLHttpRequest();
    
     var code=document.getElementById('countryCode').value;
  code = encodeURIComponent(code);

    

    var splitCode = code.split(/[()]/);
     alert(splitCode);
  ajax.onreadystatechange = function() {// Anonimna funkcija
    if (ajax.readyState == 4 && ajax.status == 200){
        all= JSON.parse(ajax.responseText);
       
        document.getElementById("phone").value = "+"+all[0].callingCodes;
       }
     
  

  
 
  }
  ajax.open("GET", "https://restcountries.eu/rest/v1/alpha?codes="+splitCode, true);
  ajax.send();
    document.getElementById("phone").style.backgroundColor="green";
    
  }
  
  else {

    document.getElementById("phone").style.backgroundColor="white";
  }
}