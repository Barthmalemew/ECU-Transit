<!-- php/navbar.php -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6b3f91;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: #ffd700;">Transit System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="home.php" style="color: #ffd700;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="schedule.php" style="color: #ffd700;">Schedule</a>
                </li>
            </ul>
            <span class="navbar-text" style="color: #ffd700;">
                Welcome, <?= htmlspecialchars($_SESSION['name']) ?>
                <a href="logout.php" class="btn btn-light ms-2" style="background-color: #ffd700; color: #6b3f91; transition: box-shadow 0.3s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" onmouseover="this.style.boxShadow='0 8px 12px rgba(0, 0, 0, 0.2)';" onmouseout="this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">Logout</a>
            </span>
        </div>
    </div>
</nav>
