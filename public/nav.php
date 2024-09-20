<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Employee Directory</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <?php if($isLoggedIn): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_all.php">Send Emails</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout <?php echo ($isAdmin) ? "(admin)":"(user)"; ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
