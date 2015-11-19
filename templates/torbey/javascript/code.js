jQuery(document).ready(function() {
    //alert('test');
if(jQuery('#page').height()>500) {
	if(jQuery.browser.mozilla) {
	jQuery('#page').height(jQuery('#page').height()-200);
	}
	else {
		jQuery('#page').height(jQuery('#page').height()+20);
	}
}

/*if(jQuery.browser.msie) { 
jQuery('div#rightmenu li').css('font-weight','bold');
}
if(jQuery('#page').height()<500){
	jQuery('body').css('overflow','auto');
}

else {
jQuery('body').css('overflow','auto');
	jQuery(window).scroll(function (event) {
// what the y position of the scroll is
var y = jQuery(this).scrollTop();
jQuery('#header').css('top',y-9);
jQuery('#menu').css('top',y-10);
jQuery('#left').css('top',y);
jQuery('#right').css('top',y);
jQuery('#redline').css('top',y+250);
});

}*/

jQuery('input#newsletter').click(function() {
jQuery(this).val("");
});




var menu;
var submenu;
var contentid;


jQuery('div.copyright').click(function() {
jQuery.ajax({
  type: "POST",
  url: "views/rightmenu.php",
  data: { 
  category: 8,
  view: "Disclaimer"
  }
}).done(function( data ) {
jQuery('div#home').addClass('displaynone');
	jQuery('div#content').removeClass('displaynone');
	jQuery.ajax({
  type: "POST",
  url: "views/contentdata.php",
  data: { 
  }
}).done(function( data1 ) {
	
	clearMenu();
	jQuery('div#content').html(data1);
	sleep(500);

	jQuery('div#rightmenu').html(data);
	jQuery('div#rightmenu ul').addClass('insidemenu');
	jQuery('div#redbox').removeClass('displaynone');
	jQuery('li#Disclaimermenu64').trigger('click');
});

	

});

});

jQuery('div.copyrightinside').click(function() {
document.location='index.php?category=8&views=rightmenu&id=64&type=menu64&lang='+language;

});

jQuery('div.copyright').click(function() {
document.location='index.php?category=8&views=rightmenu&id=64&type=menu64&lang='+language;

});

/*jQuery('li#langen').addClass('active');

jQuery('li#langen').click(function() {
	clearLanguage();
	//jQuery(this).addClass('active');
	window.language = "EN";
	//refreshPage();
});

jQuery('li#langfr').click(function() {
	clearLanguage();
	window.language = "FR";
	jQuery(this).addClass('active');
	//refreshPage();
});

jQuery('li#langit').click(function() {
	clearLanguage();
	window.language = "IT";
	jQuery(this).addClass('active');
	//refreshPage();
});

jQuery('li#langar').click(function() {
	clearLanguage();
	window.language = "AR";
	jQuery(this).addClass('active');
	//refreshPage();
});
	*/
jQuery('div#logo').click(function() {
document.location='index.php?lang='+language;
});

jQuery('div#header').mouseover(function() {
		clearover();
		jQuery('div#mainsubmenu3').addClass('displaynone');
});

jQuery('div#people').mouseover(function() {
	clearover();
	jQuery('div#mainsubmenu3').addClass('displaynone');
});

jQuery('li.item-103').mouseover(function() {
    //alert('here');
	clearover();
	jQuery('div#mainsubmenu1').removeClass('displaynone');
});

jQuery('li.item-104').mouseover(function() {
	clearover();
	jQuery('div#mainsubmenu3').addClass('displaynone');
	jQuery('div#mainsubmenu2').removeClass('displaynone');
});

jQuery('li.item-105').mouseover(function() {
	//alert('test');
	clearover();
	jQuery('div#mainsubmenu3').removeClass('displaynone');
});

jQuery('li.item-106').mouseover(function() {
	clearover();
	jQuery('div#mainsubmenu3').addClass('displaynone');
	jQuery('div#mainsubmenu4').removeClass('displaynone');
});

jQuery('li.item-107').mouseover(function() {
	clearover();
	jQuery('div#mainsubmenu5').removeClass('displaynone');
});

jQuery('li.item-108').mouseover(function() {
	clearover();
	jQuery('div#mainsubmenu6').removeClass('displaynone');
});

jQuery('li.item-109').mouseover(function() {
	clearover();
});


jQuery('li.item-110').mouseover(function() {
	clearover();
});

jQuery('div#home').mouseover(function() {
	jQuery('div#mainsubmenu1').addClass('displaynone');
	jQuery('div#mainsubmenu2').addClass('displaynone');
	jQuery('div#mainsubmenu3').addClass('displaynone');
	jQuery('div#mainsubmenu4').addClass('displaynone');
	jQuery('div#mainsubmenu5').addClass('displaynone');
	jQuery('div#mainsubmenu6').addClass('displaynone');
	});
	
	jQuery('article').mouseover(function() {
	jQuery('div#mainsubmenu1').addClass('displaynone');
	jQuery('div#mainsubmenu2').addClass('displaynone');
	jQuery('div#mainsubmenu3').addClass('displaynone');
	jQuery('div#mainsubmenu4').addClass('displaynone');
	jQuery('div#mainsubmenu5').addClass('displaynone');
	jQuery('div#mainsubmenu6').addClass('displaynone');
	});

    	jQuery('div#rightmenu').mouseover(function() {
	jQuery('div#mainsubmenu1').addClass('displaynone');
	jQuery('div#mainsubmenu2').addClass('displaynone');
	jQuery('div#mainsubmenu3').addClass('displaynone');
	jQuery('div#mainsubmenu4').addClass('displaynone');
	jQuery('div#mainsubmenu5').addClass('displaynone');
	jQuery('div#mainsubmenu6').addClass('displaynone');
	});

    jQuery('div#rightnavigation').mouseover(function() {
	jQuery('div#mainsubmenu1').addClass('displaynone');
	jQuery('div#mainsubmenu2').addClass('displaynone');
	jQuery('div#mainsubmenu3').addClass('displaynone');
	jQuery('div#mainsubmenu4').addClass('displaynone');
	jQuery('div#mainsubmenu5').addClass('displaynone');
	jQuery('div#mainsubmenu6').addClass('displaynone');
	});
	
	
/*jQuery('li#menu1').click(function() {
	document.location='index.php?views=firm&category=1&id=1&lang='+language;
});

jQuery('li#menu2').click(function() {
	document.location='index.php?category=2&views=rightmenu&id=10&type=menu10&lang='+language;
	
});

jQuery('li#menu3').click(function() {
	document.location='index.php?views=people&category=3&lang='+language+'&location=beirut';
});



jQuery('li#menu4').click(function() {
	document.location='index.php?views=rightmenu&category=4&id=60&type=menu60&lang='+language;
});

jQuery('li#menu5').click(function() {
	document.location='index.php?views=rightmenu&category=5&id=38&type=menu38&lang='+language;
});



		


jQuery('li#menu6').mouseover(function() {
	jQuery('span.myriadproregular').addClass('active');
});

jQuery('li#menu6').mouseout(function() {
	jQuery('span.myriadproregular').removeClass('active');
});


jQuery('li#menu7').click(function() {
	document.location='index.php?views=rightmenu&category=7&id=41&type=menu41&lang='+language;
});	
*/
	


});

function validate(error,success,base) {
if(isValidEmailAddress(jQuery('input#newsletter').val())){
	jQuery.ajax({
  type: "POST",
  url: base + "/subscribers.php",
  data: { 
  action: "add",
  email: jQuery('input#newsletter').val()
  }
}).done(function( data ) {
jQuery('div#msg').html(success);	
});

}
else {
jQuery('div#msg').html(error);		
}
}

 function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
        return pattern.test(emailAddress);
    };


function showContent() {
	jQuery('div#home').addClass('displaynone');
	jQuery('div#content').removeClass('displaynone');
	jQuery.ajax({
  type: "POST",
  url: "views/contentdata.php",
  data: { 
  }
}).done(function( data ) {
	
	clearMenu();
	jQuery('div#content').html(data);
});
}


function showPeople(location,num,type,id) {
document.location='index.php?category=3&views=people&id='+id+'&type='+type+'&lang='+num+'&location='+location;
}



function clearMenu() {
	countupnum = 1;

	jQuery('li#menu1').removeClass('active');
	jQuery('li#menu2').removeClass('active');
	jQuery('li#menu3').removeClass('active');
	jQuery('li#menu4').removeClass('active');
	jQuery('li#menu5').removeClass('active');
	jQuery('li#menu6').removeClass('active');
	jQuery('li#menu6 span').removeClass('active');
	jQuery('span.myriadproregular').removeClass('active');
	jQuery('li#menu7').removeClass('active');
	jQuery('div#rightmenu').removeClass('margin11');
	jQuery('div#redbox').removeClass('margin0');
}

function clearSubMenu() {
	countupnum = 1;
	countdnnum = 1;
	jQuery('div#rightmenu li').removeClass('active');
	jQuery('div#rightmenu div').removeClass('active');	
}

function clearLanguage() {
	jQuery('div#header li').removeClass('active');
}


function refreshPage() {
	jQuery.ajax({
  type: "POST",
  url: "views/mainmenu.php",
  data: { 
  lang: window.language
  }
}).done(function( data ) {
	jQuery('div#menu').html(data);
	jQuery('li#'+window.menu).trigger('click');
	go(window.language,window.submenu,window.contentid);
});

}

function go(cat,view,num,type,id) {
document.location='index.php?category='+cat+'&views='+view+'&id='+id+'&type='+type+'&lang='+num;
}


function go2(location,num,type,id,page) {
	document.location='index.php?category=3&views=contentpeople&id='+id+'&type='+type+'&lang='+num+'&location='+location+'&page='+page;;



}

function people(location,num,type,id,page) {
	go2(location,num,type,id,page);
}

 function change_captcha()
 {
	document.getElementById('captcha').src="get_captcha.php?rnd=" + Math.random();
 }
 
 function validateEmail(elementValue){  
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}jQuery/;  
   return emailPattern.test(elementValue);  
 } 
 
 
function clearover() {
	jQuery('div#mainsubmenu1').addClass('displaynone');
	jQuery('div#mainsubmenu2').addClass('displaynone');
	//jQuery('div#mainsubmenu3').addClass('displaynone');
	jQuery('div#mainsubmenu4').addClass('displaynone');
	jQuery('div#mainsubmenu5').addClass('displaynone');
	jQuery('div#mainsubmenu6').addClass('displaynone');
}

function sub1() {
document.location='index.php?views=firm&category=1&id=1&lang='+language;

}

function sub2() {
	document.location='index.php?category=1&views=firm&id=4&type=csrmenu4&lang='+language;
}

function sub3() {
	document.location='index.php?category=1&views=firm&id=6&type=technologymenu6&lang='+language;
}

function sub4() {
	document.location='index.php?category=1&views=firm&id=7&type=certificationmenu7&lang='+language;
}

function showSub1(menu,id,cat) {
	document.location='index.php?category='+cat+'&views=rightmenu&id='+id+'&type=menu'+id+'&lang='+language;	
}


var countupnum = 1;
var countdnnum = 1;

function dn(num) {
	countupnum = 1;
if(countdnnum<num) {
	var sum = countdnnum+1;

	var str = "'div#section"+sum+"'";
	var str2 = "'div#section"+countdnnum+"'";
jQuery(eval(str)).fadeIn();
jQuery(eval(str2)).hide();
countnum++;
}

}

function up(num) {
countdnnum = 1;
if(countupnum<num) {
	var sum = countupnum+1;
	var str = "'div#section"+countupnum+"'";
	var str2 = "'div#section"+sum+"'";

jQuery(eval(str)).fadeIn();
jQuery(eval(str2)).hide();
countupnum++;
}

}



function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

function gonews(num,type,id,page) {
		document.location='index.php?category='+num+'&views=rightmenuscroll&id='+id+'&type=menu'+id+'&lang='+language+'&page='+page;
}