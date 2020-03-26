document.addEventListener('DOMContentLoaded', function(event) {
    let xhr = new XMLHttpRequest();
    let picsBlock = document.getElementById('pic-children');
    let nopicsBlock = document.getElementById('nopic-children');
    let picsCategory = document.getElementById("pic");
    let nopicsCategory = document.getElementById("nopic");

    xhr.onload = function() {
        if(xhr.status >= 200 && xhr.status < 300) {
            console.log("Success!", xhr);
        } else {
            console.log("Request failed!");
        }
    };

    xhr.open('GET', 'getMovies.php');
    xhr.send();
    xhr.onreadystatechange = function() {
        if(xhr.readyState==4) {
            let response = JSON.parse(xhr.responseText);
            for(let el of response){
                if(el.has_picture == 1) {
                    picsBlock.innerHTML += "<p> - - "+el.title+"</p>";
                } else {
                    nopicsBlock.innerHTML += "<p> - - "+el.title+"</p>";
                }
            }

        }
    };

    document.getElementById("main").onclick = function(event){
        if(document.getElementById("sub-block").classList.contains("hidden")) {
            document.getElementById("sub-block").classList.remove("hidden");
        } else {
            document.getElementById("sub-block").classList.add("hidden");
        }
    };

    picsCategory.onclick = function(event){
        if(picsBlock.classList.contains("hidden")) {
            picsBlock.classList.remove("hidden");
        } else {
            picsBlock.classList.add("hidden");
        }
    };

    nopicsCategory.onclick = function(event){
        if(nopicsBlock.classList.contains("hidden")) {
            nopicsBlock.classList.remove("hidden");
        } else {
            nopicsBlock.classList.add("hidden");
        }
    }
});