let menuVisible = false;

function selectionMenu(){
    if(menuVisible){
        document.getElementById("nav").classList ="";
        menuVisible = false;
    }else{
        document.getElementById("nav").classList ="responsive";
        menuVisible = true;
    }
}

function selection(){
    
    document.getElementById("nav").classList = "";
    menuVisible = false;
}

function effectSkills(){
    var skills = document.getElementById("skills");
    var distancia_skills = window.innerHeight - skills.getBoundingClientRect().top;
    if(distancia_skills >= 300){
        let habilidades = document.getElementsByClassName("progress");
        habilidades[0].classList.add("html");
        habilidades[1].classList.add("css");
        habilidades[2].classList.add("javascript");
        habilidades[3].classList.add("php");
        habilidades[4].classList.add("sql");
        habilidades[5].classList.add("photoshop");
        habilidades[6].classList.add("illustrator");
        habilidades[7].classList.add("figma");
        habilidades[8].classList.add("responsive");
    }
}



window.onscroll = function(){
    effectSkills();
} 