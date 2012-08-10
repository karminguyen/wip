//
// Stolen, with pride, for misc sources. John Resig's Ninja book for instance.
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

})();

