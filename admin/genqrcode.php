<?php
include_once '../vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

$g = new \Google\Authenticator\GoogleAuthenticator();

$secret = $g->generateSecret();

// Database connection details
$host = 'localhost';
$dbname = 'room_booking';
$username = 'root';
$password = '';

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the secret into the admin table
$sql = "UPDATE admin SET otp_secret = '$secret' WHERE name = 'admin'";

if ($conn->query($sql) === TRUE)

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Authenticator Setup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        img {
            margin-top: 20px;
            max-width: 100%;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .next-button {
            margin-top: 20px;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .next-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Google Authenticator Setup</h1>
    
    <p>Your secret key has been generated and stored.</p>

    <img src="<?php echo $g->getURL('rafaelwendel', 'rafaelwendel.com', $secret); ?>" alt="QR Code">

    <p>Scan the QR code with your Google Authenticator app.</p>

    <form action="adminLogin.php" method="post">
        <button type="submit" class="next-button">Next</button>
    </form>
</div>

</body>
</html>



