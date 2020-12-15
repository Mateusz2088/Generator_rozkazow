var licznik=1;
function zarządzanie(){
    var pkt_1=document.getElementById('1');
    if(licznik==1){
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
    licznik++;
}
