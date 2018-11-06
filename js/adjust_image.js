	adjustImg = function() {
		
		var cw = 1400, ch = 1050; // original width / height of images
		var winW = 630, winH = 460;
		try {
			if (document.body && document.body.offsetWidth) {
				winW = document.body.offsetWidth;
				winH = document.body.offsetHeight;
			}
			
			if (document.compatMode=='CSS1Compat' &&
				document.documentElement &&
				document.documentElement.offsetWidth ) {
					winW = document.documentElement.offsetWidth;
					winH = document.documentElement.offsetHeight;
			}
			
			if (window.innerWidth && window.innerHeight) {
				winW = window.innerWidth;
				winH = window.innerHeight;
			}			
			
			var a1 = document.getElementById( 'a1' );
				
			//console.debug("X = " + winW + " - " + winH);
			
			if( winW >= cw )
			{
				//alert("width is greater than picture width");
				var lx = (winW / 2) - (cw / 2);
				a1.style.left = lx + "px";
				
				a1.style.width = cw +"px"; 
			}
			else
			{
				//alert("width is lesser than picture width");
				a1.style.left = "0px";
				a1.style.width = winW +"px";
			}
			
			setTimeout( function() {
				var h = parseInt( a1.height ); // HEIGHT IS ALWAYS READ NEVER SET
				
				if(h > winH)
				{
					a1.style.top = "0px";
				}
				else
				{
					var tx = (winH / 2) - (h / 2);
					a1.style.top = tx + "px";
				}				
			}, 100 );
		} catch(e) { alert(e.message); }
	}
