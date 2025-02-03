<?php
include "../database/env.php";
$id = $_REQUEST['id'];
$qurey = "DELETE FROM post_list WHERE id = '$id'";
$result = mysqli_query($conn, $qurey);

header("Location:../all-post.php");