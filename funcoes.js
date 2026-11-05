function confirmaexcluir(destino,codigo,nome) {
    if (window.confirm("Confirma exclusão lista: "+codigo+" - "+nome)) {
       redirecionar(destino+"?codigo="+codigo); 
    } 
}

function redirecionar(destino) {
    window.location = "/listacomprast31/"+destino;
} 

function limpamsg(idmsg) {
    setTimeout(function () {
        document.getElementById(idmsg).innerHTML = "";
    }, 5000);
} 