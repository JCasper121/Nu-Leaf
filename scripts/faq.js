/* 
Original Author:                           John (Jac) Casper
Date Created                               9/11/2020
Version:                                   0.0.1
Date Last Modified:                        9/11/2020
Modified by:                               John Casper
Modification log
        toggle function                    9/04/20

*/

var toggle = function() {
    var a = this;
    var h2 = a.parentNode;
    var div = h2.nextElementSibling;

    if (div.hasAttribute("class")) { 
        div.removeAttribute("class");
    } else { 
        div.classList.add("open");
    } 
}



window.onload = function() {
    var faqs = $("faqs");
    var anchorElements = faq.getElementsByTagName("a");
    $("drkmd").onclick = darkMode;
    for (var i = 0; i < anchorElements.length; i++ ) {
    	anchorElements[i].onclick = toggle;
    }
    checkDarkMode();
    navSpacer();
}