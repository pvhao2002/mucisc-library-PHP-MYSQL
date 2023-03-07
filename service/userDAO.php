<?php
function checkDuplicateEmail($email)
{
    include("config.php");
    $sql = "SELECT * FROM user where email='".$email."' and role != 0";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    mysqli_close($link);
    return $count > 0;
}
?>