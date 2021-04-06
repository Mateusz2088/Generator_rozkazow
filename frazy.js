var nr;
var opcje = [];
var opcje_popup=document.getElementsByName('opcje')[0];
opcje[0]=['Fragment rozkazu jednostki nadżędnej','Wstęp okolicznościowy'];
function popup(przycisk){
    var title = przycisk.innerHTML;
    document.getElementsByName('title_popup')[0].innerHTML=title;
    switch(title){
        case "Wstęp":
            nr=0;
            break;
    }
    
    console.log(nr);
    for(var i=0; i<opcje[nr].length; i++){
        var option= document.createElement('option');
        option.innerHTML=opcje[nr][i];
        document.getElementsByName('opcje')[0].appendChild(option);
    }
}
function set_onclick(a,b){
    console.log(a+' Done '+b);
    document.getElementById('dodaj_post_btn').onclick = dodaj_pkt(a,b);
}
function zamiana(){
   set_onclick(nr, document.getElementsByName('opcje')[0].selectedIndex);
    ///dokończyć dodawanie
}
