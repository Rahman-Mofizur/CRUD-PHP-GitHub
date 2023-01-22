<?php

include 'connect.php';

// 1 Starts here
// Get updateid in $id variable

// Method-1: If id is set then work next!
// if (isset($_GET['updateid'])) {
//     $id = $_GET['updateid'];
// }

// Method-2: Bellow code Works Just like isset() Function!
$id = $_GET['updateid'] ?? "";




// 4 Display on Update Screen
// For displaying the information in the update template! So that only the field that is required to change!
$sql = "SELECT * from crud_db WHERE id = $id";
$result = mysqli_query($con, $sql);

// Diplaying only one Row by fetching from Database, So NO NEED of while loop
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $name_1 = $row['name'];   // This variables are used in HTML Form below as value= "php echo $name_1" 
    $email_1 = $row['email'];
    $mobile_1 = $row['mobile'];
    $password_1 = $row['password'];
}





// 2 Update Logics
// For writing in multiple lines at same time: (Alt + L) and by pressing Alt select the lines 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Insert Query
    // $sql = "update crud_db set name = '$name' where id = '$id'";
    $sql = "UPDATE crud_db SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id=$id";
    //  To execute this query, a variable is created named $result for passing the Connection and Query variables.
    $result = mysqli_query($con, $sql);

    // Checking the Result query has executed susseccfully or not!
    if ($result) {
        // echo "Data Updated Successfully";  (For checking whether the data is inserted or not)

        // Redirect to the CRUD Table (Display Table)
        header('location: display.php');
        echo "Data Updated Successfully";
    } else {
        die(mysqli_error($con));
    }
}

?>


<!-- 3 Display Screen -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>CRUD Operation</title>
</head>

<body>
    <!-- Container class separates the fields
    my-5 will add top and bottom margin of 5px -->
    <div class="container my-5">
        <form method="POST">
            <!-- Name -->
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $name_1 ?>" autocomplete="off">
                <!-- name="name"  is used within if(isset($_POST['submit'])) Function to check whether the field is gaining the perfect criteria or not! -->
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $email_1 ?>" autocomplete="off">
                <!-- class= text-danger means red Text -->
                <small class="text-danger">We'll never share your email with anyone else.</small>
            </div>

            <!-- Mobile -->
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" value="<?php echo $mobile_1 ?>" autocomplete="off">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Enter your password" name="password" value="<?php echo $password_1 ?>" autocomplete="off">
                <!-- class= text-danger means red Text -->
                <small class="text-danger">Provide at least 1 numeric, 1 special character (@,!,$) and a capital latter! </small>
            </div>


            <!-- If you click this Submit button that uses name="submit" will go to the database by POST method and this name="submit" is used in if(isset($_POST['submit'])) Function -->
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>