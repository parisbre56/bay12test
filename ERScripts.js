"use strict";

//For onload functions, essentially adds them at the end of a queue
function addLoadEvent(func) {
var oldonload = window.onload;
	if (typeof window.onload != 'function') {
  		window.onload = func;
	} else {
   	window.onload = function() {
      		if (oldonload) {
        		oldonload();
      		}
      		func();
    	}
	}
}

//Check if the element contains class cls
function hasClass(element, cls) {
return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

//Replaces the class changeFrom with class changeTo in the given element
function replaceClass(element,changeFrom,changeTo) {
	element.className= 
		(' '+element.className+' ').replace(' '+changeFrom+' ',' '+changeTo+' ');
}

//Removes class cls from the element
function removeClass(element,cls) {
	element.className=
		(' '+element.className+' ').replace(' '+cls+' ',' ');
}

//Adds class cls to the element
function addClass(element,cls) {
	if(!hasClass(element,cls)) {
  	element.className=element.className+' '+cls+' ';
	}
}

//Simple function to compute the sign
function sign(x) {
  return typeof x === 'number' ? x ? x < 0 ? -1 : 1 : x === x ? 0 : NaN : NaN;
}

//Returns the triangular number sequence (...,-3,-1,0,1,3,6,10,...)
function triSeq(I) {
  return sign(I)*(Math.abs(I)+1)*Math.abs(I)/2;
}

//Returns the points needed for the skill level given
function getPDelta(I) {
  return sign(I)*(Math.abs(I)+1)*Math.abs(I)*2.5; // 5/2=2.5
}

//Returns the total skill level based on points allocated and initial skill level
function computeSkillLevel(P,I) { //P is points in skill, I is initial level of skill
  var PDelta = getPDelta(I);
  if(P+PDelta < 0) {
    return -Math.ceil(-0.5 + Math.sqrt(5 + 8*Math.abs(PDelta+P))/4.472135955); //2*sqrt(5)
  } else {
    return Math.floor((-0.5 + Math.sqrt(5 + 8*Math.abs(PDelta+P))/4.472135955)+ 0.00001);
  }
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}
  
function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
} 
  
var currStyle; 
  
function toggleStyle() {
	//Find the style we need to change to (styles stored in global variable)
	var changeTo;
	switch(currStyle){
		case 'whiteStyle':
			changeTo='darklingStyle';
		break;
		case 'darklingStyle':
			changeTo='blackStyle';
		break;
		case 'blackStyle':
			changeTo='whiteStyle';
		break;
	}

	//Switch style
	changeStyle(currStyle,changeTo);
	
	//Store in cookie and in global variable
	setCookie('currStyle',changeTo,365);
	currStyle=changeTo;
}
  
function changeStyle(changeFrom,changeTo) {
	var toChange = document.getElementsByClassName(changeFrom);
	for(var elemTCIndex = 0 ; elemTCIndex < toChange.length ; elemTCIndex++) {
		replaceClass(toChange[elemTCIndex],changeFrom,changeTo);
	}
}

function onloadStyleFunction() {
	//Get the saved style from the cookie
	currStyle = getCookie('currStyle');
	//If there is no saved style, revert to the default
	if(currStyle=="") {
		setCookie('currStyle','whiteStyle',365)
		currStyle = 'whiteStyle';
	}
	//If the current style is not the default one, 
	//change from the default style to the current style when the page is loaded
	if(currStyle != 'whiteStyle') {
		changeStyle('whiteStyle',currStyle);
	}
}

//Appends text to elem and then adds a <br>
function writeTextAndBr(elem, text) {
	elem.appendChild(document.createTextNode(text));
      	elem.appendChild(document.createElement("br"));
}
