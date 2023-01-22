<?php

include 'connect.php';

// Step-1: Check whether the id is set or not
// Step-2: Write the delete query [using id]
// Step-3: Pass the query to the result variable
// Step-4: If seccessful, then it should be deleted! 
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE from crud_db WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Deleted Successfully";        Use this for surity first then write the next line of code!
        header('Location: display.php');
    } else {
        die(mysqli_error($con));
    }
}
