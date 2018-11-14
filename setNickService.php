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
    //Delete previous session:
    $deleteSession = $chatDatabase->prepare("DELETE FROM availablesessions WHERE id=:sessionId");
    $deleteSession->bindValue(":sessionId", session_id());
    $deleteSession->execute();
    $deleteSession = null;
    //Insert new session:
    $insertSession = $chatDatabase->prepare("INSERT INTO availablesessions(id, nickname) VALUES (:sessionId, :nickname)");
    $insertSession -> bindValue(":sessionId", session_id());
    $insertSession -> bindValue(":nickname", $_POST["message"]);
    $insertSession -> execute();
    $insertSession = null;

    print (" Hello " . htmlspecialchars($_POST["message"]) . ", welcome to this little chat!");
}
?>