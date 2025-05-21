

let numerZdjecia = 1;

function nastepne(){
    numerZdjecia +=1;

    if(numerZdjecia>7){
        numerZdjecia = 1;
    }
    const aktywneZdjecie = document.getElementById('aktywne');
    aktywneZdjecie.src = numerZdjecia + '.jpg';


}


function poprzednie(){
    numerZdjecia -= 1;

    const aktywneZdjecie = document.getElementById('aktywne');

    if(numerZdjecia == 0){
        numerZdjecia = 7;
    }

    aktywneZdjecie.src = numerZdjecia + '.jpg';

    
}
