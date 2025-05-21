const cytat1 = document.getElementById("cytat1");
const cytat2 = document.getElementById("cytat2");
const cytat3 = document.getElementById("cytat3");


function funkcja1(){
    cytat1.style.display = 'none';
    cytat2.style.display ='block';
}

function funkcja2(){
    cytat2.style.display = 'none';
    cytat3.style.display ='block';
}

function funkcja3(){
    cytat3.style.display = 'none';
    cytat1.style.display ='block';
}