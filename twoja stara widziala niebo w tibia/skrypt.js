let send = document.getElementById("submit");

let imie = document.getElementById("imie");
let nazwisko = document.getElementById("nazwisko");
let email = document.getElementById("email");
let text = document.getElementById("text");
let check = document.getElementById("check");



send.addEventListener("click", () => {

    if (check.checked) {
        
        let wypis = document.getElementById("skrypt");
        let IMIE = imie.value.toUpperCase();
        let NAZWISKO = nazwisko.value.toUpperCase();
        wypis.innerHTML = `${IMIE} ${NAZWISKO}  <br>Treść Twojej sprawy ${text.value}`;
        imie.value="";
        nazwisko.value="";
        email.value="";
        text.value="";
        check.checked=false;

    }
    else {
        let regulamin = document.getElementById("regulamin")
        regulamin.style.color = "red";
        regulamin.innerHTML = `Musisz  zapoznać  się  z  regulaminem`;

    }
})

let reset = document.getElementById("reset")

reset.addEventListener("click", ()=>{
        imie.value="";
        nazwisko.value="";
        email.value="";
        text.value="";
        check.checked=false;
})











// Wykonywany po stronie przeglądarki na stronie kontakt.html, wywoływany przyciskiem „Prześlij”
// − Należy stosować znaczące nazewnictwo zmiennych i funkcji w języku polskim lub angielskim
// − Skrypt pobiera wartości wprowadzone do kontrolek
// − Skrypt wyświetla komunikat w bloku głównym, w paragrafie(akapicie) pod poziomą linią:
// ‒ Jeżeli  nie  zaznaczono  pola  wyboru:  „Musisz  zapoznać  się  z  regulaminem”.  Komunikat  jest
// wyświetlony w kolorze czerwonym
// ‒ Jeżeli zaznaczono pole wyboru < IMIĘ > <NAZWISKO> Treść Twojej sprawy <zgłoszenie>.
//     Komunikat  jest  wyświetlony  w  kolorze  Navy.  Wartości  pól  <>  są  pobrane  z  kontrolek,  imię
//         i nazwisko  są  zawsze  zapisane  wielkimi  literami,  po  nazwisku  występuje  łamanie  linii.  Na
//         obrazie 3 przedstawiono wygląd witryny po wypełnieniu kontrolek i zatwierdzeniu przyciskiem