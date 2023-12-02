function searchEmployee() {
    var searchValue = document.getElementById('searchInput').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById('searchResult').innerHTML = xhr.responseText;
            } else {
                alert('Error: ' + xhr.status);
            }
        }
    };

    xhr.open('GET', 'search_backend.php?search=' + searchValue, true);
    xhr.send();
}
