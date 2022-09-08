<?php
    require 'connection.php';
    session_start();

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to find matching user
    $stmt = "select * from Users where username = '$username' and password = '$password'";
    $result  = mysqli_query($con, $stmt) or die(mysqli_error($con));
    $rows_fetched = mysqli_num_rows($result);

    if ($rows_fetched == 0){
        // No valid user - redirect to login page
        ?>
        <script>
            window.alert("Wrong username or password!");
        </script>
        <meta http-equiv="refresh" content="1; url=login.php" />
        <?php
    }
    else{
        $row = mysqli_fetch_array($result);
        $_SESSION['uname'] = $username;
        $id = $row['UserID'];
        $_SESSION['userId'] = $id;

        // Query to get summary information
        $stmt2 = "select * from Flashcards where Owner = '$id'";
        $result2  = mysqli_query($con, $stmt2) or die(mysqli_error($con));

        // Fetch result 2
        $rows_fetched2 = mysqli_num_rows($result2);

        // Get the date only
        $_SESSION['count'] = $rows_fetched2;
        $regdate = new DateTime($row['regdate']);
        $_SESSION['regdate'] = $regdate->format('Y-m-d');

        header('location: home.php');
    }
?>