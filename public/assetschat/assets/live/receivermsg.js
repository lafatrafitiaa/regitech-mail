const webSocket = new WebSocket("ws://localhost:3000")
webSocket.onmessage = (event) => {
}

function sendData() {
    var message=document.getElementById("message").value;
    data={
        message : message
    }
    webSocket.send(JSON.stringify(data))
}

