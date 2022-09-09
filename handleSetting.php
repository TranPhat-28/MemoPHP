<?php
    require 'connection.php';
    session_start();

    $username = $_SESSION['uname'];
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm = mysqli_real_escape_string($con, $_POST['confirm']);
    // The new password
    $new = mysqli_real_escape_string($con, $_POST['new']);

    // Search for the right user
    $stmt = $con->prepare("SELECT * FROM Users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result=$stmt->get_result();
    $user=$result->fetch_assoc();

    // Wrong password
    if($user == NULL){
        ?>
        <script>
            window.alert("Wrong password!");
        </script>
        <meta http-equiv="refresh" content="1; url=setting.php"; />
        <?php
    }else if ($new != $confirm){
        // New password and confirm do not match
        ?>
        <script>
            window.alert("New password and confirm password do not match!");
        </script>
        <meta http-equiv="refresh" content="1; url=setting.php"; />
        <?php
    }else{
        // Process to update the password
        // The current user ID
        $id = $_SESSION['userId'];
        // Prepare and bind
        $stmt2 = $con->prepare("UPDATE Users SET password = ? WHERE UserID = ?");
        $stmt2->bind_param("si", $new, $id);
        $rc2 = $stmt2->execute();
        $stmt2->close();

        // Result
        if ( false === $rc2 ) {
            //die('execute() failed: ' . htmlspecialchars($stmt->error));
            ?>
                <script>
                    window.alert("Something went wrong, try again later");
                </script>
                <meta http-equiv="refresh" content="1; url=setting.php" />
            <?php
        }else{
            ?>
                <script>
                    window.alert("Password updated successfully!");
                </script>
                <meta http-equiv="refresh" content="1; url=setting.php" />
            <?php
        }
    }
?>