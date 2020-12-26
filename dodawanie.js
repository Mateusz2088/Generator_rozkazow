var licznik_z=1;
function zarządzanie(){
    var pkt_1=document.getElementById('1');
    if(licznik_z==1){
        var pod_pkt=document.createElement('ol');
        pod_pkt.id="podpunkty_1";
        pkt_1.appendChild(pod_pkt);
        pkt_1.className="show";
    }else{
        var pod_pkt=document.getElementById("podpunkty_1");
    }
    var punkt = document.createElement('li');
    punkt.innerHTML = document.getElementById('tresc_1').value;
    console.log(document.getElementById('tresc_1').value);
    pod_pkt.appendChild(punkt);
    licznik_z++;
    document.getElementById('tresc_1').value="";
}
function nl2br (str, is_xhtml) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function wstep(){
    var div=document.getElementById('tresc');
    div.innerHTML=nl2br(document.getElementById('tresc_w').value)+div.innerHTML;
}

var licznik_zw=1;
function zwolnienia(){
    var pkt_1=document.getElementById('2');
    if(licznik_zw==1){
        var pod_pkt=document.createElement('ol');
        pod_pkt.id="podpunkty_2";
        pkt_1.appendChild(pod_pkt);
        pkt_1.className="show";
    }else{
        var pod_pkt=document.getElementById("podpunkty_2");
    }
    var punkt = document.createElement('li');
    punkt.innerHTML = document.getElementById('tresc_2').value;
    console.log(document.getElementById('tresc_2').value);
    pod_pkt.appendChild(punkt);
    licznik_zw++;
    document.getElementById('tresc_2').value="";
}

var licznik_m=1;
function mianowania(){
    var pkt_1=document.getElementById('3');
    if(licznik_m==1){
        var pod_pkt=document.createElement('ol');
        pod_pkt.id="podpunkty_3";
        pkt_1.appendChild(pod_pkt);
        pkt_1.className="show";
    }else{
        var pod_pkt=document.getElementById("podpunkty_3");
    }
    var punkt = document.createElement('li');
    punkt.innerHTML = document.getElementById('tresc_3').value;
    console.log(document.getElementById('tresc_3').value);
    pod_pkt.appendChild(punkt);
    licznik_m++;
    document.getElementById('tresc_3').value="";
}

var licznik_p=1;
function przyznanie(){
    var pkt_1=document.getElementById('4');
    if(licznik_p==1){
        var pod_pkt=document.createElement('ol');
        pod_pkt.id="podpunkty_4";
        pkt_1.appendChild(pod_pkt);
        pkt_1.className="show";
    }else{
        var pod_pkt=document.getElementById("podpunkty_4");
    }
    var punkt = document.createElement('li');
    punkt.innerHTML = document.getElementById('tresc_4').value;
    console.log(document.getElementById('tresc_4').value);
    pod_pkt.appendChild(punkt);
    licznik_p++;
    document.getElementById('tresc_4').value="";
}

var licznik_n=1;
function nagrody(){
    var pkt_1=document.getElementById('5');
    if(licznik_n==1){
        var pod_pkt=document.createElement('ol');
        pod_pkt.id="podpunkty_5";
        pkt_1.appendChild(pod_pkt);
        pkt_1.className="show";
    }else{
        var pod_pkt=document.getElementById("podpunkty_5");
    }
    var punkt = document.createElement('li');
    punkt.innerHTML = document.getElementById('tresc_5').value;
    console.log(document.getElementById('tresc_5').value);
    pod_pkt.appendChild(punkt);
    licznik_n++;
    document.getElementById('tresc_5').value="";
}

var licznik_u=1;
function upomnienia(){
    var pkt_1=document.getElementById('6');
    if(licznik_u==1){
        var pod_pkt=document.createElement('ol');
        pod_pkt.id="podpunkty_6";
        pkt_1.appendChild(pod_pkt);
        pkt_1.className="show";
    }else{
        var pod_pkt=document.getElementById("podpunkty_6");
    }
    var punkt = document.createElement('li');
    punkt.innerHTML = document.getElementById('tresc_6').value;
    console.log(document.getElementById('tresc_6').value);
    pod_pkt.appendChild(punkt);
    licznik_u++;
    document.getElementById('tresc_6').value="";
}

var licznik_r=1;
function rozne(){
    var pkt_1=document.getElementById('7');
    if(licznik_r==1){
        var pod_pkt=document.createElement('ol');
        pod_pkt.id="podpunkty_7";
        pkt_1.appendChild(pod_pkt);
        pkt_1.className="show";
    }else{
        var pod_pkt=document.getElementById("podpunkty_7");
    }
    var punkt = document.createElement('li');
    punkt.innerHTML = document.getElementById('tresc_7').value;
    console.log(document.getElementById('tresc_7').value);
    pod_pkt.appendChild(punkt);
    licznik_r++;
    document.getElementById('tresc_7').value="";
}
