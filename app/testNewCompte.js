window.onload = () => {
    document.querySelector("#password1").addEventListener("input", checkPass);
    document.querySelector("#email").addEventListener("input", checkEmail);
}

/** cette fontion verifie le mot de passe et l'email
 * ;

function checkEmail(){
    //on recupere ce qui a ete saisie
    let mail = this.value;

    // aller cercher les elements dont on a besoin

    let symbole = document.querySelector("#symbole");
    let symbole2 = document.querySelector("#symbole2");

    if(/[@]/.test(mail)){
        // on passe en vert 
        symbole.classList.replace("invalid", "valid");
    } else{
          // on passe en invalid 
          symbole.classList.replace("valid", "invalid");
    }

    if(/[.com]/.test(mail)){
        // on passe en vert 
        symbole2.classList.replace("invalid", "valid");
    } else{
          // on passe en invalid 
          symbole2.classList.replace("valid", "invalid");
    }

}
*/

function checkPass(){
    //on recupere ce qui a ete saisie
    let mdp = this.value;
    //let plus = 0;

    // aller cercher les elements dont on a besoin

    let minuscule = document.querySelector("#minuscule");
    let majuscule = document.querySelector("#majuscule");
    let chiffre = document.querySelector("#chiffre");
    let caracteres = document.querySelector("#caracteres");

    // on verifie qu'on une munuscule

    if(/[a-z]/.test(mdp)){
        // on passe en vert 
        minuscule.classList.replace("invalid", "valid");
    } else{
          // on passe en invalid 
          minuscule.classList.replace("valid", "invalid");
    }

    
    if(/[A-Z]/.test(mdp)){
        // on passe en vert 
        majuscule.classList.replace("invalid", "valid");
    } else{
          // on passe en invalid 
          majuscule.classList.replace("valid", "invalid");
    }

       
    if(/[0-9]/.test(mdp)){
        // on passe en vert 
        chiffre.classList.replace("invalid", "valid");
    } else{
          // on passe en invalid 
          chiffre.classList.replace("valid", "invalid");
    }

    if(mdp.length >= 8){
        // on passe en vert 
        caracteres.classList.replace("invalid", "valid");
    } else{
          // on passe en invalid 
          caracteres.classList.replace("valid", "invalid");
    }
    
    /*if(plus === 4){
        document.querySelector("[type=submit]").style.display = "initial"
    } else {
        document.querySelector("[type=submit]").style.display = "none"
    }*/
}

/**Afficher et masquer le mdp */

eye = true;

function changer(){
    if(eye){
        document.getElementById("password1").setAttribute("type", "text");
        document.getElementById("eye").src="images/eyeOpen.png";
        eye = false;
    } else { 
        document.getElementById("password1").setAttribute("type", "password");
        document.getElementById("eye").src="images/eyeClose.png";
        eye = true;
    }
}


/**Afficher et masquer le mdp2 */

function changer1(){
    if(eye){
        document.getElementById("password2").setAttribute("type", "text");
        document.getElementById("eye1").src="images/eyeOpen.png";
        eye = false;
    } else { 
        document.getElementById("password2").setAttribute("type", "password");
        document.getElementById("eye1").src="images/eyeClose.png";
        eye = true;
    }
}



