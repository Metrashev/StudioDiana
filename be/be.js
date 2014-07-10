var DefaultTinyMCE = {

	plugins: [
		"advlist autolink lists link image charmap preview anchor",
		"searchreplace visualblocks code fullscreen",
		"media table contextmenu paste",
		"importcss"
	],
	relative_urls: false,
	remove_script_host: true,

	menubar: "edit insert view format table",	                
	toolbar: "formatselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo | code",
	
	block_formats: "Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3;Header 4=h4;Header 5=h5;Preformatted text=pre;Address=address;div=div",

	style_formats: [
		{title: 'Image Left', selector: 'img', styles: {
			'float' : 'left',
			'margin': '0px 5px 2px 0px'
		}},
		{title: 'Image Right', selector: 'img', styles: {
			'float' : 'right',
			'margin': '0px 0px 2px 5px'
		}}
	],

	content_css : "/css/main.css?" + new Date().getTime(),
	importcss_selector_filter: /\.my/,

	file_browser_callback: function(field_name, url, type, win) {
		tinymce.activeEditor.windowManager.open({
			title: "File Manager",
			url: '/be/fileman/popup.php',
			width: 700,
			height: 600
		}, {
			action: type,
			target_ctrl: win.document.getElementById(field_name)
		});
	}
};

var DefaultDatePicker = {
	dateFormat:'dd.mm.yy',
	changeYear:true,
	changeMonth:true,
	yearRange:'1900:+10',
	showTimepicker:false
};

$(function(){

	$('th[ord]').each(function(){
		var th=$(this);
		if(th.attr('ord')=='ASC'){
			th.append(' <sup>▼'+th.attr('ordpos')+'</sup>');
		} else {
			th.append(' <sup>▲'+th.attr('ordpos')+'</sup>');
		}
	});

	$('th[order]').on('click', function(event){
		var th = $(this);
		var tbl = th.closest('table');
		var name='';
		var prefix = tbl.attr('prefix');
		var val = th.attr('order');

		if(event.ctrlKey) {
			name = prefix ? prefix+'[do][addorder]' : 'do[addorder]';
		} else {
			name = prefix ? prefix+'[do][order]' : 'do[order]';
		}

		if(th.attr('ord')==undefined) val = val+' ASC';
		if(th.attr('ord')=='ASC') val = val+' DESC';

		var input = $('<input type="hidden" name="'+name+'" value="'+val+'"/>');
		tbl.after(input);
		$(input.get(0).form).submit();

	});

	$('button[name$="[delete]"]').on('click', function(event){
		return confirm('Please confirm delete?');
	});

	$('div.ittiSerachContainer div.ittiBoxHeader').prepend( "<span class='itti-icon expand'></span>");

	$('div.ittiSerachContainer div.ittiBoxHeader').on('click', function(event){

		var a = $(this).next().toggleClass('alter');
		$('span', $(this)).toggleClass('collapse');

		$.cookie('SBState', a.hasClass('alter') ? 'alter' : 'normal');
	});

	if($.cookie('SBState')=='alter'){
		$('div.ittiSerachContainer div.ittiBoxHeader').click();
	}

	$('button.doSearch').prepend("<span class='itti-icon doSearch'></span>");
	$('button.doClear').prepend("<span class='itti-icon doClear'></span>");
	$('button.doNew').prepend("<span class='itti-icon doNew'></span>");
	$('button.doExport').prepend("<span class='itti-icon doExport'></span>");
	$('button.doEdit').prepend("<span class='itti-icon doEdit'></span>");
	$('button.doDelete').prepend("<span class='itti-icon doDelete'></span>");
	$('button.doSave').prepend("<span class='itti-icon doSave'></span>");
	$('button.doBack').prepend("<span class='itti-icon doBack'></span>");


	$('div.ittiBox').wrapInner('<div class="ittiBox1"><div class="ittiBox2"><div class="ittiBox3"><div class="ittiBox4"></div></div></div></div>');


	$("input[data-managedfiles]").each(function(){
		var obj=$(this);
		if(typeof obj.data().managedfiles !== 'object'){
			alert('Invalid JSON string for element id:#'+obj.attr('id')+' "'+obj.data().managedfiles+'"');
			return;
		}

		var options = {
			url: '/files/api.php'
		};

		$.extend(options, obj.data().managedfiles);
		obj.managedfiles(options);

	});

	$("textarea[data-tinymce]").each(function(){
		var obj=$(this);
		if(typeof obj.data().tinymce !== 'object'){
			alert('Invalid JSON string for element id:#'+obj.attr('id')+' "'+obj.data().tinymce+'"');
			return;
		}

		var options = {};
		$.extend(options, DefaultTinyMCE, obj.data().tinymce);
		options.selector = '#'+obj.attr('id').jqEscape();
		options.width = $(options.selector).width();
		options.height = $(options.selector).height();
		tinymce.init(options);
	});


	$('input[data-datepicker]').each(function(){
		var obj=$(this);

		if(typeof obj.data().datepicker !== 'object'){
			alert('Invalid JSON string for element id:#'+obj.attr('id')+' "'+obj.data().datepicker+'"');
			return;
		}



		var options = {};
		$.extend(options, DefaultDatePicker, obj.data().datepicker);

		var val = obj.val();

		if (val) {
			val = Date.parseISO(val);
		}

		if (val) {
			obj.datetimepicker(options).datepicker('setDate', val);
		} else {
			obj.datetimepicker(options);
		}
		

	});


	$('form').on('submit', function(){

		$(this).find('input[data-datepicker]').each(function(i,domNode){
			var d=$(domNode);
			var d2= d.datetimepicker('getDate');
			var val = d.val();
			if(d2) {
				d.datetimepicker('setDate', d2);
				
				if(d.datepicker('option', 'showTimepicker')){
					d.val(val==d.val() ? d2.toISODateTime() : val) ;
				} else {
					d.val(val==d.val() ? d2.toISODate() : val) ;
				}
			}
		});


		return true;
	});


	$('.Errors').addClass('ui-state-error ui-corner-all');
	$('*[required]').addClass('required');


	/*
	if ($.browser.msie && 8 > parseInt($.browser.version, 10)) {
		$(document).on('click', 'form button', function(e){
			var f = $(this).get(0).form;

			if (typeof(f) !== 'undefined') {
				if (this.type && this.type != 'submit')
					return;

				$("input[type='hidden'][name='"+this.name+"']", f).remove();

				if (typeof(this.attributes.value) !== 'undefined')
					$(f).append('<input name="'+this.name+
							'" value="'+this.attributes.value.value+'" type="hidden">');

				$(f).trigger('submit');
			}
		});
	}
*/

	$('input[action],select[action]').on('change',function(event){
		var o=$(this);
		o.attr('name', o.attr('action'));
		$(o.get(0).form).submit();

	});

	$("input:not([action])").on('keypress', function (event) {
		
		if (event.which === 13) {
			var btn = $("button[default]");
			if(btn.length){
				btn.click();
				event.preventDefault();
				return false;
			}
		}
	});
	
	$(".ittiToggler").each(function(){
		var t = $(this).data().toggle;

		if($.cookie('ittiToggler'+t)==1){
			$('.'+t).hide();
			$(this).addClass('off');
		}
	});

	$(".ittiToggler").bind('click', function(){
		var t = $(this).data().toggle;
		$(this).toggleClass('off');
		
		var cookieOptions = $(this).data().cookie;
		if(typeof cookieOptions !== 'object'){
			cookieOptions = {}
		}

		if($(this).hasClass('off')){
			$('.'+t).hide();
			$.cookie('ittiToggler'+t, 1, cookieOptions);
		} else {
			$('.'+t).show();
			$.cookie('ittiToggler'+t, false, cookieOptions);
		}
	});


});
