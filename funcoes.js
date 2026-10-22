function redirecionar(destino) {
    window.location = "/listacomprast31/"+destino;
} 

function limpamsg(idmsg) {
    setTimeout(function () {
        document.getElementById(idmsg).innerHTML = "";
    }, 5000);
} 