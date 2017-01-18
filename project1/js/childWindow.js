$(function() {
    var query = location.search.substring(1);
    document.getElementById('text').innerHTML += query;
});

// http://stackoverflow.com/questions/87359/can-i-pass-a-javascript-variable-to-another-browser-window
