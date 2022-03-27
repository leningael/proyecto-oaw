
    let searchBar = document.getElementById('searchBar');
    searchBar.addEventListener('input', function () {
        let search = searchBar.value.toLowerCase();
        let allNews = document.getElementsByClassName('card-news');
        let allTitles = document.getElementsByClassName('card-title');

        for (let i = 0; i < allTitles.length; i++) {
            let title = allTitles[i].innerHTML.toLowerCase();
            console.log(title);
            if (!title.includes(search)) {
                allNews[i].style.display = "none";
            } else {
                allNews[i].style.display = "inline-block";
            }
        }

    })
