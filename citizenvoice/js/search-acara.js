var keyword = document.getElementById("search-key");
var searchButton = document.getElementById("submit-key");
var container = document.getElementById("acara-container");

keyword.addEventListener("keyup", function() {
    console.log(keyword.value);
    // AJAX Object
    var xhr = new XMLHttpRequest();

    // AJAX Connection Check
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    // AJAX execution
    xhr.open('GET', "../common-element/list-acara-ajax.php?keyword=" + keyword.value, true);
    xhr.send();
});

