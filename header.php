
<nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">MemoApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (isset($_SESSION['uname'])){ ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
        <?php }else{ ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Signup</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
        <?php } ?>
    </div>
</nav>