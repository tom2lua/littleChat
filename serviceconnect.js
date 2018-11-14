
function SetNickname()
{
    let connect = new MyConnect(document.getElementById("nickname").value, "setNickService", document.body);
    document.getElementById("setNickForm").style.display = "none";
    document.getElementById("message").style.display = "block";
}
function SendMess() 
{
    let connect = new MyConnect(document.getElementById("messSend").value, "sendMessService", document.body);
}
class MyConnect extends XMLHttpRequest
{
    constructor(message, target, appendto)
    {
        super();
        //Note: This declares and sets, "because JavaScript…":
        this.appendResultTo = appendto;
        // alert("You sent: "+ message + " to " + target);
        this.onreadystatechange = this.ajaxin;
        this.open("POST",target+".php",true);
        this.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        this.send("message="+encodeURI(message));
    }

    ajaxin()
    {
        // alert("AJAX stuff occurred");
        if (this.readyState === 4 )
        {
            // alert("AJAX says it's done.");
            if (this.status === 200)
            {
                // alert("Response from server:" + this.responseText);
                let newdiv = document.createElement("div");
                let texttodiv = document.createTextNode(this.responseText);
                newdiv.appendChild(texttodiv);
                this.appendResultTo.appendChild(newdiv);

            }
            else
            {
                alert("Whoopsee... something failed...");
            }

        }
    }
}
