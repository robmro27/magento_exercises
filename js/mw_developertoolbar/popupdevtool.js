
var popupStatus = 0;
var is_dev_click = 0;
var $j_mw_devtoolbar = jQuery.noConflict();

////loading popup with jQuery magic!
//function loadPopup_devtool(){
//	//loads popup only if it is disabled
//	if(popupStatus==0){
//		$j_mw_devtoolbar("#mw_devtoolbar").fadeIn("slow");
//		popupStatus = 1;
//	}
//}

//disabling popup with jQuery magic!
function disablePopup_devtool(){
//	//disables popup only if it is enabled
//	if(popupStatus==1){
		$j_mw_devtoolbar("#mw_devtoolbar").fadeOut("slow");
//		popupStatus = 0;
//	}
}

//centering popup
function centerPopup_devtool(){
	//centering
	$j_mw_devtoolbar("#mw_devtoolbar").css({
		"position": "fixed",
		"bottom": 0,
		"left": 0
	});
}

//for slide down box
function HideDialog_devtool() {
//	var i = 0;
	popupStatus = 0; 
	$j_mw_devtoolbar('#mw_devtoolbar').css('posision','fixed');	
    $j_mw_devtoolbar('#mw_devtoolbar').css('display','block');
    var i = $j_mw_devtoolbar("#mw_devtoolbar").height();
    while(i >= 18)
	{
		$j_mw_devtoolbar('#mw_devtoolbar').animate({'bottom': '-=1px'}, 0.0001);
		i-=1;
	}
}

//for slide up box
function ShowDialog_devtool() {
	var i = 0;
	popupStatus = 1; 
	$j_mw_devtoolbar('#mw_devtoolbar').css('posision','fixed');
	//$j_mw_devtoolbar('#popupContact').animate({'bottom': '+=25px'},50);
	//$('#popupContact').css('bottom','0px');
    $j_mw_devtoolbar('#mw_devtoolbar').css('display','block');
    var popupHeight = $j_mw_devtoolbar("#mw_devtoolbar").height()-18;
	while(i <= popupHeight)
	{
		$j_mw_devtoolbar('#mw_devtoolbar').animate({'bottom': '+=1px'}, 0.0001);
		i+=1;
		//if(i == 25) {$('#popupContact').css('posision','fixed');}
	}
	//$('#popupContact').css('bottom','0px');
}


//////////////////////////////////////

function clickhide_devtool(){
	document.getElementById('hide_toolbar').style.display='none';
	document.getElementById('show_toolbar').style.display='inline';
	//pf204652IntervalId = setInterval ( 'hide_toolbar()', 5 );
}
function clickshow_devtool(){
	document.getElementById('hide_toolbar').style.display='inline';
	document.getElementById('show_toolbar').style.display='none';
	//pf204652IntervalId = setInterval ( 'show_toolbar()', 5 );
}

//-------------------------------------------------------------

//CONTROLLING EVENTS IN jQuery
$j_mw_devtoolbar(document).ready(function(){
	var _active;
	_active = $j_mw_devtoolbar("#active_devtool").val();
	if( _active == "1"){			
    	centerPopup_devtool();
	    HideDialog_devtool();
	    clickhide_devtool();
				
		//CLOSING POPUP
		//Click the x event!
		$j_mw_devtoolbar("#close_toolbar").click(function(){
	    	disablePopup_devtool();
		});
		
//		$j_mw_devtoolbar("#hide_toolbar").click(function(){
//			//HideDialog_devtool();	
//			$j_mw_devtoolbar("#hide_toolbar").addClass("min");
//		});
		
		$j_mw_devtoolbar("#title_devtool").click(function(){
			is_dev_click = 1;
			if(popupStatus == 1)
			{
				HideDialog_devtool();	
				clickhide_devtool();
				popupStatus = 0;
				//$j_mw_devtoolbar("#hide_toolbar").addClass("min");
			}
			else {
				ShowDialog_devtool();	
				popupStatus = 1;
				//$j_mw_devtoolbar("#show_toolbar").addClass("max");
				clickshow_devtool();
			}
			
		});
		
		$j_mw_devtoolbar("#show_toolbar").click(function(){
			//ShowDialog_devtool();	
			popupStatus = 0;
			//$j_mw_devtoolbar("#show_toolbar").addClass("max");
		});
		
		$j_mw_devtoolbar("#close_devtoolbar").click(function(){
			HideDialog_devtool();	
			clickhide_devtool();
			popupStatus = 0;
		});
	}
});