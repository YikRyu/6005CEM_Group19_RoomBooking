<?php
require 'config.php';
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>The Blitz-Carlson</title>
        <link rel="stylesheet" href="css/fill_info.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


        <div class="row">
            <div class="holder">
                <div class="container">
                    <form action="handleBookingDB.php" method="post">

                        <div class="row">
                            <div class="information">
                                <h3>Booking Information</h3>

                                <label for="fname"><i class="fa fa-user"></i> User ID</label>
                                <input type="text" name="userid" value="<?php print $row['id']; ?>" readonly="">

                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" name="name" value="<?php print $row['name']; ?>" readonly="">

                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" name="email" value="<?php print $row['email']; ?>" readonly="">

                                <label for="adr"><i class="fa fa-address-card-o"></i> Phone Number</label>
                                <input type="text" name="phone" value="<?php print $row['tel']; ?>" readonly="">

                            </div>

                            <div class="information">
                                <h3>Room Info</h3>

                                <?php
                                $roomid = $_POST['rooms'];

                                $servername = 'localhost';
                                $username = 'root';
                                $password = '';
                                $database = 'room_booking';

                                $connection = new mysqli($servername, $username, $password, $database);

                                if ($connection->connect_error) {
                                    die("Connection failed: " . $connection->connect_error);
                                }

                                $result = mysqli_query($connection, "SELECT * FROM rooms WHERE id = $roomid");
                                $row = mysqli_fetch_assoc($result);
                                ?>


                                <label for="cname">Room ID</label>
                                <input type="text" name="roomid" value="<?php print $row['id']; ?>" readonly="">

                                <label for="ccnum">Room Number</label>
                                <input type="text" name="roomnum" value="<?php print $row['roomnum']; ?>" readonly="">

                                <label for="expmonth">Price</label>
                                <input type="text" name="price" value="<?php print $row['price']; ?>" readonly="">

                                <div class="row">
                                    <div class="information">
                                        <label for="state">Check In Date</label>
                                        <input type="date" name="checkin" required="">
                                    </div>
                                    <div class="information">
                                        <label for="zip">Check Out Date</label>
                                        <input type="date" name="checkout" required="">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <input type="submit" name="submit" value="Click here to finish Booking" class="btn">
                    </form>
                </div>
            </div>

        </div>

    </body>

</html>

