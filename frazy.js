/// Teksty podpowiedzi w tablicy
var podpowiedzi_element=[[],["Wyjątki z rozkazu","komendanta hufca","komendanta chorągwi"],["Zwołuje","Zarządzam"],["Podaję do wiadomości, że","Informuje o","decyzji","Rady Drużyny"],["Mianuję","na wniosek Rady Drużyny","z dniem"],["Zwalniam","na wniosek Rady Drużyny","z funkcji","z dniem"], ["Powołuję w skład Rady Drużyny","z dniem"],["Zwalniam ze składu Rady Drużyny","z dniem"], ["Powołuje","na wniosek Rady Drużyny","zastęp","w składzie:"], ["Rozwiązuje zastęp","na wniosek Rady Drużyny","Dotychczasowi członkowie zastępu zostają przydzieleni do nastepujących zastepów:"], ["Przenoszę z zastępu","do zastępu"], ["Zamykam próbę i przyznaję stopień"], ["Otwieram próbę na stopień"], ["Zamykam próbę i","nie przynaje sprawności","przyznaję sprawność"], ["Otwieram próbę na sprawność"], ["Zaliczam projekt"], ["Zatwierdzam realizację projektu", "przez zastęp"],["Otwieram próbę na znak służby","zespołowi w składzie"], ["Zamykam próbę i przyznaję znak służby"],["Na wniosek", "przyznaje odznakę", "przyznaje uprawnienia"],["Nadaję Naramiennik Wędrowniczy"],["Otwieram próbę wędrowniczą"], ["Otwieram próbę harcerza"],["Przyjmuję w poczet członków ZHP"],["Podaję do wiadomości, że z dniem"," wystąpił z ZHP."],["Z dniem","skreślam z listy członków ZHP", "z powodu niewypełniania obowiązków członkowskich."],["Podaję do wiadomości, że w wyniku nieopłacenia składki członkowskiej w terminie z dniem","ustało członkostwo w ZHP"],["Z dniem","przyjmuję w poczet członków drużyny ","i nadaję jej przydział służbowy do naszej drużyny. Informuję, że","przyszła do nas z","Podaję do wiadomości, że z dniem","przeszedł do", "Z dniem","skreślam z listy członka drużyny"],["Udzielam upomnienia","za niewywiązywanie się z obowiązków","Udzielam nagany","za sprzeczną z Prawem Harcerskim postawę podczas","Wykluczam z ZHP","za postępowanie sprzeczne z Prawem Harcerskim","odmowę zmiany postawy."],["Udzielam pochwały","Przyznaję nagrodę"],[],["Informuję, że w rozkazie","z dnia","w punkcie","błędnie podano"]];

/// wyświetlanie podpowiedzi w zależności od wybranego punktu

function podpowiedzi(wybor){
    document.getElementById("pomoc").innerHTML=" ";
    var wybrany_obj=document.getElementsByName('punkt')[0];

    for(var i=0; i<podpowiedzi_element[wybrany_obj.selectedIndex].length; i++){
        var tmp=document.createElement("div");
        tmp.innerHTML=podpowiedzi_element[wybrany_obj.selectedIndex][i];
        tmp.name="podpowiedz_obj";
        tmp.className="col-sm-6 col-md-3 btn btn-info border border-primary"
        tmp.addEventListener("click", function(){
            dodaj_do_textu(this);
        });
        ///onclick="dodaj_do_tekstu("+wybrany_obj.selectedIndex+", "+i+")";
        document.getElementById("pomoc").appendChild(tmp);
    }
    console.log(wybrany_obj.selectedIndex);
    console.info(wybor);
}

/// funkcja dodająca podpowiedzi do tekstu i usuwająca wybraną pozycje

function dodaj_do_textu(x){
    console.log(x.innerHTML);
    document.getElementById('wpisana_tresc').value+=x.innerHTML+" ";
    x.remove();
}

/// Liczniki podpunktów.
var l = [];
for(var i=0; i<=32; i++){
    l[i]=1;
}

function dodaj_wpis(gr, wybrany_obj, optogroup, tresc){
    if(document.getElementsByName(gr)[0].firstElementChild.nodeName!='H3'){
        var h3 = document.createElement("h3");
        h3.innerHTML=optogroup.label;
        h3.className="col-12";
        document.getElementsByName(gr)[0].prepend(h3);
    }
    if(!document.getElementsByName('pp')[wybrany_obj.selectedIndex].firstElementChild){
        var h4 = document.createElement("h4");
        h4.innerHTML=wybrany_obj.value;
        h4.className="col-12";
        document.getElementsByName('pp')[wybrany_obj.selectedIndex].appendChild(h4);
    }
    var p= document.createElement("p");
    p.innerHTML= wybrany_obj.value.substring(0, wybrany_obj.value.lastIndexOf(".")+1)+ l[wybrany_obj.selectedIndex]+'. '+tresc;
    p.className="col-12";
    l[wybrany_obj.selectedIndex]++;
    document.getElementsByName('pp')[wybrany_obj.selectedIndex].appendChild(p);
    console.log("done");
}

/// Funkcja do dodawania punktów z textarea do diva gotowego do exportu

function wpisz(){
    var wybrany_obj = document.getElementsByName('punkt')[0];
    var tresc = document.getElementById('wpisana_tresc').value;
    var optogroup = wybrany_obj.options[wybrany_obj.selectedIndex].parentNode;
    if(wybrany_obj.selectedIndex<2){
        document.getElementsByName('pp')[wybrany_obj.selectedIndex].innerHTML=tresc;
    }else{
        if(wybrany_obj.selectedIndex>=28){
            var gr=("g"+(wybrany_obj.selectedIndex-22)).toString();
            console.log(gr);
            if(!document.getElementsByName(gr)[0].hasChildNodes()){
                var h3 = document.createElement("h3");
                h3.innerHTML=wybrany_obj.value;
                h3.className="col-12";
                document.getElementsByName(gr)[0].prepend(h3);
            }
            var p= document.createElement("p");
            p.innerHTML= wybrany_obj.value.substring(0, wybrany_obj.value.lastIndexOf(".")+1)+ l[wybrany_obj.selectedIndex]+'. '+tresc;
            p.className="col-12";
            l[wybrany_obj.selectedIndex]++;
            document.getElementsByName(gr)[0].appendChild(p);
            console.log("done");
        }else{
            dodaj_wpis(optogroup.id, wybrany_obj, optogroup, tresc);
        }
    }

    document.getElementById('wpisana_tresc').value="";
    podpowiedzi(wybrany_obj.selectedIndex);
}
