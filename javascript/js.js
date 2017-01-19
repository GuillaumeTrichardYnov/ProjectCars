/*var typeformation;
var typeformationpara;
var formation;
$('#typeformation').on('change', function() {
  typeformation = this.value;
  mod_func(typeformation);
});
$('#formation').on('change', function() {
	typeformation = $("#typeformation option:selected").val();
  	formation = this.value;
  	mod_func2(formation, typeformation);
});
function mod_func(typeformation)
{    
 	window.location.assign("ajout-cour.php?tf="+typeformation);
};

function mod_func2(formation, typeformation)
{    
 	window.location.assign("ajout-cour.php?tf="+typeformation+"&f="+formation);
};


var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});

if(($_GET["tf"])!=null){
	$('#formation').css('display', 'inline-block');
}
if(($_GET["f"])!=null){
	$('#matiere').css('display', 'inline-block');
}


//le code ci-dessous sert a selectioner la formation en correlation du type de formation choisis plus haut dans la page "parametres.php"
$('#typeformationpara').on('change', function() {
  typeformationpara = this.value;
  mod_funcpara(typeformationpara);
});

function mod_funcpara(typeformationpara)
{    
  window.location.assign("parametres.php?tf="+typeformationpara);
};*/

/*
$("#send_subscription_personne").click(function(){
    var valid = true;
    //je vérifie que les champs ne sont pas vides 
    if($("#nom").val() == "")
    {
        $("#nom_mal_remplis").css("display","inline");
        valid = false;
    }
    if($("#prenom").val() == "")
    {
        $("#prenom_mal_remplis").css("display","inline");
        valid = false;
    }
    if($("#entreprise").val() == "")
    {
        $("#entreprise_mal_remplis").css("display","inline");
        valid = false;
    }
    if($("#mail").val() == "")
    {
        $("#mail_mal_remplis").css("display","inline");
        valid = false;
    }
    if($("#mdp").val() == "")
    {
        $("#mdp_mal_remplis").css("display","inline");
        valid = false;
    }
    if(valid == true)
    {
        var nom = $("#nom").val();//je récupere la valeur des champs et je socke cela dans les variables js 
        var prenom = $("#prenom").val();
        var entreprise = $("#entreprise").val();
        var mail = $("#mail").val();
        var mdp = $("#mdp").val();
        var fonction = $("#fonction").val();
        var statut = $("#statut").val();
          
     
            $.ajax({
                type : 'POST',
                url : 'php/inscription/inscription_personne.php',
                data : {nom : nom, prenom : prenom, mail : mail, mdp: mdp, entreprise: entreprise, fonction:fonction, statut:statut}//j'envoie toutes les données a la page inscription_personne.php

            })
             .done(function(msg) {
                switch(msg){
                     case "2":
                        alert("votre inscription a bien été prise en compte");
                        break;
                    case "1":
                        alert("ce mail a déja été utilisé");
                        break;
                    default:
                       
                }
             //   console.log(msg);
            });
    }
});*/
