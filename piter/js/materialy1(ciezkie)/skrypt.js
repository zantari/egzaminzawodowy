const przeslij = document.getElementById("przeslij");
const komunikat = document.getElementById("komunikat");
przeslij.addEventListener('click', (e) => {
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;
    let email = document.getElementById("email").value;
    let zgloszenie = document.getElementById("zgloszenie").value;
    let zapoznanie = document.getElementById("zapoznianie");

    if(zapoznanie.checked == false){
        komunikat.innerText = "Musisz zapoznac sie z regulaminem";
        komunikat.style.color = "red";
        
    }else{
        
        komunikat.innerText = imie.toUpperCase() + " " + nazwisko.toUpperCase() + "<br>"+ zgloszenie;
        komunikat.style.color = "Navy";
    }


})