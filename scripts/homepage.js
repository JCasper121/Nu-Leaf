/* 
Original Author:                           John (Jac) Casper
Date Created                               9/11/2020
Version:                                   0.0.1
Date Last Modified:                        9/13/2020
Modified by:                               John Casper
Modification log
        homepage                                    9/13/20

        


*/


window.onload = function() {

    // ********** SLIDESHOW CODE ***********
    var slides = [
        
            {href: "../images/tiny-house.png", title: "Mobile Tiny Homes"},
            {href: "../images/straw-bale-house.jpg", title: "Strawbale Eco-Homes"},
            {href: "../images/rammed-earth-house.jpg", title: "Rammed Earth Walls"}
        ]
        slideshow.loadImages(slides).startSlideshow($("image"), $("caption"));
        evt.attach($("image"), "mouseover", slideshow.togglePlay);
        evt.attach($("image"), "mouseout", slideshow.togglePlay);
        
    
    $("drkmd").onclick = darkMode;
    checkDarkMode();
    navSpacer();

}