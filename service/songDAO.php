<?php

function getItem($id)
{
    include("config.php");
    $sql = "SELECT * FROM song WHERE id = " . $id;
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        if ($row > 0) {
            return $row;
        }
    }
    return null;
}

function addItem($name, $singer, $lyric, $img, $audio)
{
    include("config.php");
    $sql = "INSERT INTO song(name, singer, lyric, image, src) 
    VALUES('" . $name . "', '" . $singer . "', '" . $lyric . "', '" . $img . "', '" . $audio . "')";
    if (mysqli_query($link, $sql)) {
        mysqli_close($link);
        return true;
    } else {
        mysqli_close($link);
        return false;
    }
}

function getItemByName($name)
{
    include("config.php");
    $sql = "SELECT * FROM song WHERE name like '%" . $name . "%'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return $result;
    }
    return null;
}
function updateItem($id, $name, $singer, $lyric, $img, $audio)
{
    include("config.php");
    $sql = "UPDATE song SET name = '" . $name . "', singer = '" . $singer . "', 
    lyric = '" . $lyric . "', image = '" . $img . "', src = '" . $audio . "' WHERE id = " . $id;
    $rs = mysqli_query($link, $sql);
    mysqli_close($link);
    return $rs;
}
function deleteItem($id)
{
    include("config.php");
    try {
        //code...
        $sql = "DELETE FROM song WHERE id = " . $id;
        $rs = mysqli_query($link, $sql);
        mysqli_close($link);
        return $rs;
    } catch (\Throwable $th) {
        //throw $th;
        return false;
    }


}
function getAll()
{
    include("config.php");
    $sql = "SELECT * FROM song";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return $result;
    }
    return null;
}
?>