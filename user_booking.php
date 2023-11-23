<?php
require 'config.php';
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    $bookingname = $row['id'];
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>The Blitz-Carlson</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/homepage.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>


        <header>
            <div class="logo">The Blitz-Carlson</div>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <nav class="nav-bar">
                <ul>
                    <li><a href="loggedhome.php" class="active">Home</a></li>
                    <li><a href="user_booking.php">My Bookings</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <li><a href="loggedhome.php">Welcome, <?php print $row['name']; ?></a></li>
                </ul>
            </nav>
        </header>

        <script>
            hamburger = document.querySelector(".hamburger");
            hamburger.onclick = function () {
                navBar = document.querySelector(".nav-bar");
                navBar.classList.toggle("active");
            }
        </script>
        
        <h2 style="margin-top: 20px; text-align: center"><?php print $row['name']; ?>'s Bookings</h2>
        
        <table class="table" style="margin: 50px; width: 95%">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Room ID</th>
                    <th>Room Number</th>
                    <th>Price</th>
                    <th>Check in date</th>
                    <th>Check out date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'room_booking';

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM user_booking WHERE userid = $bookingname";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['roomid'] . "</td>
                        <td>" . $row['roomnum'] . "</td>
                        <td>" . $row['price'] . "</td>
                        <td>" . $row['checkin'] . "</td>
                        <td>" . $row['checkout'] . "</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>

    </body>
</html>

