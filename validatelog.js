const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('password');
const smalemail = document.getElementById('smalemail');
const smalpassword = document.getElementById('smalpassword');

form.addEventListener('submit', e => {
   e.preventDefault();
   validationForm();
});

var emaili = 0;
var passwordi = 0;


function validationForm()
{
   const emailValue = email.value.trim(); 
   const passwordValue = password.value.trim();

   if(emailValue == '') {
         smalemail.innerText = "NTA VIDE";
   } else if (!isEmail(emailValue)) {
        smalemail.innerText ="Email incorrect";
   }else{
      emaili = 1;
   }


if(passwordValue == '') {
         smalpassword.innerText = "la case est vide";
   } else {
        if(isAlphabetic(passwordValue) || isNumeric(passwordValue) || passwordValue.length <6)
        {
            smalpassword.innerText ="Entrer 6 caractéres & nombres";
        }else{
         passwordi = 1;
        }
   }

if(emaili ==1 && passwordi ==1)
{
  document.getElementById('form').submit();
 
}
}

/////////////////// Fonction Affichage erreur / success //////////////////////////////

  function isNumeric(str){
    var code, i, len;
    for (i = 0, len = str.length; i < len; i++) {
      code = str.charCodeAt(i);
      if (!(code > 47 && code < 58)) // numeric (0-9)
      {
        // lower alpha (a-z)
        return false;
      }
    }
    return true;
  };

  /////////////////// Fonctions Alphabetic / numeric / alphanumeric //////////////////////////////

function isAlphabetic(str) {
    var code, i, len;
  
    for (i = 0, len = str.length; i < len; i++) {
      code = str.charCodeAt(i);
      if (!(code > 64 && code < 91) && // upper alpha (A-Z)
          !(code > 96 && code < 123)) { // lower alpha (a-z)
        return false;
      }
    }
    return true;
  };

/////////////////// Fonction Email //////////////////////////////

  function isEmail(email) {
    var sym = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if( email.match(sym) )
    {
        return true;
    }
    return false;
}

