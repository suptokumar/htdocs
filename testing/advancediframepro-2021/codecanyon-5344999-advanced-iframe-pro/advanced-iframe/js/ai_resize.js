/**
 *  Advanced iframe pro external resize script.
 *  
 *  This file should only be included if you want to share your content to a different domain. 
 *  This feature does send the height as postMessage to the parent. 
 *  The script should to be included right before the iframe and the parameters
 *  advanced_iframe_id or advanced_iframe_debug should be set if needed. 
 *   
 *  Please see the demos on 
 *  http://www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/share-content-from-your-domain-content-filter
 *  http://www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/share-content-from-your-domain-add-ai_external-js-local
 */
 /* jslint devel: true */
if (typeof advanced_iframe_debug === 'undefined') {
    var advanced_iframe_debug = false;
}

if (typeof advanced_iframe_scoll_to_top_delay === 'undefined') {
    var advanced_iframe_scoll_to_top_delay = 0;
}  



/**
 * You can enable the safari fix also if you share your website to a different domain.
 * The safari-fix.html solution can be enabled below.
 * See http://www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/example-3rd-party-cookie-with-safari-fix-html
 * You can also enable this by using the method "enableSafariFix"
 */
// enableSafariFix('path to _safari_fix.html', 'message', true);  

/**
 * Enable the cookie fix for Safari
 *
 * @param safariFixUrl The path to the _safari_fix.html: <path to your wp installation>\wp-content\plugins\advanced-iframe\includes 
 * @param safariCookieFixType "message" shows a message if the workaround cannot be applied. "" does not show a message
 * @param allBrowsers true - does the check of all browsers, false - does the check only for Safari
 */
function enableSafariFix(safariFixUrl, safariCookieFixType, allBrowsers) {
    var safariFixUrlMessage = safariFixUrl + '/_safari_fix_message.html';
    var isSafari = true;   
    safariFixUrl += '/_safari_fix.html';   
     
    if (!allBrowsers) {  
      isSafari = navigator.userAgent.toLowerCase().indexOf("safari") > -1;
      var isChrome = navigator.userAgent.toLowerCase().indexOf("chrome") > -1;
      if ((isChrome) && (isSafari)) {isSafari = false;}     
    }
    if (isSafari) {
        if (!document.cookie.match(/^(.*;)?\s*aifixed\s*=\s*[^;]+(.*)?$/)) {
            document.cookie = "aifixed=fixed; expires=Tue, 19 Jan 2038 03:14:07 UTC; path=/;Secure; SameSite=Lax";
            window.location.replace(safariFixUrl);
        } else if (safariCookieFixType == "message") {
            // we call the message check url once
            if (!document.cookie.match(/^(.*;)?\s*aichecked\s*=\s*[^;]+(.*)?$/)) {
                document.cookie = "aichecked=checked; expires=Tue, 19 Jan 2038 03:14:07 UTC; path=/; Secure; SameSite=Lax";
                // create a iframe in external mode
                document.write('<iframe src="' + safariFixUrlMessage + '" width="0" height="0" border="0" style="visibility:hidden"></iframe>'); 
            }
        }           
    }
}

/**
 * Receives the postMessage events
 * 
 * @param event the received event.
 */
function aiReceiveMessage(event) {
   if (advanced_iframe_debug && console && console.log) {
       console.log('postMessage received: ' + event.data);
   } 
   
   try {
   var jsObject = JSON.parse(event.data);
   var type = jsObject.aitype; 
      // check if the data is of the expected
      if (type === 'height') {
        aiProcessHeight(jsObject);
      } else if (type === 'scrollToTop') {
        aiProcessScrollToTop(jsObject);
      }
   } catch(e) {
	  // we ignore errors here as they most likely do not belong to advanced iframe    
   }
}

function aiProcessScrollToTop(jsObject) {
     var id = jsObject.id;
     var aiOnloadScrollTop = 'top'; // iframe scrolls to the top of the iframe!
     if (advanced_iframe_scoll_to_top_delay == 0) {
         aiScrollToTop(id, aiOnloadScrollTop);
     } else {
         setTimeout(function(){ aiScrollToTop(id, aiOnloadScrollTop); }, advanced_iframe_scoll_to_top_delay);
     }
}

function aiProcessHeight(jsObject) {     
    var nHeight = jsObject.height;
    var advanced_iframe_id = jsObject.id;
    
    if (nHeight != null) {
      try { 
             var height = parseInt(nHeight,10) + 4;
             var iframe = document.getElementById('iframe-' + advanced_iframe_id);
             iframe.style.height = (height + 'px');
             // make the iframe visiable again.
             iframe.style.visibility = 'visible';
    	} catch(e) {
        if (console && console.log) {
          console.log(e);
        }
      }
    } 
}

function aiScrollToTop(id, position) {
  if (position === 'iframe') {
    var iframe = document.getElementById('iframe-' + advanced_iframe_id);
    window.scrollTo(0, iframe.offsetTop);
  } else {
    window.scrollTo(0,0);
  }
}

 /* jshint ignore:start */
if (window.addEventListener) {
    window.addEventListener('message', aiReceiveMessage)
} else if (el.attachEvent)  {
    // needed for IE9 and below compatibility
    el.attachEvent('message', aiReceiveMessage);
}
 /* jshint ignore:end */