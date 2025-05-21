const blok1 = document.getElementById("blokFormularz1");
const blok2 = document.getElementById("blokFormularz2");
const blok3 = document.getElementById("blokFormularz3");



function skrypt1(){
    
    const imie = document.getElementById("imie").value;
    const nazwisko = document.getElementById("nazwisko").value;
    if(imie == '' || nazwisko == ''){

    }
    else{

    
    blok1.style.visibility = 'hidden';
    blok2.style.visibility = 'visible';
    }
}

function skrypt2(){
    const email = document.getElementById("email").value;
    const tel = document.getElementById("tel").value;
    if(email == '' || tel == ''){

    }
    else{

    blok2.style.visibility = 'hidden';
    blok3.style.visibility = 'visible';
    }
}

function zatwierdz(){
    


    const haslo = document.getElementById("haslo").value;
    const powhaslo = document.getElementById("powhaslo").value;
    


    if(haslo !== powhaslo ){
        alert("podane hasla roznia sie!");
    }
    else{
        const imie = document.getElementById("imie").value;
        const nazwisko = document.getElementById("nazwisko").value;
        console.log("Witaj " + imie +' ' + nazwisko);
    }
    
}