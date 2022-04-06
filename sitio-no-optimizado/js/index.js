asignarModal();

function asignarModal(){
    var detallesNoticia =  document.querySelectorAll(".opnButton");
    for(let i = 0; i < detallesNoticia.length; i++){
        detallesNoticia[i].addEventListener("click", function(){
            var idNoticia = this.id;
            console.log(idNoticia);
            var modalNoticia = new bootstrap.Modal(document.getElementById('modalNoticia'));
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById("contenidoModal").innerHTML = this.responseText;
                    reducirTamañoImg();
                    modalNoticia.show();
                }   
            }
            /* xhr.addEventListener("load", onRequestHandler); */
            xhr.open("GET", "scripts/detalleNoticia.php?id=" + idNoticia, true);
            xhr.send();
        }); 
    }
}

function reducirTamañoImg(){
    if(document.querySelectorAll("#contenidoModal img").length>0){
        let images = document.querySelectorAll("#contenidoModal img");
        images[0].style.margin="auto";
        images[0].style.display="block";
        for(let i = 0; i < images.length; i++){
            images[i].style.width = "60%";
            images[i].style.maxHeight = "400px";
            images[i].style.objectFit = "cover";
        }
    }
}