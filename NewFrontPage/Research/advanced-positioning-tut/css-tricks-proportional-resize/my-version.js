//my version of js-width tutorial

console.log('my version');

//css transform: scale();

function adjust() {
		//get height and width of inner element
		var el = document.querySelector('.very-specific-design');
		var elHeight = el.offsetHeight;
		var elWidth = el.offsetWidth;
	
		//get outter wrapper object
		var wrapper = document.querySelector('.scaleable-wrapper');
		var wrapperHeight = wrapper.offsetHeight;
		var wrapperWidth = wrapper.offsetWidth;
		
		//Math.min returns the lowest number out of a group of numbers passed to it. In this case which ever is lower between the height or the width.
		var scale = Math.min( 
			wrapperWidth / elWidth, 
			wrapperHeight / elHeight 
		);
			
		//adjust css transform of element
		el.style.transform = "translate(-50%,-50%)" + "scale(" + scale + ")";
}

window.addEventListener('resize', adjust);

// console.log(elHeight, elWidth);

	//provided from css-tricks to calculate width and height of the element.
	// var scale = Math.min( 
	// 	availableWidth / contentWidth, 
	// 	availableHeight / contentHeight 
	// );

