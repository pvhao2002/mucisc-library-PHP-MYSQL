<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Admin - Zing Mp3</title>
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
                        <li><a href="index.php?act=about">About Project</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- End Header -->

        <!-- Banner Image -->
        <div id="banner"></div>
        <!-- End Banner -->

        <!-- Form  information -->
        <section id="content" class="container">
            <h2>List hot song</h2>
            <table border=" 1">
                <thead>
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th style="width: 15%;">Song name</th>
                        <th style="width: 15%;">Singer</th>
                        <th style="width: 10%;">Image</th>
                        <th style="width: 15%;">Audio</th>
                        <th style="width: 30%;">Lyric</th>
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    if ($list_song || mysqli_num_rows($list_song) > 0) {
                        while ($row = mysqli_fetch_array($list_song)) {
                            echo '
                                    <tr>
                                        <td>' . $row['id'] . '</td>
                                        <td>' . $row['name'] . '</td>
                                        <td>' . $row['singer'] . '</td>
                                        <td><img src="' . $row['image'] . '" alt="NOT" class="item-img"></td>
                                        <td>
                                            <audio controls class="item-audio">
                                                <source src="' . $row['src'] . '" type="audio/mpeg">
                                                Your browser does not support the audio tag.
                                            </audio>
                                        </td>
                                        <td class="item-lyric">' . $row['lyric'] . '</td>
                                        <td>
                                            <a href="index.php?act=edit&&id=' . $row['id'] . '" class="btn btn-success btn-sm">Edit</a>
                                            <a href="index.php?act=deletesong&&id=' . $row['id'] . '"   onclick="return confirm(`Are you sure you want to delete this song?`)" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                           ';
                        }
                        mysqli_free_result($list_song);
                    }
                    ?>

                </tbody>
            </table>
        </section>
        <!-- End form  information -->

        <!-- Footer -->
        <footer>
            <div id="current-time"></div>
            <p>&copy; 2023 @MinhDang - 521H0497</p>
        </footer>
        <!-- End footer -->
    </div>
</body>

</html>