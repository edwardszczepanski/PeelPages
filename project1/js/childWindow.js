$(function() {
    window.requestFileSystem = window.requestFileSystem;

    var query = location.search.substring(1);
    document.getElementById('text').innerHTML += query;
    download(query, String(query) + '.json', 'text/plain');
});

// Not sure if I am going to keep this function
function download(data, filename, type) {
    var a = document.createElement("a"),
        file = new Blob([data], {type: type});
    if (window.navigator.msSaveOrOpenBlob) // IE10+
        window.navigator.msSaveOrOpenBlob(file, filename);
    else { // Others
        var url = URL.createObjectURL(file);
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        setTimeout(function() {
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);  
        }, 0); 
    }
}

// http://stackoverflow.com/questions/87359/can-i-pass-a-javascript-variable-to-another-browser-window
// http://stackoverflow.com/questions/13405129/javascript-create-and-save-file
// https://www.html5rocks.com/en/tutorials/file/filesystem/
