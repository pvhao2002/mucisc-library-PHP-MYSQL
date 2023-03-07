<?php
session_start();
ob_start();
include("service/config.php");
include("service/songDAO.php");
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login':
            if (isset($_SESSION['ad'])) {
                unset($_SESSION['ad']);
            }
            if ((isset($_POST['login'])) && ($_POST['login'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $sql = "SELECT * FROM user where email= '" . $email . "' and pass='" . $pass . "' and role != 0";
                $result = mysqli_query($link, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $result = mysqli_fetch_array($result);
                    $_SESSION['email'] = $result["email"];
                    $name = explode("@", $email)[0];
                    mysqli_close($link);
                    header('location: index.php?act=login-by-' . $name);
                } else {
                    mysqli_close($link);
                    $error = 'Invalid email or password!';

                }
            }
            include("view/web/login.php");
            break;
        case 'signup':
            if (isset($_SESSION['ad'])) {
                unset($_SESSION['ad']);
            }
            if ((isset($_POST['signup'])) && ($_POST['signup'])) {
                $email = $_POST['email'];
                if (checkDuplicateEmail($email)) {
                    $error = "Email is existed...";
                } else {
                    $pass = $_POST['pass'];
                    $sql = "INSERT INTO user(email, pass, role) VALUES('" . $email . "', '" . $pass . "', 1)";
                    if (mysqli_query($link, $sql)) {
                        $_SESSION['email'] = $email;
                        $name = explode("@", $email)[0];
                        mysqli_close($link);
                        header('location: index.php?name=' . $name);
                    } else {
                        mysqli_close($link);
                        $error = "Error: " . $sql . "<br>" . mysqli_error($link);
                    }
                }
            }
            include('view/web/signup.php');
            break;
        case 'logout':
            if (isset($_SESSION['email'])) {
                unset($_SESSION['email']);
            }
            header('location: index.php');
            break;
        case 'play':
            $list_song = getAll();
            include("view/web/index.php");
            include("view/web/playmusic.php");
            break;
        case 'search':
            if ((isset($_POST['lookup'])) && ($_POST['lookup'])) {
                $name = $_POST['find'];
                $list_song = getItemByName($name);
            } else {
                $list_song = getAll();
            }
            include("view/web/index.php");
            break;
        case 'admin':
            if (isset($_SESSION['email']) && ($_SESSION['email'] !== 'admin@gmail.com')) {
                unset($_SESSION['email']);
            }
            if (isset($_SESSION['ad'])) {
                $list_song = getAll();
                include("view/admin/index.php");
            } else {
                include("view/admin/login.php");
            }
            break;
        case 'login-admin':
            if ((isset($_POST['signin'])) && ($_POST['signin'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $sql = "SELECT * FROM user where email= '" . $email . "' and pass='" . $pass . "' and role = 0";
                $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                    mysqli_close($link);
                    $_SESSION['ad'] = 'admin';
                    $list_song = getAll();
                    header('location: index.php?act=admin&&role=admin');
                } else {
                    $error = 'Invalid email or password!';
                    include("view/admin/login.php");
                }
                mysqli_close($link);
            } else {
                include("view/admin/login.php");
            }
            break;
        case 'addsong':
            if (isset($_POST['add']) && ($_POST['add'])) {
                $name = $_POST['name'];
                $singer = $_POST['singer'];
                $target_dir_img = "assets/img/";
                $target_dir_song = "assets/song/";
                $image = $target_dir_img . basename($_FILES["image"]["name"]);
                $audio = $target_dir_song . basename($_FILES["audio"]["name"]);
                $lyric = $_POST['lyric'];
                $rs = addItem($name, $singer, $lyric, $image, $audio);
                if ($rs) {
                    $message = "Success";
                } else {
                    $message = "Error";
                }
            }
            include("view/admin/addSong.php");
            break;
        case 'edit':
            if (isset($_GET['id']) && ($_GET['id'] != "")) {
                $id = $_GET['id'];
                $rs = getItem($id);
                include("view/admin/editSong.php");
            } else {
                $list_song = getAll();
                header('location: index.php?act=admin&&role=admin');
            }
            break;
        case 'editsong':
            if (isset($_POST['edit']) && ($_POST['edit'])) {
                $id = $_GET['id'];
                $name = $_POST['name'];
                $singer = $_POST['singer'];
                $target_dir_img = "assets/img/";
                $target_dir_song = "assets/song/";
                $image = $target_dir_img . basename($_FILES["image"]["name"]);
                $audio = $target_dir_song . basename($_FILES["audio"]["name"]);
                $lyric = $_POST['lyric'];
                $rs = updateItem($id, $name, $singer, $lyric, $image, $audio);
                if ($rs) {
                    $message = "Success";
                } else {
                    $message = "Error";
                }
            }
            $list_song = getAll();
            header('location: index.php?act=admin&&role=admin');
            break;
        case 'deletesong':
            if (isset($_GET['id']) && ($_GET['id'] != "")) {
                $id = $_GET['id'];
                if (!deleteItem($id)) {
                    echo "<script>alert('Không thể xóa được!')</script>";
                }
            }
            $list_song = getAll();
            include("view/admin/index.php");
            break;
        case 'about':
            include("view/admin/about.php");
            break;
        default:
            if (isset($_SESSION['ad'])) {
                unset($_SESSION['ad']);
            }
            $list_song = getAll();
            include("view/web/index.php");
            break;
    }
} else {
    if (isset($_SESSION['ad'])) {
        unset($_SESSION['ad']);
    }
    $list_song = getAll();
    include("view/web/index.php");
}
?>