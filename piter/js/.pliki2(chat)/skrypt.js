
const Krzysztof = [

"Świetnie!",
"Kto gra główną rolę?",
"Lubisz filmy Tego reżysera?",
"Będę 10 minut wcześniej",
"Może kupimy sobie popcorn?",
"Ja wolę Colę",
"Zaproszę jeszcze Grześka",
"Tydzień temu też byłem w kinie na Diunie",
"Ja funduję bilety"
];


function wyslij(){
     const wiadomosc = document.getElementById("twojaWiadomosc").value;

     

     const chat = document.getElementById("chat");



     const jolkaDiv = document.createElement('section'); //tworze pusta sekcje
     jolkaDiv.classList.add("jolanta"); //dodaje tej sekcji klase jolanta




     const jolkaZdj = document.createElement('img');
     jolkaZdj.src="Jolka.jpg";
     jolkaZdj.alt="Jolanta";


     
     const nowaWiadomosc = document.createElement('p');
     nowaWiadomosc.innerHTML = wiadomosc;




     jolkaDiv.appendChild(jolkaZdj);
     jolkaDiv.appendChild(nowaWiadomosc);
     
   
    chat.appendChild(jolkaDiv);
    

    
    document.getElementById("twojaWiadomosc").value = "";
    jolkaDiv.scrollIntoView();


}


function generuj(){

    const losowaLiczba = Math.floor(Math.random() *9);
    console.log(losowaLiczba);

    const wypowiedzKrzysztofa = Krzysztof[losowaLiczba];

    console.log(wypowiedzKrzysztofa);

    const krzysiekDiv = document.createElement('section');
    krzysiekDiv.classList.add("krzysztof");

    const krzysiekZdj = document.createElement('img');
    krzysiekZdj.src="Krzysiek.jpg";
    krzysiekZdj.alt = "krzysztof";

    const krzysiekWiadomosc = document.createElement('p');
    krzysiekWiadomosc.innerHTML = wypowiedzKrzysztofa;


    chat.appendChild(krzysiekDiv);
    krzysiekDiv.appendChild(krzysiekZdj);
    krzysiekDiv.appendChild(krzysiekWiadomosc);
    krzysiekDiv.scrollIntoView();
}