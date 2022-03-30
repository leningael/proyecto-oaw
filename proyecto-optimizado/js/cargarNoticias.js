var ordenNoticias = document.querySelectorAll(".itemDrop");
for(let i = 0; i < ordenNoticias.length; i++){
    ordenNoticias[i].addEventListener("click", function(){
        let request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("newsSpace").innerHTML = this.responseText;
                asignarModal();
            }
        };
        request.open('GET', 'scripts/ordenarNoticias.php?order='+this.id);
        request.send();
    });
}

/* 
function loadCategoryNews(id){
    let request = new XMLHttpRequest();
    let response = "";
    let noticias = document.getElementById("newsSpace");
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
        }
    };
    request.open('GET', './ordenarCategorias.php?c=' + id, false);
    request.send();
    noticias.innerHTML = response;
    }
 */