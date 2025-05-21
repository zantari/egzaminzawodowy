const obliczButton = document.getElementById("oblicz");
const prawy2 = document.getElementById("prawy2");
const cenaParagraf = document.getElementById("cena");

obliczButton.addEventListener("click", (e) => {

    let cena = 0;


    let peeling = document.getElementById("peeling");
    let maska = document.getElementById("maska");
    let masaz = document.getElementById("masaz");
    let makijaz = document.getElementById("makijaz");

    if(peeling.checked){
        cena = cena + 45; 
    }

    if(maska.checked){
        cena = cena + 30;
    }

    if(masaz.checked){
        cena = cena + 20;
    }

    if(makijaz.checked){
        cena = cena + 50;
    }

    cenaParagraf.textContent = "Cena zabiegów: " + cena;
    



    
    

});




