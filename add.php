<?php
    require 'connection.php';
    session_start();
    // If not loged in yet
    if (!isset($_SESSION['uname'])){
        ?>
            <script>
                window.alert("Please log in first!");
            </script>
            <meta http-equiv="refresh" content="1; url=login.php" />
        <?php
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MemoApp</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
            crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!--Header - Navbar-->
        <nav class="navbar navbar-expand-lg bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">MemoApp</a>
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Body-->
        <!--Backpiece-->
        <div class="container d-flex align-items-center justify-content-center"
            style="height: 100vh; background-color: rgb(24, 3, 36); opacity:
            0.95;">
            <!--Outermost piece, containing 2 columns-->
            <div class="row w-100" id="container-outer">
                <!--Form-->
                <form action="handleAddcard.php" method="post">
                    <h2 class="mb-4">Add a new flashcard</h2>
                    <label for="question" class="form-label">Question</label><br>
                    <input type="text" id="question" name="question"
                        class="form-control"><br>
                    <label for="type" class="form-label">Answer:</label>
                    <input type="text" id="answer" name="answer"
                        class="form-control"><br>
                    <input type="submit" class="btn btn-primary"
                        value="Add question">
                    <br><br>
                </form>
            </div>
        </div>

        <!--Footer-->
        <footer class="bg-dark text-center text-lg-start fixed-bottom">
            <div class="text-center p-3">
                <p class="mx-0 my-0">A simple flashcard app - TranPhat28</p>
            </div>
        </footer>
        <!--JAVASCRIPT-->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
            crossorigin="anonymous"></script>
    </body>
</html>