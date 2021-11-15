<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php

        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "contact_form");

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        // Taking all 5 values from the form data(input)
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $dob = $_REQUEST['dob'];
        $about = $_REQUEST['about'];

        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO contact VALUES ('$id','$name',
			'$email','$dob','$about')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3>data stored in a database successfully."

                . " to view the updated data</h3>";

            echo nl2br("\n$name\n $email\n "
                . "$dob\n $about");
        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>