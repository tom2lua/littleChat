<?php
    session_start();
    $_SESSION["hassession"] = true;
?>
<!DOCTYPE html>
<html>
<body>
    <script type="text/javascript" src="serviceconnect.js"></script>
    <div id="setNickForm">
        <p>Enter your Nickname:</p>
        <textarea type="text" id="nickname"></textarea>
        <button id="nicknameSubmit" onClick="SetNickname();">Set Nickname</button>
    </div>
    <div id="chatForm" style="display: none">
        <p>Type your message:</p>
        <input type="text" id="message">
        <button id="messSend" onClick="SendMess()">Send</button>
    </div>
</body>
</html>