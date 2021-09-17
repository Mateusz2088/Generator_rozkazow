function pobierz_dane(){
    document.getElementById('head_r').innerHTML=document.getElementsByName('miejsce')[0].value+','+document.getElementsByName('data')[0].value;///+data.getDay()+'.'+data.getMonth()+'.'+data.getFullYear();
    document.getElementById('head_l').innerHTML='Związek Harcerstwa Polskiego<br>'+document.getElementsByName('druzyna')[0].value+'<br>'+document.getElementsByName('hufiec')[0].value;
    document.getElementById('nr_roz').innerHTML=document.getElementsByName('nr')[0].value+'/'+document.getElementsByName('rok')[0].value;
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
var nag= ['Wstęp','1. Zarządzenia i informacje','2. Drużyna','3. Zastępy','4. Instrumenty metodyczne','5. Sprawy członkowskie','6. Kary organizacyjne','7. Pochwały, wyróżnienia nagrody', '8. Inne', '9. Sprostowania']

/// dodawanie punktów do diva
function dodaj_pkt(pkt_1){
    pkt_1=nr; //document.getElementsByName('title_popup')[0].innerHTML;
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
    l[pkt_1]++;
    document.getElementsByName('tr_ppkt')[pkt_1].value='';
}