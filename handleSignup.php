<?php
    require 'connection.php';
    session_start();

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm = mysqli_real_escape_string($con, $_POST['confirm']);

    // If the password and confirm do not match
    if ($password != $confirm){
        ?>
        <script>
            window.alert("Password and confirm password do not match!");
        </script>
        <meta http-equiv="refresh" content="1; url=signup.php"; />
        <?php
    }

    // prepare and bind
    $stmt = $con->prepare("INSERT INTO Users (username, password, role) VALUES (?, ?, 'user')");
    $stmt->bind_param("ss", $username, $password);

    $rc = $stmt->execute();
    $stmt->close();
    if ( false === $rc ) {
        //die('execute() failed: ' . htmlspecialchars($stmt->error));
        ?>
            <script>
                window.alert("Something went wrong, try again later");
            </script>
            <meta http-equiv="refresh" content="1; url=signup.php" />
        <?php
    }else{
        ?>
            <script>
                window.alert("Successfully sign up a new user!");
            </script>
            <meta http-equiv="refresh" content="1; url=login.php" />
        <?php
    }
?>