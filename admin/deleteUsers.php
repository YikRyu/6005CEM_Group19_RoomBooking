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
            <h2 style="text-align: center">Delete Existing Users</h2>
        </section>
        
        <section class="movies-heading" style="margin-top: 10px;">
        
        <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'room_booking';

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $query = "SELECT * FROM users ";
        $result1 = mysqli_query($connection, $query)
        ?>
        
            <form action="handleDeleteUsers.php" method="post">
            
            <select class="classic" name="users" style="margin-left: 30px;">
                <?php while($row1 = mysqli_fetch_assoc($result1)):;?>
                <option><?php echo $row1["id"];?> </option>
                <?php endwhile;?>
            </select>
            
            <input type="submit" name="submit" value="Delete Selected User"/>

        </form>
            
        </section>

        <table class="table" style="margin: 50px; width: 95%">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone No.</th>
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

                $sql = "SELECT * FROM users";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['password'] . "</td>
                        <td>" . $row['tel'] . "</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>


    </body>

</html>

