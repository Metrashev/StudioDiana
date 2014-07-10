var ITTI_JS_Loader = function(){

	var scripts = document.getElementsByTagName('script');
	var parts = scripts[scripts.length-1].src.split('?');

	this.suffix = typeof(parts[1]) == 'undefined' ? '' : '?'+parts[1];
	this.prefix = parts[0].replace('lib.js','');
	console.log(this.prefix);

	this.loadJS = function(url){
		document.write('<script src="'+this.prefix+url+this.suffix+'"></script>');
	};

	this.loadCSS = function(url){
		document.write('<link href="'+this.prefix+url+this.suffix+'" rel="stylesheet" type="text/css"/>');
	};
};


(function(){
	var l = new ITTI_JS_Loader();
	l.prefix += '../itti/js/';
console.log(l.prefix);

	l.loadJS('jquery-1.11.0.min.js');
	l.loadJS('jquery-migrate-1.2.1.js');
	//l.loadJS('jquery.bgiframe-2.1.2.js');
	l.loadJS('jquery.cookie.js');

	l.loadCSS('jq.ui.css/redmond/jquery-ui-1.9.2.custom.css');
	l.loadJS('jquery-ui-1.9.2.min.js');

	l.loadCSS('jquery.layout/layout-default-latest.css');
	l.loadJS('jquery.layout/jquery.layout-latest.min.js');
	
	l.loadCSS('jquery.dynatree/skin/ui.dynatree.css');
	l.loadJS('jquery.dynatree/jquery.dynatree.min.js');

	l.loadCSS('jquery.datetimepicker/jquery-ui-timepicker-addon.css');
	l.loadJS('jquery.datetimepicker/jquery-ui-timepicker-addon.js');
	
	// jquery file upload plugin:
	l.loadJS('jquery.iframe-transport.js');
	l.loadJS('jquery.fileupload.js');
	l.loadJS('itti/jquery.itti-managedfiles.js');
	l.loadJS('itti/imageresizer/imageresizer.js');
	l.loadCSS('itti/imageresizer/imageresizer.css');

	l.loadJS('itti/basic.js');
})();
