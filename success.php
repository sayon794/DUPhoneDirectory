<!doctype html>
<meta charset="utf-8">
<html>
    <head>
        <?php
        header('Content-Type: text/html; charset=utf-8');
        session_start();
        if(isset($_SESSION['username'])) {


            $servername = "localhost";
            $username = "adminman";
        	$password = "password";
            $dbname = "directory_uni";

            //create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn->set_charset('utf8mb4');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT into person(name, department, faculty) VALUES ('" . $_POST["name"] . "','" . $_POST["department"] . "','" . $_POST["faculty"] . "')";
            if ($conn->query($sql) === TRUE) {
                echo "Added to person<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $sql = "SELECT ID from person WHERE name='" . $_POST["name"] . "' and department='" . $_POST["department"] . "' and faculty = '" . $_POST["faculty"] . "'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $id = $row['ID'];

            $sql = "INSERT into email (ID,email) VALUES ('" . $id . "','" . $_POST["email"] . "')";
            if ($conn->query($sql) === TRUE) {
                echo "added to email <br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $sql = "INSERT into phone (ID,phone) VALUES ('" . $id . "','" . $_POST["phone"] . "')";
            if ($conn->query($sql) === TRUE) {
                echo "added to phone <br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $sql = "INSERT into position (ID,position) VALUES ('" . $id . "','" . $_POST["position"] . "')";
            if ($conn->query($sql) === TRUE) {
                echo "added to position <br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </head>
    <body onload="window.location = '/weblab/phone_directory'">

    </body>
</html>
