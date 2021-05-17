function mostrarSorteado(str){
    var xhttp;
    if (str == "") {
        document.getElementById("sorteadoInfo").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sorteadoInfo").innerHTML = this.responseText;
        }
    };
  xhttp.open("GET", "mostrarSorteado.php?q="+str, true);
  xhttp.send();
}
