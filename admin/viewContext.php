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
        <link rel="stylesheet" href="css/admin_contact.css"/>
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
            <h2 style="text-align: center">User Feedback</h2>
        </section>

        <div class="row" style="margin-top: 30px">
            <div class="holder">
                <div class="container">
                    <form action="handleContact.php" method="post">

                        <div class="row">
                            <div class="information">
                                
                                <?php
                                $contact = $_POST['contact'];

                                $servername = 'localhost';
                                $username = 'root';
                                $password = '';
                                $database = 'room_booking';

                                $connection = new mysqli($servername, $username, $password, $database);

                                if ($connection->connect_error) {
                                    die("Connection failed: " . $connection->connect_error);
                                }

                                $result = mysqli_query($connection, "SELECT * FROM user_contact WHERE id = $contact");
                                $row = mysqli_fetch_assoc($result);
                                ?>

                                <label for="fname"><i class="fa fa-user"></i> User ID</label>
                                <input type="text" name="userid" value="<?php print $row['userid']; ?>" readonly="">

                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" name="name" value="<?php print $row['username']; ?>" readonly="">

                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" name="email" value="<?php print $row['useremail']; ?>" readonly="">

                                <label for="adr"><i class="fa fa-address-card-o"></i> Phone Number</label>
                                <input type="text" name="phone" value="<?php print $row['phone']; ?>" readonly="">

                                <label for="adr"><i class="fa fa-address-card-o"></i>Subject</label>
                                <input type="text" name="subject" value="<?php print $row['subject']; ?>" readonly="">

                                <label for="adr"><i class="fa fa-address-card-o"></i>Context</label><br>
                                <textarea rows="5" cols="170" readonly=""><?php print $row['context']; ?></textarea>

                            </div>


                        </div>
                        <input type="submit" name="submit" value="Click here to finish Booking" class="btn">
                    </form>
                </div>
            </div>

        </div>

    </body>

</html>
