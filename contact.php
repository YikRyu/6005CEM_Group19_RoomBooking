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


        <div class="row" style="margin-top: 30px">
            <div class="holder">
                <div class="container">
                    <form action="handleContact.php" method="post">

                        <div class="row">
                            <div class="information">
                                <h3>Get in touch with us</h3><br>

                                <label for="fname"><i class="fa fa-user"></i> User ID</label>
                                <input type="text" name="userid" value="<?php print $row['id']; ?>" readonly="">

                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" name="name" value="<?php print $row['name']; ?>" readonly="">

                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" name="email" value="<?php print $row['email']; ?>" readonly="">

                                <label for="adr"><i class="fa fa-address-card-o"></i> Phone Number</label>
                                <input type="text" name="phone" value="<?php print $row['tel']; ?>" readonly="">
                                
                                <label for="adr"><i class="fa fa-address-card-o"></i>Subject</label>
                                <input type="text" name="subject" placeholder="Subject">
                                
                                <label for="adr"><i class="fa fa-address-card-o"></i>Context</label><br>
                                <<textarea id="id" name="context" rows="5" cols="170" placeholder="Enter your message here..."></textarea>

                            </div>


                        </div>
                        <input type="submit" name="submit" value="Click here to send feedback" class="btn">
                    </form>
                </div>
            </div>

        </div>

    </body>

</html>

