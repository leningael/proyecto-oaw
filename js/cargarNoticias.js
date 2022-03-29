function sortingNews(){
    let option = document.getElementById("sortOptions").value;
    let request = new XMLHttpRequest();
    let response = "";
    let noticias = document.getElementById("newsSpace");
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
        }
    };
    request.open('GET', './ordenarNoticias.php?order='+option, false);
    request.send();
    noticias.innerHTML = response;
}


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
