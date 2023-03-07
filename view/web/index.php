<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../assets/img/title.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/boxright.css">
    <link rel="stylesheet" href="../../css/item.css">


    <!-- TEST -->
    <script src="https://kit.fontawesome.com/7d35781f0a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- END TEST -->

    <!-- Using Bootstrap Icons v1.3.0 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include("header.php"); ?>
    <div id="container">
        <h2>List hot song</h2>
        <div class="box">
            <div class="box-left">
                <?php
                // check if user is login, the client will genarate list song to listen
                if (isset($_SESSION['email'])) {
                    // include config file
                    // Attempt select query execution
                    $result = $list_song;

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<div class='item'>";
                                echo '<div class="item-info">';
                                echo '<img src="' . $row['image'] . '" alt="LOADING...">';
                                echo '<div class="item-info-1">';
                                echo "<a href='index.php?act=play&&id=" . $row['id'] . "' class='item-name-song'>" . $row['name'] . "</a>";
                                echo '<p class="item-name-author">' . $row['singer'] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="item-hq">hq</div>';
                                echo '<div class="item-other">';
                                echo '<i class="bi bi-share-fill" ></i>';
                                echo '<i class="bi bi-download" id = "down" data-src = "' . $row['src'] . '"; onclick = "downloadd();"></i>';
                                echo '</div>';
                                echo '</div>';
                                echo '<hr style="margin-top:4px; color:#8e8989">';
                            }
                            mysqli_free_result($result);
                        }
                    } else {
                        echo "<p style = 'color: red;'><em>No song were found.</em></p> ";
                    }
                } else {
                    echo "<p>Please login to listen to music...</p>";
                }
                ?>
            </div>

            <div class="box-right" id="box-lyric">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <div class="circular_image">
                        <img class="box-image-right" src="assets/img/music.jpg" alt="ZINGMP3">
                    </div>
                    <div class="box-play">
                        <audio id="tdt" controls style="display: none;">
                            <source src="assets/song/hanhkhuctonducthang.mp3" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>
                        <i class="bi bi-play" onclick="playTDT();">Play</i>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <footer class="footer">
        @Copyright by MinhDang
    </footer>
    <script>
        // function to play stand media if client user don't login to website
        function playTDT() {
            const mp3TDT = document.getElementById('tdt')
            if (!mp3TDT.paused) {
                mp3TDT.pause();

            } else {
                mp3TDT.play();

            }
        }

        // function to download if client user cliced icon download in list song
        function downloadd() {
            const iDownload = document.getElementById("down")
            let url = iDownload.getAttribute('data-src')

            // reference at stackoverflow: https://stackoverflow.com/questions/25755096/div-click-download-audio-file
            var link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', url);
            document.getElementsByTagName("body")[0].appendChild(link);
            // Firefox
            if (document.createEvent) {
                var event = document.createEvent("MouseEvents");
                event.initEvent("click", true, true);
                link.dispatchEvent(event);
            }
            // IE
            else if (link.click) {
                link.click();
            }
            link.parentNode.removeChild(link);
        }
    </script>
    <script src="js/main.js"></script>
</body>

</html>