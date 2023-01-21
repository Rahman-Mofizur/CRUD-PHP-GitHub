<?php


// The MySQLi Extension (MySQL Improved) is a relational database driver used in the PHP scripting language to provide an interface with MySQL databases. 

// Connection variable and pass the localhost name, root, password and database name!
// MySQLi = MySQL Improved

$con = new mysqli('localhost', 'root', '', 'crudoperation');

// For checking the connection is successful or not
// if ($con) {
//     echo "Connection is successful!";
// } else {
//     die(mysqli_error($con));
// }


// Now change the code:
if (!$con) {
    die(mysqli_error($con));
}
