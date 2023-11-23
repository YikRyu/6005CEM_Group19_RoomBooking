<?php
require 'admin_config.php';
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/adminHome.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <!--navigation-->
        <nav style="background-color: linen">
            <!corner logo>
            <a href="adminHome.php" style="color: black; text-decoration: none;">
                Welcome, <?php print $row['name']; ?>
            </a>

            <!--menu-->
            <ul class="menu">
                <li><a href="adminHome.php" style="text-decoration: none;">Home</a></li>
                <li><a href="adminContact.php" style="text-decoration: none;">Users' Feedback</a></li>
            </ul>

            <div class="search">
                <a href="adminLogout.php" style="color: red; text-decoration: none;">Log out</a>
            </div>
        </nav>

        <section class="movies-heading" style="margin-top: 100px;">
            <h2 style="text-align: center">All Bookings</h2>
        </section>

        <table class="table" style="margin: 50px; width: 95%">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>User ID</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Room ID</th>
                    <th>Room No.</th>
                    <th>Price</th>
                    <th>Check In</th>
                    <th>Check Out</th>
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

                $sql = "SELECT * FROM user_booking";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['userid'] . "</td>
                        <td>" . $row['username'] . "</td>
                        <td>" . $row['useremail'] . "</td>
                        <td>" . $row['phone'] . "</td>
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