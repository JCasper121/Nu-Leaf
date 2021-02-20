<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ('../model/database.php');
require_once ('../model/visitor.php');
require_once ('../model/employee.php');
require_once ('../model/visitorDB.php');
require_once ('../model/employeeDB.php');
require_once('../util/secure_conn.php');
require_once('../util/valid_admin.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = 'list_visitors';
}


$employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
if ($employee_id == NULL || $employee_id == FALSE) {
    $employee_id = 1;
}


try {
    $employeeDB = new EmployeeDB();
    $visitorDB = new VisitorDB();
    
    $employees = $employeeDB->getEmployees();
    $visitors = $visitorDB->getVisitorsByEmp($employee_id);

} catch (Exception $ex) {
    echo "Error: " . $ex->getMessage();
}


if ($action == 'delete_visitor') {
    $visitor_id = filter_input(INPUT_POST, 'visitor_id', FILTER_VALIDATE_INT);

    try {
        $visitorDB->deleteVisitor($visitor_id);
        header("Location: admin.php?employee_id=$employee_id");
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
} //else if ($action == 'update_visitor') {
//    $visitor_id = filter_input(INPUT_POST, 'visitor_id', FILTER_VALIDATE_INT);
//    
//    $query = 'SELECT FROM visitor WHERE visitorID = :visitorID;';
//    
//    $statement = $db->prepare($query);
//    $statement->bindValue(':visitorID', $visitor_id);
//    $statement->execute();
//    $statement->closeCursor();
//    $selected_visitor = $statement;       
//}
?>



<!DOCTYPE html>
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
        <button id="drkmd"">Dark Mode</button>
        <a href="../index.html">
            <img style="width:11%;height:11%;" src="../images/tinyhousecolor (2).png" alt="Leaf Logo">
        </a>
        <h1 class="brand">NuLeaf FAQ</h1>
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
            <div class="thirds">
                <h3>Select an employee to view messages</h3>
                <ul style="list-style-type: none;">
                    <?php foreach ($employees as $employee) : ?>
                        <li>
                            <a href="?employee_id=<?php echo $employee->getID() ?>">    
                                <?php echo $employee->getFirstName() . ' ' . $employee->getLastName(); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="thirds">
                <table id="visitor_table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Message</th>
                    </tr>

                    <?php foreach ($visitors as $visitor) : ?>
                        <tr>
                            <td><?php echo $visitor->getName(); ?></td>
                            <td><?php echo $visitor->getEmail(); ?></td>
                            <td><?php echo $visitor->getVisitDate(); ?></td>
                            <td><?php echo $visitor->getMessage(); ?></td>
                            <td>
                                <form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_visitor">
                                    <input type="hidden" name='visitor_id' value="<?php echo $visitor->getID(); ?>">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="thirds">
                
                
                </div>
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

