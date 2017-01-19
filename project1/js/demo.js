$(function() {
	filesystem = null;
    var pages = new Array();
    $('#first').on('click', function(){
        pages.push(window.open('./childWindow.html?' + guid()));
    });
    $('#second').on('click', function(){
        for (var i = 0; i < pages.length; ++i){
            pages[i].close();
        }
    });
	window.requestFileSystem  = window.requestFileSystem || window.webkitRequestFileSystem;
	//window.requestFileSystem(type, size, successCallback, opt_errorCallback);
	if (window.requestFileSystem) {
		initFileSystem();
	} else {
		console.log('Not Supported');
	}
});

function initFileSystem() {
	navigator.webkitPersistentStorage.requestQuota(1024 * 1024 * 5,
	function(grantedSize) {
		window.requestFileSystem(window.PERSISTENT, grantedSize, function(fs) {
			filesystem = fs;
			setupFormEventListener();
			listFiles();
		}, errorHandler);
	}, errorHandler);
}

function onInitFS(fs){
	console.log('Opened file system: ' + fs.name);
}


function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}
