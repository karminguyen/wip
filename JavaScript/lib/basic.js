//
// Stolen, with pride, from misc sources. John Resig's Ninja book for instance.
//

(function(){

	//--------- Unit test functions ---------

	var results;
	
	this.assert = function assert( value, desc ) {
		var li = document.createElement("li");
		li.className = value ? "pass" : "fail";
		li.appendChild( document.createTextNode( desc ) );
		results.appendChild( li );
		if ( !value ) {
			li.parentNode.parentNode.className = "fail";
		}
		return li;
	};
	
	this.test = function test(name, fn) {
		results = document.getElementById("results");
		results = assert( true, name ).appendChild(
			document.createElement("ul") );
		fn();
	};
	

	//--------- Logging ---------
	
	// A simple logging statement that works in all browsers.
	this.log = function log() {
	  try {
	    console.log.apply( console, arguments );
	  } catch(e) {
	    try {
	      opera.postError.apply( opera, arguments );
	    } catch(e){
	      alert( Array.prototype.join.call( arguments, " " ) );
	    }
	  }
	}


	//--------- Templating ---------

	// Simple JavaScript Templating
	var cache = {};
	
		// load the template - and be sure to cache the result. 
		var fn = !/\W/.test(str) ?
		
		// generator (and which will be cached).
			"obj","var p=[],print=function(){p.push.apply(p,arguments);};" + 
			
			// Introduce the data as local variables using with(){}
			// Convert the template into pure JavaScript
			str
				.replace(/[\r\t\n]/g, " ")
				.split("<%").join("\t")
				.replace(/((^|%>)[^\t]*)'/g, "$1\r")
				.replace(/\t=(.*?)%>/g, "',$1,'")
				.split("\t").join("');")
				.split("%>").join("p.push('")
				.split("\r").join("\\'")
				+ "');}"
				+ "return p.join('');"
			);
		
	}

})();
