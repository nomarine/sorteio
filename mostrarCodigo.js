function mostrarCodigo(str){
    var xhttp;
    if (str == "") {
        document.getElementById("codigoParticpante").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("codigoParticpante").innerHTML = this.responseText;
        }
    };
  xhttp.open("GET", "mostrarCodigo.php?nome="+str, true);
  xhttp.send();
}
