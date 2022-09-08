<?php
    require 'connection.php';
    session_start();

    $owner = $_SESSION['userId'];
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $answer = mysqli_real_escape_string($con, $_POST['answer']);

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO Flashcards (Owner, Question, Answer) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $owner, $question, $answer);

    $rc = $stmt->execute();
    $stmt->close();
    if ( false === $rc ) {
        die('execute() failed: ' . htmlspecialchars($stmt->error));
        ?>
            <script>
                window.alert("Something went wrong, try again later");
            </script>
            <meta http-equiv="refresh" content="1; url=signup.php" />
        <?php
    }else{
        ?>
            <script>
                window.alert("Successfully added a new flashcard!");
            </script>
            <meta http-equiv="refresh" content="1; url=home.php" />
        <?php
    }
?>