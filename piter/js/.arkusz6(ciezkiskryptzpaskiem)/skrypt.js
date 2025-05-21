    const pierwszyBlok = document.getElementById("kontrolki");
    const drugiBlok = document.getElementById("kontrolki2");
    const trzeciBlok = document.getElementById("kontrolki3");
    
    const postep = document.getElementById("postep");
    const pusty = document.getElementById("pusty");
function pierwszy(){
    

    pierwszyBlok.style.display = 'block';
    drugiBlok.style.display = 'none';
    trzeciBlok.style.display = 'none';
}

function drugi(){
    

    pierwszyBlok.style.display = 'none';
    drugiBlok.style.display = 'block';
    trzeciBlok.style.display = 'none';
}


function trzeci(){
    
    

    pierwszyBlok.style.display = 'none';
    drugiBlok.style.display = 'none';
    trzeciBlok.style.display = 'block';
}

function zatwierdz(){
    const imie = document.getElementById("imie").value;
    const nazwisko = document.getElementById("nazwisko").value;
    const data = document.getElementById("data").value;
    const ulica = document.getElementById("ulica").value;
    const numer = document.getElementById("numer").value;
    const miasto = document.getElementById("miasto").value;
    const telefon = document.getElementById("telefon").value;

    console.log('imie: '+ imie + ' nazwisko: ' + nazwisko + ' data: ' + data + ' ulica: ' +ulica + ' numer: ' + numer + ' miasto: ' +miasto + ' telefon: ' + telefon);
}


function pasek(){
    let aktualnaSzerokosc = parseFloat(pusty.style.width) || 4;
    aktualnaSzerokosc += 12;

    pusty.style.width = aktualnaSzerokosc + "%";
    console.log(pusty.style.width); 
}
