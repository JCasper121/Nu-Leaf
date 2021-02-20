/* 
Original Author:                           John (Jac) Casper
Date Created                               9/11/2020
Version:                                   0.0.1
Date Last Modified:                        9/11/2020
Modified by:                               John Casper
Modification log
        processEntries             9/12/20
        clearEntries               9/12/20
        


*/
var canadianProvinces = {"ON" : "Ontario", "QC": "Quebec", "NS": "Nova Scotia"};

var processEntries = function() {
    var first_name = $("first_name").value;
    var last_name = $("last_name").value;
//   var country = $("country").value;
    var address = $("address").value;
    var city = $("city").value;
    var state = $("state").value;
    var zip = $("zip").value;
    var date = $("date").value;
    var time = $("time").value;
    var isValid = true;

    var year = date.substr(0,4);
    var month = date.substr(5, 2);
    var day = date.substr(8,2);
    var hour = time.substr(0,2);
    var minutes = time.substr(3,2);

    //Check for empty fields
    if(first_name === "") {
        $("first_name_error").firstChild.nodeValue = "First name is required";
        isValid = false;
    } if(last_name === "") {
        $("last_name_error").firstChild.nodeValue = "Last name is required";
        isValid = false;
    } 
//    if(country === "") {
//       $("country_error").firstChild.nodeValue = "Country is required";
//       isValid = false;
//   } 
   if(address === "") {
        $("address_error").firstChild.nodeValue = "Address is required";
        isValid = false;
    } if(city === "") {
        $("city_error").firstChild.nodeValue = "City is required";
        isValid = false;
    } if(state === "none") {
        $("state_error").firstChild.nodeValue = "State is required";
        isValid = false;
    } if(zip === "") {
        $("zip_error").firstChild.nodeValue = "Zip code is required";
        isValid = false;
    } if(date === "") {
        $("date_error").firstChild.nodeValue = "Date is required";
        isValid = false;
    } if(time === "") {
        $("time_error").firstChild.nodeValue = "Time is required";
        isValid = false;
    }

    // Check that 48 hours notice is given
    var date_Obj = new Date(parseInt(year), parseInt(month), parseInt(day), parseInt(hour), parseInt(minutes), 0, 0);
    var twoDaysNotice = new Date();
    twoDaysNotice.setDate(date_Obj.getDate() - 2);
    var today = Date.now();

    if(today > twoDaysNotice) {
        $("success").firstChild.nodeValue = "Appointment must be made 48hr in advance.";
        isValid = false;
    }

    // IF valid, schedule appointment
    if(isValid) {
        var addressString = "All done! An experienced contractor will be at \n"
         + address + "\n" + city + ", " + state + " " + zip + "\nOn ";
        var dateTimeString = parseDate(date, time);
        var successMessage = addressString + dateTimeString + " to assist you.";
        $("success").firstChild.nodeValue = successMessage;
        $("appointment_form").submit();
    }

    return;

}

var parseDate = function(date, time) {
    var year;
    var day;
    var month;
    var hour;
    var minutes;
    var weekday;
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var weekdays = ["Friday", "Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday"];
    var am_pm = "AM";
    
    // Parsing date and time strings
    year = date.substr(0,4);
    month = date.substr(5, 2);
    day = date.substr(8,2);
    hour = time.substr(0,2);
    minutes = time.substr(3,2);
    

    var dateObj = new Date(parseInt(year), parseInt(month), parseInt(day), parseInt(hour), parseInt(minutes), 0, 0);
    // Convert month and weekday to english names
    weekday = weekdays[dateObj.getDay()];
    month = months[dateObj.getMonth() - 1];

    // Add suffix -st -nd -rd -th to day
    var firstDigit = parseInt(day.substr(0,1));
    var secondDigit = parseInt(day.substr(1,1));
    if(secondDigit > 3 || firstDigit == 1 || secondDigit == 0) {
        day += "th"
    } else {
        if(secondDigit == 1) {
            day += "st";
        } if(secondDigit == 2) {
            day += "nd";
        } if(secondDigit == 3) {
            day += "rd";
        }
    }

    // Convert time to 12 hour system
    hour = parseInt(hour);
    if(hour > 12) {
        hour = hour - 12;
        am_pm = "PM"
    }

    // Create Confirmation Message
    var DTString = weekday + " the " + day + " of " + month + ", "
     + year + "\nAt " + hour+":"+minutes+" "+am_pm;

    return DTString;
}

var Reset = function() {
    $("first_name").value = "";
    $("last_name").value = "";
//   $("country").value = "";
    $("address").value = "";
    $("city").value = "";
    $("state").value = "none";
    $("zip").value = "";
    $("date").value = "";
    $("time").value = "";
    $("first_name_error").firstChild.nodeValue = "*";
    $("last_name_error").firstChild.nodeValue = "*";
//   $("country_error").firstChild.nodeValue = "*";
    $("address_error").firstChild.nodeValue = "*";
    $("city_error").firstChild.nodeValue = "*";
    $("state_error").firstChild.nodeValue = "*";
    $("zip_error").firstChild.nodeValue = "*";
    $("date_error").firstChild.nodeValue = "*";
    $("time_error").firstChild.nodeValue = "*";
    $("success").firstChild.nodeValue = "";
}


window.onload = function() {
    $("btnSubmit").onclick = processEntries;
    $("reset").onclick = Reset;
    $("drkmd").onclick = darkMode;
    checkDarkMode();
    navSpacer();
}