<?php
    session_start();
    $_SESSION["username"] = null;
    $_SESSION["first_name"] = null;
    $_SESSION["last_name"] = null;
    $_SESSION["user_role"] = null;

    header("Location: ../../../Login Template/Index.php");
?>