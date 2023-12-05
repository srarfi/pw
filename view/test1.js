function validateForm() {
    var role = document.getElementById("role").value;
    var username = document.getElementById("username").value;
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("email").value;
    var tel = document.getElementById("tel").value;
    var cin = document.getElementById("cin").value;
    var poid = document.getElementById("poid").value;
    var taille = document.getElementById("taille").value;
    var genre = document.querySelector('input[name="genre_ut"]:checked').value; 
    var age = document.getElementById("age").value;
    var adresse = document.getElementById("adresse").value;
    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("con_password").value;


    // Vérifier si tous les champs sont remplis
    if (role === "" || username === "" || nom === "" || prenom === "" || email === "" || tel === "" || cin === "" ||
        poid === "" || taille === "" || genre === null || age === "" || adresse === "" || login === "" || password === "" || confirmPassword === "") {
        alert("Tous les champs doivent être remplis.");
        return false;
    }

    // Vérifier si le nom et le prénom sont composés de lettres majuscules ou minuscules uniquement
    var namePattern = /^[A-Za-z]+$/;
    if (!namePattern.test(nom) || !namePattern.test(prenom)) {
        alert("Le nom et le prénom ne doivent contenir que des lettres.");
        return false;
    }

    // Vérifier si l'email est valide
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Adresse email invalide.");
        return false;
    }

    // Vérifier si le téléphone et le CIN ne contiennent que des chiffres et ont une longueur de 8 caractères
    var numberPattern = /^\d{8}$/;
    if (!numberPattern.test(tel) || !numberPattern.test(cin)) {
        alert("Numéro de téléphone ou CIN invalide. Ils doivent contenir 8 chiffres.");
        return false;
    }

    // Vérifier si le poids et la taille sont des nombres réels ou entiers positifs
    if (isNaN(poid) || poid <= 0 || isNaN(taille) || taille <= 0) {
        alert("Le poids et la taille doivent être des nombres positifs.");
        return false;
    }

    // Vérifier si l'âge est composé uniquement de chifre
    if (isNaN(age) || age <= 0 || age % 1 !== 0) {
        alert("L'âge doit être un nombre entier positif.");
        return false;
    }

    // Vérifier si les mots de passe correspondent
    if (password !== confirmPassword) {
        alert("Les mots de passe ne correspondent pas.");
        return false;
    }

    // Toutes les validations passent, retourner true pour soumettre le formulaire
    return true;
}
