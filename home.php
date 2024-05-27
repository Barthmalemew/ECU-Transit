<?php
session_start();
include "connection.php";

if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Fetch schedules for the logged-in user
$sql = "SELECT schedules.*, drivers.name AS driver_name, routes.route_name
        FROM schedules 
        INNER JOIN drivers ON schedules.driver_id = drivers.id
        LEFT JOIN routes ON schedules.route_id = routes.id
        WHERE schedules.driver_id = {$_SESSION['id']}"; // Assuming the user ID is stored in 'driver_id'
$res = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
</head>
<body>

<?php include 'php/navbar.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <?php if ($_SESSION['role'] == 'admin') { ?>
        <div class="card" style="width: 18rem;">
            <img src="img/admin-default.png" class="card-img-top" alt="admin image">
            <div class="card-body text-center">
                <h5 class="card-title"><?= htmlspecialchars($_SESSION['name']) ?></h5>
                <p class="card-text">ID: <?= htmlspecialchars($_SESSION['id']) ?></p>
                <a href="logout.php" class="btn btn-dark">Logout</a>
            </div>
        </div>
    <?php } else { ?>
        <div class="card" style="width: 18rem;">
            <img src="img/user-default.png" class="card-img-top" alt="user image">
            <div class="card-body text-center">
                <h5 class="card-title"><?= htmlspecialchars($_SESSION['name']) ?></h5>
                <p class="card-text">ID: <?= htmlspecialchars($_SESSION['id']) ?></p>
                <a href="logout.php" class="btn btn-dark">Logout</a>
            </div>
        </div>
    <?php } ?>

    <!-- Display user's schedule -->
    <div class="table-container">
        <h1 class="display-4 fs-1 table-title">Your Schedule</h1>
        <table class="table table-striped">
            <thead>
            <tr><
                <th scope="col">Date</th>
                <th scope="col">Route</th>
                <th scope="col">Clock In Time</th>
                <th scope="col">Clock Out Time</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['date']) ?></td>
                        <td><?= htmlspecialchars($row['route_name']) ?></td>
                        <td><?= htmlspecialchars($row['clock_in_time']) ?></td>
                        <td><?= htmlspecialchars($row['clock_out_time']) ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='4'>No schedules found</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlDR+8CmQ7YW7cyeKoSK5P5f8hxrhc/s6zj2BA55R8yYjN6C/G2qDk7hiHp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqjvQUXk2RNm9zV2G6r+9d8P9SA5z0f6m
