<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../images/favicon.png" type="image/gif" sizes="16x16" />
        <link rel="stylesheet" href="../css/styles.css">
        <script src="../scripts/darkmode.js"></script>
        <script src="../scripts/faq.js"></script>
        <title>NuLeaf Eco-Construction</title>
    </head>
    <body id="body">
        <header id="header">
            <button id="drkmd">Dark Mode</button>
            <a href="../index.html">
                <img style="width:11%;height:11%;" src="../images/tinyhousecolor (2).png" alt="Leaf Logo">
            </a>
            <h1 class="brand">NuLeaf Administrator Panel</h1>
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
        <main id="faq">
            <h2>Login to view admin panel</h2>
            <form action="admin.php" method="post">
                <br>
                <input type='hidden' name='action' value='login'>
                <input type='hidden' name='visitor_id'>
                <label for="username">Username: </label>
                <input type="text" name="username">

                <br>
                <label for="email">Password: </label>
                <input type="text" name="password">

                <br>

                <input type="submit" value="Login">
            </form>
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
