function pobierz_dane(){
    var data = new Date();
    data.setDate(document.getElementsByName('data')[0].value);
    document.getElementById('head_r').innerHTML=document.getElementsByName('miejsce')[0].value+','+data.getDay+'.'+data.getMonth+'.'+data.getFullYear;
    document.getElementById('head_l').innerHTML='Związek Harcerstwa Polskiego<br>'+document.getElementsByName('druzyna')[0].value+'<br>'+document.getElementsByName('hufiec')[0].value;
    document.getElementById('nr_roz').innerHTML=document.getElementsByName('nr').value+'/'+document.getElementsByName('rok').value;
    for(var i=0; i<document.getElementsByName('st_instr').length; i++){
        if(document.getElementsByName('st_instr')[i].checked){
            var st=document.getElementsByName('st_instr')[i].value;
        }
    } 
    document.getElementById('podpis').innerHTML='CZUWAJ!<br>'+st+' '+document.getElementsByName('personalia')[0].value;
}
/// Zamiana znaku końca linii na <br>

function nl2br (str, is_xhtml) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

/// dodawanie punktów i podpunktów do rozkazu

/// liczniki
var l = [];
for(var i=0; i<=7;i++){
    l[i]=1;
}
var nag= ['Wstęp','1. Uchwały, zarządzenia, decyzje','2. Zwolnienia','3. Mianowania','4. Przyznanie stopni, sprawności, znaków służb, uprawnień, odznak, zaliczenie zadań i projektów','5. Nagrody i wyróżnienia','6. Upomnienia i kary','7. Różne']

/// dodawanie punktów do diva
function dodaj_pkt(pkt_1, pkt_2){
    if(l[pkt_1]==1){
        var h3=document.createElement('h4');
        h3.innerHTML=nag[pkt_1];
        document.getElementById(pkt_1).append(h3);
    }
    if(pkt_1!=0){
        var p = document.createElement('p');
        p.innerHTML='&nbsp;'+pkt_1+'.'+l[pkt_1]+'. '+document.getElementsByName('tr_ppkt')[pkt_1].value;
        p.className="col-12";
        document.getElementById(pkt_1).appendChild(p);
    }else{
        document.getElementById(0).innerHTML=nl2br(document.getElementsByName('tr_ppkt')[0].value);
    }
    pobierz_dane();
}