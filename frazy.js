/// Teksty podpowiedzi w tablicy
var podpowiedzi_element=[[],["Wyjątki z rozkazu", "komendanta hufca", "komendanta chorągwi"],["Zwołuje", "Zarządzam"],["Podaję do wiadomości, że", "Informuje o", "decyzji", "Rady Drużyny"]];

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
for(var i=0; i<=document.getElementsByName('punkt')[0].lastIndex; i++){
    l[i]=1;
}

/// Funkcja do dodawania punktów z textarea do diva gotowego do exportu

function wpisz(){
    var wybrany_obj = document.getElementsByName('punkt')[0];
    var div_glowny= document.getElementById('tresc');
    var tresc = document.getElementById('wpisana_tresc').value;
    var label = wybrany_obj.options[wybrany_obj.selectedIndex].parentNode.label;
    if (div_glowny.hasChildNodes()){
        var children = div_glowny.childNodes;
        for (var i = 0; i < div_glowny.children.length; i++){
            if(label==div_glowny.children[i].innerHTML){
                var under_children = div_glowny.children[i].childNodes;
                for(var j=0; j < div_glowny.children[i].underchildren.length; j++){
                    if(wybrany_obj.value=div_glowny.children[i].underchildren[j].innerHTML){
                        var wpisz = document.createElement;
                        wpisz.tagName='div';
                        wpisz.innerHTML=wybrany_obj.value.substring(0, wybrany_obj.value.lastIndexOf('.'))+l[wybrany_obj.selectedIndex]+". "+tresc;
                        break;
                    }
                }
            }
        }
    }else{
        wybrany_obj
    }
}
