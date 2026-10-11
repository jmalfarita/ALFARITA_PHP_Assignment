<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">

            <a class="navbar-brand" href="#">
                ABSOLVEMENT
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#lore">Lore</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <?php if (!empty($_SESSION['logged_in'])): ?>
                            <a class="btn btn-danger" href="alfarita_login/logout.php">Logout</a>
                        <?php else: ?>
                            <a class="btn btn-danger" href="alfarita_login/register.php">Join Now</a>
                        <?php endif; ?>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
