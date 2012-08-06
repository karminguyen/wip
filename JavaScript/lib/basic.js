// Stolen, with pride, for misc sources. John Resig's Ninja book for instance.

// A simple logging statement that works in all browsers.

function log() {
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

