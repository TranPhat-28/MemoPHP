<?php
    require 'connection.php';
    session_start();
    
    $deleteID = $_POST['deleteID'];
?>
<script>
    if(confirm("Delete this flashcard?") == true){
        <?php
            // prepare and bind
            $stmt = $con->prepare("DELETE FROM Flashcards WHERE CardID = ?");
            $stmt->bind_param("i", $deleteID);

            $rc = $stmt->execute();
            $stmt->close();

            //header('location: home.php');
        ?>
        window.location.href="home.php";
    }
    else{
        window.location.href="home.php";
    }
</script>