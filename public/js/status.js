  
// getPageScroll() by quirksmode.com
function getPageScroll() {
  var xScroll, yScroll;
  if (self.pageYOffset) {
    yScroll = self.pageYOffset;
    xScroll = self.pageXOffset;
  } else if (document.documentElement && document.documentElement.scrollTop) {	 // Explorer 6 Strict
    yScroll = document.documentElement.scrollTop;
    xScroll = document.documentElement.scrollLeft;
  } else if (document.body) {// all other Explorers
    yScroll = document.body.scrollTop;
    xScroll = document.body.scrollLeft;
  }
  return new Array(xScroll,yScroll)
}

// Adapted from getPageSize() by quirksmode.com
function getPageHeight() {
  var windowHeight
  if (self.innerHeight) {	// all except Explorer
    windowHeight = self.innerHeight;
  } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
    windowHeight = document.documentElement.clientHeight;
  } else if (document.body) { // other Explorers
    windowHeight = document.body.clientHeight;
  }
  return windowHeight
}