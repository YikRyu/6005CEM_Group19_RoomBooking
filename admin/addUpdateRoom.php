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

        <section class="movies-heading" style="margin-top: 50px;">
            <h2 style="text-align: center">Add/Update Room</h2>
        </section>

        <section id="movie-list" style="margin-top: 30px;">

            <form action="handleAddRoom.php" method="post">

                <div class="movies-box" style="margin-right: 200px">
                    <label><b>ADD HERE</b></label><br>
                    <input type="text" name="roomnum" placeholder="Room No. here"/><br>
                    <input type="text" name="price" placeholder="Price here"/><br>
                    <input type="text" name="roomtype" placeholder="Room Type here"/><br>
                    <input type="submit" name="submit" value="Add New Room"/>
                </div>

            </form>

            <form action="handleUpdateRoom.php" method="post">

                <div class="movies-box" style="margin-left: 200px">
                    <label><b>UPDATE HERE</b></label><br>
                    <input type="text" name="id" placeholder="Room ID here"/><br>
                    <input type="text" name="roomnum" placeholder="Room No. here"/><br>
                    <input type="text" name="price" placeholder="Price here"/><br>
                    <input type="text" name="roomtype" placeholder="Room Type here"/><br>
                    <input type="submit" name="submit" value="Update This Room"/>
                </div>

            </form>

        </section>

        <table class="table" style="margin: 50px; width: 95%">
            <thead>
                <tr>
                    <th>Room ID</th>
                    <th>Room No.</th>
                    <th>Price</th>
                    <th>Room Type</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM rooms";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['roomnum'] . "</td>
                        <td>" . $row['price'] . "</td>
                        <td>" . $row['category_id'] . "</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>


    </body>

</html>