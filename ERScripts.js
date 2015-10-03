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
