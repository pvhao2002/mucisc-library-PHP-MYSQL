<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Aguafina+Script" />
    <link rel="stylesheet" href="css/admin/login.css">
    <style>
        .error {
            color: red;
            height: 20em;
            line-height: 18em;
            margin: 2em;
        }
    </style>
</head>

<body>
    <div class="login_form">
        <div class="details">
            <?php
            if (isset($error) && ($error != "")) {
                echo "<p class = 'error'>" . $error . "</p>";
            }
            ?>
            <div class="welcome">Welcome</div>

            <form action="index.php?act=login-admin" method="post">
                <div class="wrap">
                    <label>Email</label>
                    <input type="email" name="email" class="input">
                </div>
                <div class="wrap">
                    <label>Password</label>
                    <input type="password" name="pass" class="input">
                </div>
                <input type="submit" name="signin" class="button" value="Sign in!">
                </input>
            </form>
        </div>
        <img class="fox" src="assets/img/title.png" />
        <div class="details-two">
            <h1 class="back">Welcome back!</h1>
            <p class="log">Log in and use the opportunities offered by our portal.</p>
            <br>
            <h2 class="acc">You can add song to playlist...</h2>
        </div>

    </div>
</body>

</html>