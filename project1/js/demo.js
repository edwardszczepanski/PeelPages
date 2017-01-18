$(function() {
    var pages = new Array();
    $('#first').on('click', function(){
        pages.push(window.open('https://reddit.com', '_blank'));
    });
    $('#second').on('click', function(){
        for (var i = 0; i < pages.length; ++i){
            pages[i].close();
        }
    });
    var counter = 0;
    $('#third').on('click', function(){
        var specialCode = 'abcde12345';
        window.open('./childWindow.html?' + counter);
        counter++;
    });
})
