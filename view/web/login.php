<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../assets/img/title.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/login.css">
    <style>
        .error {
            margin-bottom: 12px;
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-form-bd">
        <div class="form-wrapper">
            <div class="form-container">
                <h1> Please Login</h1>
                <?php
                if (isset($error) && ($error != "")) {
                    echo "<p class='error'>" . $error . "</p>";
                }
                ?>

                <form action="index.php?act=login" method="post">
                    <div class="form-control">
                        <input type="email" placeholder="" name="email" required>
                        <label> Email</label>
                    </div>

                    <div class="form-control">
                        <input type="password" name="pass" required>
                        <label> Password</label>
                    </div>
                    <input type="submit" class="login-btn" name="login" value="Login"></input>
                    <p class="text">Don't have an account? <a href="index.php?act=signup" class="sign-up"> Register</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="../../js/login.js"></script>
</body>

</html>