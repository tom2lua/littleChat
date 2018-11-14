<?php
session_start();
if (!isset($_SESSION["hassession"]))
{
    print "Invalid page, please go back!";
}
else 
{
    //Open database connection:
    $chatDatabase = new PDO('mysql:host=127.0.0.1; dbname=little_chat', 'WATestUser1', 'WATestPwd1');
    //Insert into message queue for all available session:
    $targets = $chatDatabase->prepare("SELECT id FROM availablesessions");
    for ($i = 0; $i < $targets->rowCount(); $i++)
    {
        $target = $targets->fetch();
        //Add a queue for all but the sender:
        if ($target["id"] != sessionid())
        {
            $insert = $chatDatabase->prepare("INSERT INTO msgqueue (tosession, fromsession, message) VALUES (:sessionTarget, :senderSession, :message)");
            $insert->bind_value(":sessionTarget", $target["id"]);
            $insert->bind_value(":senderSession", session_id());
            $insert->bind_value(":message", $_POST["message"]);
            $insert->execute();
            $insert = null;
        }
    }
    $targets->closeCursor();
    $targets = null;

    print(" You wrote: " . htmlspecialchars($_POST["message"]));
}
?>