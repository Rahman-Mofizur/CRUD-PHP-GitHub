<?php

include 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>CRUD Operation</title>
</head>

<body>
    <div class="container">

        <!-- Add User -->
        <button class="btn btn-primary my-5"> <a href="user.php" class="text-light">Add User</a> </button>

        <!-- Table -->
        <table class="table">

            <!-- Table Head -->
            <thead>
                <tr>
                    <th scope="col">Sl no.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody>
                <?php

                $sql = "Select * from crud_db";
                $result = mysqli_query($con, $sql);

                // If Result id True or Found then next line code:
                if ($result) {
                    // mysqli_fetch_assoc() Function fetches data [as String] from the database through $result variable
                    while ($row = mysqli_fetch_assoc($result)) {    // যতক্ষণ $row = mysqli_fetch_assoc($result) হবে ততক্ষণ input নিতে থাকবে।
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $password = $row['password'];


                        // Print: by concatination (Must use single quote [.])
                        // <th scope="row">' . $id . '</th> == CSS style="font-weight: bold;"
                        echo '<tr>
                        <td style="font-weight: bold">' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>' . $email . '</td>
                        <td>' . $mobile . '</td>
                        <td>' . $password . '</td>
                        <td>
                            <button class="btn btn-primary"><a href="update.php? updateid=' . $id . '" class="text-light">Update</a></button>
                           
                            <button class="btn btn-danger"><a href="delete.php? deleteid=' . $id . '" class="text-light">Delete</a></button>
                        </td>
                        </tr>';
                    }
                }
                // <a href="delete.php? deleteid=' . $id . '">Delete</a> => Delete by using id (Concatination)

                ?>

                <!-- 
                Shortcut Tips:
                
                button*2>a
                <button><a href=""></a></button><button><a href=""></a></button>
                -->

            </tbody>
        </table>
    </div>
</body>

</html>