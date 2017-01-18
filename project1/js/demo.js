$(function() {
    var pages = new Array();
    $('#first').on('click', function(){
        pages.push(window.open('./childWindow.html?' + guid()));
    });
    $('#second').on('click', function(){
        for (var i = 0; i < pages.length; ++i){
            pages[i].close();
        }
    });
})

function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}
