@extends('dashboard.layouts.main')
@section('container')
    <style>
        #messages {
            max-height: 500px;
            overflow-y: auto;
        }

        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .sender {
            background-color: #dcf8c6;
            float: right;
            clear: both;
        }

        .receiver {
            background-color: #ebebeb;
            float: left;
            clear: both;
        }
    </style>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Chat Room</h1>
        <div id="messages" class="border p-3 mb-4"></div>

        <!-- Dropdown untuk memilih kontak -->
        <div class="mb-3">
            <select id="receiver" class="form-select" onchange="loadChatHistory()">
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <input type="text" id="message" class="form-control" placeholder="Type your message here...">
            <button onclick="sendMessage()" class="btn btn-primary">Send</button>
        </div>
    </div>

    <script>
        Pusher.logToConsole = true;
        document.addEventListener('DOMContentLoaded', function() {
            // const receiverId = document.getElementById('receiver').value;
            if (window.Echo) {
                initializeEcho();
                // loadChatHistory();
            } else {
                console.error('Echo is not initialized');
            }
        });

        function loadChatHistory() {
            const receiverId = document.getElementById('receiver').value;
            fetch(`/fetch-messages/${receiverId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(response => response.json()).then(data => {
                console.log("Received messages:", data);
                document.getElementById('messages').innerHTML = '';
                const messagesDiv = document.getElementById('messages');
                data.forEach(message => {
                    const messageClass = message.sender_id === "{{ auth()->id() }}" ? 'sender' :
                    'receiver';
                    console.log(messageClass);
                    messagesDiv.innerHTML += '<div class="message ' + messageClass + '">' + message
                        .message + '</div>';
                });
            }).catch(error => console.error("Error fetching messages:", error));
        }

        function initializeEcho() {
            const userId = "{{ auth()->id() }}"; // Pastikan ini benar sesuai dengan pengguna yang login
            console.log("Subscribing to private channel: chat." + userId);
            window.Echo.private("chat." + userId)
                .listen('.chat-channel', (e) => {
                    console.log("Received event", e);
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message');
                    messageElement.classList.add(e.message.sender_id === userId ? 'sender' : 'receiver');
                    messageElement.innerText = e.message.message;
                    document.getElementById('messages').appendChild(messageElement);
                });
        }

        function sendMessage() {
            const message = document.getElementById('message').value;
            const receiver = document.getElementById('receiver').value;
            fetch('/send-message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    message: message,
                    receiver: receiver
                })
            }).then(response => response.json()).then(data => {
                console.log("Server response:", data);
                if (data.status === 'Message sent successfully') {
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message', 'sender');
                    messageElement.innerText = message;
                    document.getElementById('messages').appendChild(messageElement);
                    document.getElementById('message').value = ''; // Clear the message input after sending
                }
            }).catch(error => console.error("Error sending message:", error));
        }
    </script>
@endsection
