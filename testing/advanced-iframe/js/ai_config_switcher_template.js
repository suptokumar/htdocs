/**
 *
 * This template is an example if you want to load different configurations
 * depending on an url parameter. This is needed if you have different 
 * setup of the same page.
 * 
 * Also this can be used to set different callback domains if needed.
 * This is important if you include the same page to completely 
 * different installations. Make sure you use the same id for all 
 * setups.          
 *
 * Restrictions! Since Chrome 84 the cookie 'ai_conf' to remember the conf=X parameter also 
 * for following pages needs https and SameSite=None. Both are set below. This means that this 
 * solution does only work with https!
 *  
 * Usage: 
 * 1. Implement the switch of the parameters below 
 *   - conf is used as parameter in the example
 *   - Set the settings for all iframe
 *   - Set the settings depending on the conf parameter   
 * 2. Include this file before the ai_external.js OR include it in the administration directly.
 * 3. Append ?conf=1 to the url of the first iframe
 * 4. Append ?conf=2 to the url if the 2nd iframe
 *   
 */  
/*jshint unused:false*/

/**
 * Helper function to extract the custom id from the url
 * So if you add ?conf=1  aiGetUrlParameter("conf") does
 * return 1   
 */ 
function aiGetUrlParameter( name )
{
  name = name.replace(/[\[]/,'\\\[').replace(/[\]]/,'\\\]');
  var regexS = '[\\?&]'+name+'=([^&#]*)';
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  
  if( results == null ) {
    return '';
  } else {
    var allowedChars = new RegExp('^[a-zA-Z0-9_\-]+$');
    if (!allowedChars.test(results[1])) {
        return '';
    } 
    return results[1];
    }
}

/**
 * Set a session cookie
 */
function setCookie(name,value) {
    document.cookie = name + "=" + (value || "") + "; path=/; Secure; SameSite=None";
}

/**
 *  Read a cookie with a given name.
 */
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return '';
}

// Read the config parameter
var configId = aiGetUrlParameter('conf');

// If a config is found you can store this in a cookie so that is is also valid 
// for all other pages of this session. Disable the code below to remove this feature
if (configId !== '') {
   setCookie('ai_conf', configId);
} else {
   configId = getCookie('ai_conf');  
}

// if you like to do the confg based on the domain use:
// configId = window.location.hostname
// case 'xxx.domain.com'
// case 'yyy.domain2.com' ...

// you can also do some exclused in the config if you e.g. are in edit mode in the elementor
// if window.location.href.includes('action=edit') ....

// Settings for all iframes
var updateIframeHeight = 'true';

// Settings depending on an url parameter
switch (configId) {
  case '1':
    // var domain_advanced_iframe is NOT needed if you use postMessage for communication  
    var domain_advanced_iframe = 'http://domain1/wordpress/wp-content/plugins/advanced-iframe';
    var iframe_hide_elements = '#iframe-header,#iframe-footer,#some-images';
    break;
  case '2':
    // var domain_advanced_iframe is NOT needed if you use postMessage for communication  
    var domain_advanced_iframe = 'http://domain2/wp-content/plugins/advanced-iframe';
    var iframe_hide_elements = '#iframe-header,#iframe-footer';
    break;
  default:
    // by default nothing is done because no config was found
}