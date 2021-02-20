/* 
Original Author:                           John (Jac) Casper
Date Created                               9/11/2020
Version:                                   0.0.1
Date Last Modified:                        9/11/2020
Modified by:                               John Casper
Modification log
        darkmode                                    9/04/20
        Persistant darkmode with session storage    9/04/20
        


*/
"use strict";

var $ = function(id) {
    return document.getElementById(id);
}

// *****************************************************
// ********** DARK MODE CODE START ******************
// *****************************************************
var header = $("header");
var footer = $("footer");


var darkMode = function() {
    var header = $("header");
    var footer = $("footer");
    console.log("Before darMode: " + localStorage.getItem("darkmode"));
    var body = $("body");
    if(body.hasAttribute("class")) {
        body.removeAttribute("class");
        header.removeAttribute("class");
        footer.removeAttribute("class");
        localStorage.setItem("darkmode", false);
    } else {
        body.classList.add("darkmode");
        header.classList.add("darkmode");
        footer.classList.add("darkmode");
        localStorage.setItem("darkmode", true);
    }
    console.log("After darkMode: " + localStorage.getItem("darkmode"));
}

var checkDarkMode = function() {
    var header = $("header");
    var footer = $("footer");
    var darkmodeBool = localStorage.getItem("darkmode");

    if(darkmodeBool && darkmodeBool != "false") {
        if(!body.hasAttribute("class")) {
            body.classList.add("darkmode");
            header.classList.add("darkmode");
            footer.classList.add("darkmode");
            localStorage.setItem("darkmode", true);
        }
    } else {
        localStorage.setItem("darkmode", false);
    }
    return;
}
// ************************************************
// *************** DARKMODE CODE END **************
// ************************************************


// Adds Spacer between nav links
var navSpacer = function() {
    var aTags = document.getElementsByClassName("nav");

    for(var i = 0; i < aTags.length; i++) {
        aTags[i].insertAdjacentHTML("beforebegin", "<h2 class='nav-spacer' style='color:black'>|</h2>");
    }
}
