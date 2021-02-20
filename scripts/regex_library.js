"use strict";
/* 
Original Author:                           John (Jac) Casper
Date Created                               9/19/2020
Version:                                   0.0.1
Date Last Modified:                        9/24/2020
Modified by:                               John Casper
Modification log
        regexEmail             9/19/20
        regexPhone             9/24/20
        


*/
var regexEmail = function(email) {
    if (email.length === 0) return false;
    var parts = email.split("@");
    if (parts.length !== 2 ) return false;
    if (parts[0].length > 64) return false;
    if (parts[1].length > 255) return false;
    var address =
        "(^[\\w!#$%&'*+/=?^`{|}~-]+(\\.[\\w!#$%&'*+/=?^`{|}~-]+)*$)";
    var quotedText = "(^\"(([^\\\\\"])|(\\\\[\\\\\"]))+\"$)";
    var localPart = new RegExp( address + "|" + quotedText );
    if ( !parts[0].match(localPart) ) return false;
    var hostnames =
        "(([a-zA-Z0-9]\\.)|([a-zA-Z0-9][-a-zA-Z0-9]{0,62}[a-zA-Z0-9]\\.))+";
    var tld = "[a-zA-Z0-9]{2,6}";
    var domainPart = new RegExp("^" + hostnames + tld + "$");
    if ( !parts[1].match(domainPart) ) return false;
    return true;
}

var regexPhone = function(number) {
    var phone = /^((\(\d{3}\))|(\d{3}))([\s-./]?)(\d{3})([\s-./]?)(\d{4})$/;
    if(phone.test(number)) {
        return true;
    }else {
        return false;
    }
}