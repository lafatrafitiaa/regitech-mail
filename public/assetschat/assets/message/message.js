var conn = new WebSocket('ws://localhost:8888');
            conn.onopen = function(e)
            {
                console.log("Connection established!");
            };
    
            function getTime()
            {
                var date = new Date();
    
                return date.toLocaleDateString()
            };
    
            function sendMessage(e)
            {
                var message = document.getElementById('chat-input').value;
    
                if (message.length == 0) {
                    return;
                }
    
                conn.send(message);
    
                var content = document.getElementById('chat-logs').innerHTML;
    
                document.getElementById('chat-logs').innerHTML = content + '<div class="chat-msg user"><div class="cm-msg-text">'+message+'</div></div>';
                document.getElementById('chat-input').value = '';
            };
    
            function receiveMessage(e)
            {
                var content = document.getElementById('chat-logs').innerHTML;
    
                document.getElementById('chat-logs').innerHTML 
                = content + '<div class="chat-msg user"><div class="cm-msg-text">'+e.data+'</div></div>';
            };
    
            conn.onmessage = function(e)
            {
                receiveMessage(e);
            };