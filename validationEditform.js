const form = document.getElementById('form');
const nom = document.getElementById('nom');
const reduction = document.getElementById('reduction');
const designation = document.getElementById('designation');
const prix = document.getElementById('prix');
const quantite = document.getElementById('quantite');

const smalnom = document.getElementById('smalnom');
const smalreduction = document.getElementById('smalreduction');
const smaldesignation = document.getElementById('smaldesignation');
const smalprix = document.getElementById('smalprix');
const smalquantite = document.getElementById('smalquantite');

form.addEventListener('submit', e => {
   e.preventDefault();

   validationForm();
  
});

function validationForm()
{

const nomvalue = nom.value.trim() ;
const reductionvalue = reduction.value.trim();
const designationvalue = designation.value.trim();
const prixvalue = prix.value.trim();
const quantitevalue = quantite.value.trim();

	// le nom 
	if(nomvalue == '')
	{
		smalnom.innerText="la case est vide";
	}else{
		 if(isNumeric(nom.value)) {
        smalnom.innerText ="nom incorrect";
   	}else{
		smalnom.innerText ="";
  }
	}
	


	if(reductionvalue == '')
	{
		smalreduction.innerText="la case est vide";
	}else
	{ 
		if((reductionvalue >= 0) && (reductionvalue< 100))
		{
			smalreduction.innerText="";
		}else
		{
			smalreduction.innerText=="réduction incorrect (0-100)";
		}
	}

	if(designation.value == '')
	{
		smaldesignation.innerText="la case est vide";
	}else{
		
	}

	if(prix.value == '')
	{
		smalprix.innerText="la case est vide";
	}else{
		
	}


	if(quantite.value == '')
	{
		smalquantite.innerText="la case est vide";
	}else{
		
	}
}



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

