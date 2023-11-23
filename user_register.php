<!DOCTYPE html>

<html>
    <head>
        <title>The Blitz-Carlson</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/register.css"/>
        <script src="https://kit.fontawesome.com/8bbe2c347b.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="login-box">

            <h1>Registration</h1>

            <div id="error"></div>
            <form action="registerdb.php" method="post">
                <div class="textbox">
                    <i class="fa-solid fa-user"></i>
                    <input id="email" type="email" name="email" placeholder="Email" required=""/>
                </div>

                <div class="textbox">
                    <i class="fa-solid fa-user"></i>
                    <input id="name" type="text" name="name" placeholder="Username" required=""/>
                </div>

                <div class="textbox">
                    <i class="fa-solid fa-lock"></i>
                    <input id="password" type="password" name="password" placeholder="Password" required=""/>
                </div>

                <div class="textbox">
                    <i class="fa-solid fa-lock"></i>
                    <input id="confirmPass" type="password" name="confirmPass" placeholder="Confirm Password" required=""/>
                </div>

                <div class="textbox">
                    <i class="fa-solid fa-phone"></i>
                    <input id="tel" type="tel" name="phone" placeholder="Phone Number" required=""/>
                </div>

                <input class="btn" type="submit" name="register" value="Register"/>

            </form>

            <script>
                document.querySelector('.btn').onclick = function () {

                    var password = document.getElementById('password').value,
                            confirmPassword = document.getElementById('confirmPass').value;

                    if (password !== confirmPassword) {
                        alert("Password not matched, try again");
                    }

                };
            </script>

            <a href="user_login.php">
                <button class="btn">Already have an account?</button>
            </a>

        </div>
    </body>
</html>
