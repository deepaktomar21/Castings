@extends('website.layouts.app')
@section('title', 'Chat App')
@section('content')
    <style>
        .chat-list {
            max-height: 500px;
            overflow-y: auto;
        }

        .chat-item {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
        }

        .chat-item:hover {
            background-color: #f5f5f5;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .chat-details {
            flex: 1;
        }

        .chat-title {
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .chat-message {
            display: flex;
            margin-bottom: 10px;
        }

        .message-avatar {
            margin-right: 10px;
        }

        .message-content {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 10px;
        }

        .sender .message-content {
            background-color: #dcf8c6;
        }

        .card-footer {
            padding: 10px;
        }

        .chat-window {
            max-height: 500px;
            overflow-y: auto;
        }

        .chat-message-container {
            min-height: 400px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #ffffff;
            ;
            margin-bottom: 10px;
        }

        .chat-message.sender {
            margin-bottom: 10px;
            text-align: left;
        }

        .chat-message.receiver {
            margin-bottom: 10px;
            text-align: right;
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #4B49AC;
            border-color: #4B49AC;
        }

        .chat-message {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .chat-message .message-avatar img {
            width: 40px;
            height: 40px;
        }

        .chat-message .message-content {
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            background-color: #f1f1f1;
            margin: 0 10px;
            max-width: 70%;
        }

        .chat-message.sender .message-content {
            background-color: #d1e7dd;
            /* Example color for sender */
            text-align: right;
            margin-left: auto;
            /* Align right */
        }

        .chat-message.sender {
            flex-direction: row-reverse;
        }

        .chat-message .timestamp {
            font-size: 0.8em;
            color: #888;
        }

        .chat-message.sender .timestamp {
            margin-right: 10px;
        }

        .profile_card {
            display: flex;
            align-items: center;
            padding: 15px;
            margin: 10px 0;
            background-color: #f8f9fa;
            /* Light background color */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            transition: transform 0.2s;
            /* Animation for hover effect */
        }

        .profile_card:hover {
            transform: translateY(-5px);
            /* Lift the card on hover */
        }

        .profile_img {
            width: 60px;
            /* Avatar size */
            height: 60px;
            margin-right: 15px;
            border: 2px solid #007bff;
            /* Border color matching badge */
        }

        .chat-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .profile_name {
            font-size: 1.1em;
            /* Slightly larger font size */
            font-weight: bold;
            color: #343a40;
            /* Darker text color */
            margin-bottom: 5px;
        }

        .badge-dark {
            background-color: #007bff;
            /* Badge background color */
            color: #fff;
            /* Badge text color */
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
            align-self: flex-start;
            /* Align the badge to the start */
        }
    </style>


    <div class="container-scroller">

        <div class="container-fluid page-body-wrapper">

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">


                                <br>
                                <div class="col-md-12 mt-4 grid-margin">
                                    <div class="row">
                                        <!-- Left column: Chat list -->
                                        <div class="col-md-4 col-lg-3">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-dark text-white">
                                                    <h4 class="mb-0">Chats</h4>
                                                </div>
                                                <div class="list-group chat-list" id="chatList"
                                                    style="max-height: 500px; overflow-y: auto;">
                                                    <ul class="list-group list-group-flush">
                                                        @foreach ($admins as $admin)
                                                            <li class="list-group-item d-flex align-items-center chat-item">
                                                                <div class="profile_img rounded-circle bg-dark text-white d-flex justify-content-center align-items-center mr-3"
                                                                    style="width: 40px; height: 40px; font-weight: bold; font-size: 18px;">
                                                                    {{ strtoupper(substr($admin->name, 0, 1)) }}
                                                                </div>

                                                                <div class="profile_info">
                                                                    <span
                                                                        class="profile_name font-weight-bold">{{ $admin->name }}</span>
                                                                    <span class="id"
                                                                        style="display: none;">{{ $admin->id }}</span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right column: Chat area -->
                                        <div class="col-md-8 col-lg-9">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-dark text-white">
                                                    <div class="d-flex align-items-center">
                                                        <div id="chat_initial"
                                                            class="rounded-circle bg-dark text-white d-flex justify-content-center align-items-center mr-3"
                                                            style="width: 40px; height: 40px; font-weight: bold; font-size: 18px;">
                                                            A
                                                        </div>

                                                        <h4 class="mb-0" id="chat_name">Chatting with</h4>
                                                    </div>
                                                </div>

                                                <div class="card-body chat-window" style="height: 400px; overflow-y: auto;">
                                                    <div class="chat-message-container" id="chatMessageContainer">
                                                        <!-- Chat messages will be dynamically loaded here -->
                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <form id="messageForm" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="receiver_id" id="receiver_id">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Type your message here..." id="messageInput"
                                                                name="message">
                                                            <button class="btn btn-dark" type="submit"
                                                                id="sendMessageButton">Send</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">

                        </div>
                    </div>


                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
        <script>
            // Initialize Pusher
            var pusher = new Pusher('b15fdeae7d2ee2b94509', {
                cluster: 'ap2',
                encrypted: true
            });

            // Subscribe to the 'admin-messages' channel
            var channel = pusher.subscribe('admin-messages');

            // Bind to the 'admin-message' event
            channel.bind('admin-message', function(data) {
                console.log('Message received:', data);

                let senderId = data.sender_id;
                let message = data.message;
                let senderName = data.admin.name;
                let senderImage = data.admin.image;
                let messageTime = new Date(data.created_at).toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                // Create message HTML with proper asset URL
                let messageHtml = `
            <div class="chat-message receiver"> <!-- Left alignment for received messages -->
                <div class="message-avatar">
                  
                </div>
                <div class="message-content">
                    <p><strong>${senderName}:</strong> ${message}</p>
                    <div class="timestamp">${messageTime}</div>
                </div>
            </div>`;

                // Append message to chat container
                document.getElementById('chatMessageContainer').insertAdjacentHTML('beforeend', messageHtml);
            });
        </script>
        <!-- JavaScript to handle profile card click -->
        <script>
            $(document).ready(function() {
                // Bind click event to the chat-item list elements
                $('.chat-item').on('click', function() {
                    let profileImage = $(this).find('.profile_img').attr('src');
                    let profileName = $(this).find('.profile_name').text();
                    let receiverId = $(this).find('.id').text();
                    $('#receiver_id').val(receiverId);
                    $('#chat_img').attr('src', profileImage);
                    $('#chat_name').text('Chatting with ' + profileName);

                    // Fetch messages
                    $.ajax({
                        url: '{{ route('fetch.messagesFromSellerToAdmin') }}',
                        method: 'GET',
                        data: {
                            receiver_id: receiverId
                        },
                        success: function(response) {
                            $('#chatMessageContainer').empty();

                            response.messages.forEach(function(message) {
                                let isSender = message.sender_id ==
                                    '{{ session('LoggedUserInfo') }}';
                                let userAvatar = isSender ?
                                    '{{ asset('storage/' . $LoggedUserInfo->picture) }}' :
                                    profileImage;
                                let userName = isSender ? '{{ $LoggedUserInfo->name }}' :
                                    profileName;

                                let messageTime = new Date(message.created_at)
                                    .toLocaleTimeString([], {
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    });

                                let messageHtml = `
                        <div class="chat-message ${isSender ? 'sender' : 'receiver'}">
                            <div class="message-avatar">
                               
                            </div>
                            <div class="message-content">
                                <p><strong>${userName}:</strong> ${message.message}</p>
                                <div class="timestamp">${messageTime}</div>
                            </div>
                        </div>`;
                                $('#chatMessageContainer').append(messageHtml);
                            });

                            // Scroll to the bottom of the chat container
                            $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0]
                                .scrollHeight);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching messages:', error);
                        }
                    });
                });

                $('#messageForm').on('submit', function(e) {
                    e.preventDefault();

                    let message = $('#messageInput').val().trim();
                    let receiverId = $('#receiver_id').val();

                    if (message === "") {
                        alert("Message cannot be empty.");
                        return;
                    }

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('send.Messageofsellertoadmin') }}',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            message: message,
                            receiver_id: receiverId
                        },
                        beforeSend: function() {
                            // Disable the send button and change its text to "Sending..."
                            $('#sendMessageButton').text('Sending...').attr('disabled', true);
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.message, "Success");
                                $('#messageInput').val(''); // Clear the input

                                let userAvatar =
                                    '{{ asset('storage/' . $LoggedUserInfo->picture) }}';
                                let userName = '{{ $LoggedUserInfo->name }}';

                                let messageTime = new Date().toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

                                let messageHtml = `
                    <div class="chat-message sender">
                        <div class="message-avatar">
                        
                        </div>
                        <div class="message-content">
                            <p><strong>${userName}:</strong> ${message}</p>
                            <div class="timestamp">${messageTime}</div>
                        </div>
                    </div>`;

                                $('#chatMessageContainer').append(messageHtml);

                                // Scroll to the bottom of the chat container after sending a message
                                $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0]
                                    .scrollHeight);
                            } else {
                                toastr.error(response.message, "Error");
                            }
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseJSON.message);
                            toastr.error('Failed to send message', "Error");
                        },
                        complete: function() {
                            // Re-enable the send button and change its text back to "Send"
                            $('#sendMessageButton').text('Send').attr('disabled', false);
                        }
                    });
                });
            });
        </script>
        
    @endsection
