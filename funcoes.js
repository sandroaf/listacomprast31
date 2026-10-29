function confirmaexcluir(codigo,nome) {
    if (window.confirm("Confirma exclusão lista: "+codigo+" - "+nome)) {
       redirecionar("excluirlista.php?codigo="+codigo); 
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