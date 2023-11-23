<?php
require 'admin_config.php';

include_once '../vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

$g = new \Google\Authenticator\GoogleAuthenticator();

// Assuming the username is passed as a parameter or from a session variable
$username = 'admin';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT otp_secret FROM admin WHERE name = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $secret = $row['otp_secret'];

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // User input for the code
        $userInputCode = $_POST['code'];

        if ($g->checkCode($secret, $userInputCode)) {
            // Redirect to adminHome.php if the code is correct
            header('Location: adminHome.php');
            exit();
        } else {
            $errorMessage = 'Incorrect code. Please try again.';
        }
    }
} else {
    echo 'User not found or secret key not set.';
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
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
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Verification Code</h1>

    <?php if (isset($errorMessage)) : ?>
        <p class="error-message"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="code">Enter Code:</label>
        <input type="text" id="code" name="code" required>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>

