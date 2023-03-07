<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin/style.css">
    <link rel="stylesheet" href="css/admin/addsong.css">
    <title>Edit infomation song</title>
</head>

<body>
    <div id="wrapper">
        <!-- Header -->
        <header>
            <div class="inner-header container">
                <a href="index.php?act=admin" id="logo">MINHDANG</a>
                <nav>
                    <ul id="main-menu">
                        <li><a href="index.php?act=admin">Home</a></li>
                        <li><a href="index.php?act=addsong">Add Song</a></li>
                        <li><a href="index.php?act=aout">About Project</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- End Header -->

        <!-- Banner Image -->
        <div id="banner"></div>
        <!-- End Banner -->
        <div id="message">
            <?php if (isset($message) && ($message != "")) {
                if ($message == "Success") {
                    echo "<p class = 'success'>Sucessfull add new song..</p>";
                } else {
                    echo "<p class = 'error'>Error add new song...</p>";
                }
            }
            ?>
        </div>
        <section id="content" class="container">
            <form method="post" action="<?php echo 'index.php?act=editsong&&id=' . $rs["id"]; ?>"
                enctype="multipart/form-data">
                <h1>Form edit information of song</h1>
                <p>Please type new information.</p>
                <hr>
                <label for="name"><b>Name of song</b></label>
                <input type="text" placeholder="Type name of song" value="<?php echo $rs['name']; ?>" name="name"
                    required autofocus>
                <label for="singer"><b>Singer</b></label>
                <input type="text" placeholder="Type singer of song" value="<?php echo $rs['singer']; ?>" name="singer"
                    required>

                <label for="image"><b>Image</b></label>
                <input type="file" name="image" value="<?php echo $rs['image']; ?>"
                    placeholder="Please choose image for song" accept="image/*">
                <label for="Audio"><b>Audio</b></label>
                <input type="file" name="audio" value="<?php echo $rs['src']; ?>"
                    placeholder="Please choose source for song" accept=".mp3,audio/*">
                <label for="lyric"><b>Lyric</b></label>
                <textarea rows="4" placeholder="Type lyric of song" name="lyric"><?php echo $rs['lyric']; ?></textarea>
                <div class="clearfix">
                    <input type="submit" class="btnAdd" name="edit" value="Edit"></input>
                </div>
            </form>
        </section>

        <!-- Footer -->
        <footer>
            <div id="current-time"></div>
            <p>&copy; 2023 @MinhDang - 521H0497</p>
        </footer>
        <!-- End footer -->
    </div>

</body>

</html>