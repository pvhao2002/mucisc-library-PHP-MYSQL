<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $song = getItem($id);
    echo '
        <script>
            const box = document.getElementById("box-lyric");
            const item = `
            <h3 class="title"><i class="bi bi-file-music-fill"></i>Lyric: ' . $song['name'] . '<i class="bi bi-file-music-fill"></i></h3>
            <p class="posted">Posted by: Unknow</p>
            <audio class="item-src" controls>
                <source src="' . $song['src'] . '" type="audio/mpeg">
                Your browser does not support the audio tag.
            </audio>
            <hr style="margin-top: 20px;">
            <h1 class="marquee">
                <pre>
                    ' . $song['lyric'] . '
                </pre>
            </h1>`;
            box.innerHTML = item;
        </script>
    ';
}
?>