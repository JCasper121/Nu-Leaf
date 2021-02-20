
/* 
Original Author:                           John (Jac) Casper
Date Created                               9/11/2020
Version:                                   0.0.1
Date Last Modified:                        9/11/2020
Modified by:                               John Casper
Modification log
        validation             9/04/20
        reset                   9/04/20
        added newsletter logic   9/17/20
        added regex             9/19/20
        
*/
// ****************************************
// NEWSLETTER CODE ************************
// ****************************************
var newsletterReset = function() {
  $("newsletter_name").value = "";
  $("newsletter_email").value = "";
  $("newsletter_name_error").firstChild.nodeValue = "*";
  $("newsletter_email_error").firstChild.nodeValue = "*";
  return;
}

var newsletterValidation = function() {
  var name = $("newsletter_name").value;
  var email = $("newsletter_email").value;
  var isValid = true;
  var regexResult;

  if(name === "") {
      $("newsletter_name_error").firstChild.nodeValue = "Name is required";
      isValid = false;
      event.preventDefault();
  }
  regexResult = regexEmail(email);
  if(regexResult === "") {
    $("newsletter_email_error").firstChild.nodeValue = "Invalid email";
    isValid = false;
    event.preventDefault();
  }
  if(isValid) {   //All Fields are valid
      $("newsletter_validationSuccess").firstChild.nodeValue = "Success! You have subscribed to Nu Leaf's newsletter!";
      reset();
  }
  return;
}
// ****************************************
// NEWSLETTER CODE END************************
// ****************************************



// ****************************************
// CONTACT CODE ************************
// ****************************************

var contactReset = function () {
    $("name").value = "";
    $("email").value = "";
    $("phone").value = "";
    $("radio_thow").value = false;
    $("radio_strawbale").value = false;
    $("radio_other").value = false;
    $("message").value = " ";
    $("message").placeholder = "Write a short message describing your eco-construction plans";
    $("contactEmail").checked = false;
    $("contactPhone").checked = false;
    $("name_error").firstChild.nodeValue = "*";
    $("email_error").firstChild.nodeValue = "*";
    $("phone_error").firstChild.nodeValue = "";
    $("type_error").firstChild.nodeValue = "*";
    $("contact_error").firstChild.nodeValue = "*";
    $("message_error").firstChild.nodeValue = "*";
  };

  
var contactValidation = function () {
    console.log("Button submission");
    var name = $("name").value;
    var email = $("email").value;
    var phone = $("phone").value;
    var message = $("message").value;
    var thow = $("radio_thow").checked;
    var strawbale = $("radio_strawbale").checked;
    var other = $("radio_other").checked;
    var contactEmail = $("contactEmail").checked;
    var contactPhone = $("contactPhone").checked;
    var isValid = true;

  
    // Name validation
    if (name === "") {
      $("name_error").firstChild.nodeValue = "Name is required";
      isValid = false;
    }
    
    // Email validation
    if(!regexEmail(email)) { //In regex_library.js
      $("email_error").firstChild.nodeValue = "Invalid email";
      isValid = false;
    }

    if(!regexPhone(phone)) {
      $("phone_error").firstChild.nodeValue = "Invalid phone";
      isValid = false;
    }

    if (message === " ") {
      $("message_error").firstChild.nodeValue = "Please include some details.";
    }
    if (!thow && !strawbale && !other) {
      $("type_error").firstChild.nodeValue = "Pick one";
      isValid = false;
    }
    if (!contactEmail && !contactPhone) {
      $("contact_error").firstChild.nodeValue = "Pick a contact method";
      isValid = false;
    }
    if((contactPhone && !contactEmail) && phone==="") {
      $("phone_error").firstChild.nodeValue = "Phone number needed if you want to be contacted via text.";
      isValid = false;
    }      

    if (isValid) {
        $("validationSuccess").firstChild.nodeValue = "We recieved your submission! We will contact you ASAP";
//      contactReset();
        $("contact_form").submit();
    }
};

  // ****************************************
// CONTACT CODE ENDS ************************
// ******************************************


  
window.onload = function () {

    $("contactSubmit").onclick = contactValidation;
    
    $("contactReset").onclick = contactReset;
    $("drkmd").onclick = darkMode;

    $("newsletter_submit").onclick = newsletterValidation;
    $("newsletter_reset").onclick = newsletterReset;
    checkDarkMode();
    navSpacer();
  };