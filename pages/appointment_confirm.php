<?php
 require_once ('../model/database.php');
 require_once ('../model/visitor.php');
 require_once ('../model/employee.php');
 require_once('../model/appointment.php');
 require_once ('../model/visitorDB.php');
 require_once ('../model/employeeDB.php');
 require_once('../model/appointmentDB.php');

 $firstName = filter_input(INPUT_POST, 'first_name');
 $lastName = filter_input(INPUT_POST, 'last_name');
 $address = filter_input(INPUT_POST, 'address');
 $city = filter_input(INPUT_POST, 'city');
 $state = filter_input(INPUT_POST, 'state');
 $zip = filter_input(INPUT_POST, 'zip');
 $date = filter_input(INPUT_POST, 'date');
 $time = filter_input(INPUT_POST, 'time');

echo "Name: $firstName $lastName<br>";
echo "address: $address $city, $state $zip";
echo "appointment: $date at $time";
// $contact_email = filter_input(INPUT_POST, 'contact_email');
// $contact_phone = filter_input(INPUT_POST, 'contact_phone');

// if(isset($contact_email)) {
//     if(isset($contact_phone)) {
//         $contact = 'bth';
//     } else {
//         $contact = 'eml';
//     }
// } else if(isset($contact_phone)) {
//     $contact = 'phn';
// }


 if($firstName == NULL || $lastName == NULL || $address == NULL || $city == NULL || 
         $state == NULL || $zip == NULL || $date == NULL || $time == NULL) {
     
     $error = "Invalid data. Check all fields and try again.";
     echo "Form Data Error: " . $error;
     header('Location: appointment.html');
     exit();
 } else {
     $appointment = new Appointment();
     
     $datetime = $date . " " . $time;
     $appointment->setFirstName($firstName);
     $appointment->setLastName($lastName);
     $appointment->setAddress($address);
     $appointment->setCity($city);
     $appointment->setState($state);
     $appointment->setZip($zip);
     $appointment->setDateTime($datetime);
     $appointmentDB = new appointmentDB();
     $appointmentDB->addAppointment($appointment);  
 }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.png" type="image/gif" sizes="16x16" />
        <link rel="stylesheet" href="../css/styles.css">
        <script src="../scripts/darkmode.js"></script> 
        <script src="../scripts/services.js"></script>
    <title>NuLeaf Eco Building</title>
</head>
<body id="body">
    <header id="header">
        <button id="drkmd">Dark Mode</button>
        <a href="index.html">
            <img style="width:11%;height:11%;" src="../images/tinyhousecolor (2).png" alt="Leaf Logo">
        </a>
        <h1 class="brand">NuLeaf Eco-Construction</h1>
    </header>
    <nav>
        <a href="../index.html"><h3>Home</h3></a>
        <a class="nav" href="../pages/contact.html"><h3>Contact</h3></a> 
        <a class="nav" href="../pages/services.html"><h3>What we do</h3></a> 
        <a class="nav" href="../pages/appointment.html"><h3>Set a Meet</h3></a>
        <a class="nav" href="../pages/FAQ.html"><h3>FAQ</h3></a>
        <a class="nav" href="../pages/profile.html"><h3>Profile</h3></a>
        <a class="nav" href="../pages/login.php"><h3>Admins</h3></a>

    </nav>
    <main>
        <h1>Thank you for scheduling the appointment</h1>
        
    </main>
    <footer id="footer">
        <div class="thirds">
            <h4>Nu-Leaf 2020 &copy</h4>
            <p>Nu-Leaf Eco-Construction LLC <br>58432 W Main st. <br>Suite 210 <br>Boise, ID 83713</p>
        </div>
        <div class="thirds">
            <h4>Contact</h4>
            <p>Email: <a href="mailto:publicmail@nuleaftinyhouse.com">publicmail@nuleaftinyhouse.com</a></p>
            <p>Phone: <a href="tel:(555)555-555">(555)555-555</a></p>
        </div>
        <div class="thirds">
            <h4>Follow us on social media!</h4>
            <a href="https://www.reddit.com/r/TinyHouses/" target="_blank">
                <img class="socmed" src="../images/reddit.png" alt="Reddit">
            </a>
            <a href="https://twitter.com/TinyHouseX" target="_blank">
                <img class="socmed" src="../images/twitter.png" alt="Twitter">
            </a>
            <a href="https://www.instagram.com/tinyhouse/" target="_blank">
                <img class="socmed" src="../images/instagram.png" alt="Instagram">
            </a>
        </div>
    </footer>
</body>
</html>