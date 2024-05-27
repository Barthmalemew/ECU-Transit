<?php
session_start();
include "connection.php";

if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Fetch schedules, drivers, and routes
$sql = "SELECT schedules.*, drivers.name AS driver_name, routes.route_name
        FROM schedules 
        INNER JOIN drivers ON schedules.driver_id = drivers.id
        LEFT JOIN routes ON schedules.route_id = routes.id";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
</head>
<body>

<?php include 'php/navbar.php'; ?>

<div class="container">
    <div class="table-container"> <!-- Added container for the table -->
        <h1 class="display-4 fs-1 table-title">Schedules</h1> <!-- Move the title inside the table box -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Driver Name</th>
                <th scope="col">Date</th>
                <th scope="col">Route</th>
                <th scope="col">Clock In Time</th>
                <th scope="col">Clock Out Time</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($res) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= htmlspecialchars($row['driver_name']) ?></td> <!-- Driver Name column -->
                        <td><?= htmlspecialchars($row['date']) ?></td> <!-- Date column -->
                        <td><?= htmlspecialchars($row['route_name']) ?></td> <!-- Route column after Date -->
                        <td><?= htmlspecialchars($row['clock_in_time']) ?></td>
                        <td><?= htmlspecialchars($row['clock_out_time']) ?></td>
                    </tr>
                    <?php
                    $i++;
                }
            } else {
                echo "<tr><td colspan='6'>No schedules found</td></tr>"; // Adjust colspan to match number of columns
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>


