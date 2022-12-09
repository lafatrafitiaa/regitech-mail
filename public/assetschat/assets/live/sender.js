const webSocket = new WebSocket("ws://localhost:3000")

webSocket.onmessage = (event) => {
    handleSignallingData(JSON.parse(event.data))
}

function handleSignallingData(data) {
    switch (data.type) {
        case "answer":
            peerConn.setRemoteDescription(data.answer)
            break
        case "candidate":
            peerConn.addIceCandidate(data.candidate)
    }
}

let username
function sendUsername() {
    username = document.getElementById("username-input").value
    sendData({
        type: "store_user"
    })
    startCall();
}

function sendData(data) {
    data.username = username
    webSocket.send(JSON.stringify(data))
}
function sendMsg(){
    let message=document.getElementById("message").value;
    data={
        type:"message",
        message:message
    }
    webSocket.send(JSON.stringify(data));
}


let localStream;
let peerConn;
function startCall() {
    var vendorUrl= window.URL||window.webkitURL;
    navigator.getMedia= navigator.getUserMedia ||
                        navigator.webKitGetUserMedia||
                        navigator.mozGetUserMedia ||
                        navigator.msGetUserMedia;
    navigator.getMedia({
        video:true,
        audio:true
    },function(stream){
        localStream = stream
        
        document.getElementById("local-video").srcObject = localStream
        document.getElementById("local-video").play();
        let configuration = {
            iceServers: [
                {
                    "urls": ["stun:stun.l.google.com:19302", 
                    "stun:stun1.l.google.com:19302", 
                    "stun:stun2.l.google.com:19302"]
                }
            ]
        }

        peerConn = new RTCPeerConnection(configuration)
        peerConn.addStream(localStream)

        peerConn.onicecandidate = ((e) => {
            if (e.candidate == null)
                return
            sendData({
                type: "store_candidate",
                candidate: e.candidate
            })
        })

        createAndSendOffer()
    }, (error) => {
        console.log(error)
    })
}

function createAndSendOffer() {
    peerConn.createOffer((offer) => {
        sendData({
            type: "store_offer",
            offer: offer
        })

        peerConn.setLocalDescription(offer)
    }, (error) => {
        console.log(error)
    })
}
