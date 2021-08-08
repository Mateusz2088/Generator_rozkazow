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
    var optogroup = wybrany_obj.options[wybrany_obj.selectedIndex].parentNode;
    var z=false;
    if (div_glowny.hasChildNodes()){
        switch(optogroup.name){
            case "g0":
                document.getElementsByName('g0')[1].innerHTML=this.innerHTML+tresc;
                break;
            case "g1":
                for (let i = 0; i < document.getElementsByName('g0')[1].children.length; i++) {
                    if(document.getElementsByName('g0')[1].children[i].name==wybrany_obj.innerHTML){
                        var p = document.createElement('p');
                        p.innerHTML='&nbsp;'+wybrany_obj.value.substring(0, wybrany_obj.value.lastIndexOf('.'))+'.'+l[wybrany_obj.selectedIndex]+'. '+tresc;
                        p.className="col-12";
                        document.getElementsByName('g0')[1].children[i].appendChild(p);
                        l[wybrany_obj.selectedIndex]++;
                        z=true;
                        break;
                    }
                }
                if(z=false){
                    var div = document.createElement('div');
                    div.name=wybrany_obj.innerHTML;
                    var p = document.createElement('p');
                    p.innerHTML='&nbsp;'+wybrany_obj.value.substring(0, wybrany_obj.value.lastIndexOf('.'))+'.'+l[wybrany_obj.selectedIndex]+'. '+tresc;
                    p.className="col-12";
                    div.appendChild(p);
                    l[wybrany_obj.selectedIndex]++;
                    z=true;
                }
        }
    }else{
        console.error("Błędny kod, sprawdź źródło.");
    }
}
