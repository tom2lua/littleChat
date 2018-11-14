<?php
    session_start();
    if (!isset($_SESSION["hassession"]))
    {
        print "Naughtynaughty...";
    }
    else
    {
    }

    print htmlspecialchars(strrev($_POST["message"]));
?>

