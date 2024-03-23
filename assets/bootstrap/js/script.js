function nextStep1() {

    let nom = document.querySelector('#nomEtudiant');
    let prenom = document.querySelector('#prenomEtudiant');
    if (nom.value === "" || prenom.value === ""){
        alert("remplissez le champ nom");
    }else {
        // document.getElementById('form1').classList.add("fade-out-right");
        document.getElementById('loader').classList.add("loader");
        document.getElementById('loader').style.display = "block";


        setTimeout(function () {
            document.getElementById('form1').style.display = 'none';
            document.getElementById('form2').style.display = 'block';
            document.getElementById('form2').classList.add("fade-in-left")
            document.getElementById('loader').style.display = "none";



        }, 1000)
    }
}

function nextStep2() {

    let niveau = document.querySelector('#niveauEtudiant');
    if (niveau.value === ""){
        alert("remplissez le champ niveau");
    }else {
        // document.getElementById('form2').classList.add("fade-out-right");
        document.getElementById('loader').classList.add("loader");
        document.getElementById('loader').style.display = "block";

        setTimeout(function () {
            document.getElementById('form2').style.display = 'none';
            document.getElementById('form3').style.display = 'block';
            document.getElementById('form3').classList.add("fade-in-left")
            document.getElementById('loader').style.display = "none";


        }, 1000)
    }
}

function nextStep3() {

    let email = document.querySelector('#courrierEtudiant');
    if (email.value === ""){
        alert("remplissez le champ email");
    }else {
        // document.getElementById('form3').classList.add("fade-out-right");
        document.getElementById('loader').classList.add("loader");
        document.getElementById('loader').style.display = "block";
        setTimeout(function () {
            document.getElementById('form3').style.display = 'none';
            document.getElementById('form4').style.display = 'block';
            document.getElementById('form4').classList.add("fade-in-left")
            document.getElementById('loader').style.display = "none";



        }, 1000)
    }
}

function nextStep4() {
    let pass = document.querySelector('#passwordEtudiant');
    let pass2 = document.querySelector('#passwordEtudiant2');
    if (pass.value === "" || pass2.value === ""){
        alert("Remplissez le champ mot de passe");
    } else if (pass.value !== pass2.value) {
        alert("Les mots de passe doivent être identiques");
    } else {
        document.getElementById('form4').style.display = 'none';
        document.getElementById('inscrire').type = 'submit';

    }

}
