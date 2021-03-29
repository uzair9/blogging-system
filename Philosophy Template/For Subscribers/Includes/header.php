<?php
    if (!isset($_SESSION["user_role"]))
    {
        header("Location:../../../Blogs/Login Template/Index.php");
    }
?>
