var searchBar=document.getElementById("searchBar");searchBar.addEventListener("input",function(){for(var e=searchBar.value.toLowerCase(),b=document.getElementsByClassName("card-news"),c=document.getElementsByClassName("card-title"),a=0;a<c.length;a++){var d=c[a].innerHTML.toLowerCase();console.log(d);d.includes(e)?b[a].style.display="inline-block":b[a].style.display="none"}});