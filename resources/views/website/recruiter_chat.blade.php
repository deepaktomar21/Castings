@extends('website.layouts.app')
@section('title', 'Recruiter Chat')
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

        .chat-message.sender.timestamp {
            font-size: 0.8em;
        }

        .chat-message.sender .timestamp {
            margin-right: 10px;
            color: white;

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

        .badge-primary {
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


        .chat-list .chat-item {
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .chat-list .chat-item:hover {
            background-color: #f8f9fa;
        }

        .chat-window {
            background-color: #f4f6f8;
            border-radius: 0 0 5px 5px;
        }

        .chat-message-container {
            padding: 15px;
        }

        .chat-message {
            display: flex;
            margin-bottom: 15px;
        }

        .chat-message .message-avatar img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .chat-message .message-content {
            max-width: 70%;
            background-color: #e9ecef;
            border-radius: 15px;
            padding: 10px 15px;
            position: relative;
        }

        .chat-message.sender .message-content {
            background-color: #007bff;
            color: #fff;
            align-self: flex-end;
        }

        .chat-message .timestamp {
            font-size: 0.8rem;
            color: #6c;
        }

        .chat-item.active {
            background-color: #f0f0f0;
            font-weight: bold;
        }
    </style>



    <div class="container-scroller">

        <div class="container-fluid page-body-wrapper">



            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-md-12 mt-4 grid-margin">
                                    <div class="row">
                                        <!-- Left column: Chat list -->
                                        <div class="col-md-4 col-lg-3">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-primary text-white">
                                                    <h4 class="mb-0">Chats</h4>
                                                </div>
                                                <div class="list-group chat-list" id="chatList"
                                                    style="max-height: 500px; overflow-y: auto;">
                                                    {{-- <ul class="list-group list-group-flush">
                                                        @if ($chats->isEmpty())
                                                            <!-- If no chats found, show all users -->
                                                            @foreach ($users as $user)
                                                                <li
                                                                    class="list-group-item d-flex align-items-center chat-item">
                                                                    <img src="{{ asset('storage/' . $user->picture) }}"
                                                                        class="profile_img rounded-circle mr-3"
                                                                        style="width: 40px; height: 40px;"
                                                                        alt="Profile Picture">
                                                                    <div class="profile_info">
                                                                        <span
                                                                            class="profile_name font-weight-bold">{{ $user->name }}</span>
                                                                        <span class="id"
                                                                        style="display: none;">{{ $user->id }}</span>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <!-- If chats are found, display chat profiles -->
                                                            @foreach ($chats as $chat)
                                                                <li
                                                                    class="list-group-item d-flex align-items-center chat-item">
                                                                    @if ($chat->sender_id == session('LoggedAdminInfo'))
                                                                        <!-- Display receiver profile -->
                                                                        @if ($chat->receiver)
                                                                            <img src="{{ asset('storage/' . $chat->receiver->picture) }}"
                                                                                class="profile_img rounded-circle mr-3"
                                                                                style="width: 40px; height: 40px;"
                                                                                alt="Profile Picture">
                                                                            <div class="profile_info">
                                                                                <span
                                                                                    class="profile_name font-weight-bold">{{ $chat->receiver->name }}</span>
                                                                            </div>
                                                                        @else
                                                                            <div class="profile_info">
                                                                                <span
                                                                                    class="profile_name font-weight-bold">Receiver
                                                                                    not found</span>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <!-- Display sender profile -->
                                                                        @if ($chat->sender)
                                                                            <img src="{{ asset('storage/' . $chat->sender->picture) }}"
                                                                                class="profile_img rounded-circle mr-3"
                                                                                style="width: 40px; height: 40px;"
                                                                                alt="Profile Picture">
                                                                            <div class="profile_info">
                                                                                <span
                                                                                    class="profile_name font-weight-bold">{{ $chat->sender->name }}</span>
                                                                            </div>
                                                                        @else
                                                                            <div class="profile_info">
                                                                                <span
                                                                                    class="profile_name font-weight-bold">Sender
                                                                                    not found</span>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                    <span class="id"
                                                                        style="display: none;">{{ $chat->sender_id == session('LoggedAdminInfo') ? $chat->receiver_id : $chat->sender_id }}</span>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul> --}}
                                                    <ul class="list-group list-group-flush">
                                                        @if ($chats->isEmpty())
                                                            <!-- If no chats found, show all users -->
                                                            @foreach ($users as $user)
                                                                <li
                                                                    class="list-group-item d-flex align-items-center chat-item">
                                                                    <!-- Initial Circle -->
                                                                    <div class="profile_img rounded-circle bg-primary text-white d-flex justify-content-center align-items-center mr-3"
                                                                        style="width: 40px; height: 40px; font-weight: bold; font-size: 18px;">
                                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                                    </div>
                                                                    <div class="profile_info">
                                                                        <span
                                                                            class="profile_name font-weight-bold">{{ $user->name }}</span>
                                                                        <span class="id"
                                                                            style="display: none;">{{ $user->id }}</span>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <!-- If chats are found, display chat profiles -->
                                                            @foreach ($chats as $chat)
                                                                <li
                                                                    class="list-group-item d-flex align-items-center chat-item">
                                                                    @php
                                                                        $isSender =
                                                                            $chat->sender_id ==
                                                                            session('LoggedAdminInfo');
                                                                        $profile = $isSender
                                                                            ? $chat->receiver
                                                                            : $chat->sender;
                                                                        $name = $profile ? $profile->name : 'N/A';
                                                                        $initial = $profile
                                                                            ? strtoupper(substr($profile->name, 0, 1))
                                                                            : '?';
                                                                        $userId = $isSender
                                                                            ? $chat->receiver_id
                                                                            : $chat->sender_id;
                                                                    @endphp

                                                                    <!-- Initial Circle -->
                                                                    <div class="profile_img rounded-circle bg-primary text-white d-flex justify-content-center align-items-center mr-3"
                                                                        style="width: 40px; height: 40px; font-weight: bold; font-size: 18px;">
                                                                        {{ $initial }}
                                                                    </div>

                                                                    <div class="profile_info">
                                                                        <span
                                                                            class="profile_name font-weight-bold">{{ $name }}</span>
                                                                    </div>

                                                                    <span class="id"
                                                                        style="display: none;">{{ $userId }}</span>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right column: Chat area -->
                                        <div class="col-md-8 col-lg-9">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-primary text-white">
                                                    <div class="d-flex align-items-center">
                                                        <img id="chat_img" src="" class="rounded-circle mr-3"
                                                            alt="Profile Picture" style="width: 40px; height: 40px;">
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
                                                            <button class="btn btn-primary" type="submit"
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
        <!-- JavaScript to handle profile card click -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
        {{-- <script>
            // Initialize Pusher
            var pusher = new Pusher('b15fdeae7d2ee2b94509', {
                cluster: 'ap2',
                encrypted: true
            });

            // Subscribe to the channel
            var channel = pusher.subscribe('admin-messages');

            // Bind to the event
            channel.bind('user-message', function(data) { // Updated event name to 'user-message'
                console.log('Message received:', data);

                if (data && data.message) {
                    let messageText = data.message;
                    let senderName = data.user.name; // Updated to access user name
                    let senderImage = data.user.image; // Updated to access user image
                    let messageTime = new Date(data.created_at).toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    // Create message HTML with proper asset URL
                    let messageHtml = `
                <div class="chat-message">
                    <div class="message-avatar">
                        <img src="${senderImage}" class="rounded-circle" alt="${senderName} Avatar">
                    </div>
                    <div class="message-content">
                        <p><strong>${senderName}:</strong> ${messageText}</p>
                        <div class="timestamp">${messageTime}</div>
                    </div>
                </div>`;

                    // Append message to chat container
                    $('#chatMessageContainer').append(messageHtml);

                    // Scroll to the bottom of the chat container
                    $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0].scrollHeight);
                } else {
                    console.error('Message data is missing or invalid.');
                }
            });
        </script> --}}
        <script>
            // Initialize Pusher
            var pusher = new Pusher('b15fdeae7d2ee2b94509', {
                cluster: 'ap2',
                encrypted: true
            });

            // Subscribe to the channel
            var channel = pusher.subscribe('admin-messages');

            // Bind to the event
            channel.bind('user-message', function(data) {
                console.log('Message received:', data);

                if (data && data.message) {
                    let messageText = data.message;
                    let senderName = data.user.name || 'U';
                    let messageTime = new Date(data.created_at).toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    // Get the initial
                    let initial = senderName.charAt(0).toUpperCase();

                    // Create message HTML with initial in a circle
                    let messageHtml = `
                        <div class="chat-message d-flex align-items-start mb-2">
                            <div class="message-avatar rounded-circle bg-primary text-white d-flex justify-content-center align-items-center mr-2"
                                 style="width: 40px; height: 40px; font-weight: bold; font-size: 18px;">
                                ${initial}
                            </div>
                            <div class="message-content">
                                <p class="mb-1"><strong>${senderName}:</strong> ${messageText}</p>
                                <div class="timestamp text-muted" style="font-size: 12px;">${messageTime}</div>
                            </div>
                        </div>`;

                    // Append to container
                    $('#chatMessageContainer').append(messageHtml);

                    // Scroll to bottom
                    $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0].scrollHeight);
                } else {
                    console.error('Message data is missing or invalid.');
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                // Function to handle chat item click
                function handleChatItemClick() {
                    // Remove the active class from all chat items
                    $('.chat-item').removeClass('active');

                    // Add the active class to the clicked chat item
                    $(this).addClass('active');

                    let profileImage = $(this).find('.profile_img').attr('src');
                    let profileName = $(this).find('.profile_name').text();
                    let receiverId = $(this).find('.id').text();

                    // Set receiver details in the chat area
                    $('#receiver_id').val(receiverId);
                    $('#chat_img').attr('src', profileImage);
                    $('#chat_name').text('Chatting with ' + profileName);

                    // Fetch chat messages for the selected user
                    $.ajax({
                        url: '{{ route('admin.fetchMessages') }}',
                        method: 'GET',
                        data: {
                            receiver_id: receiverId
                        },
                        success: function(response) {
                            $('#chatMessageContainer').empty(); // Clear the chat container

                            // Populate chat with fetched messages
                            response.messages.forEach(function(message) {
                                let isSender = message.sender_id ==
                                    '{{ session('LoggedAdminInfo') }}';
                                let userAvatar = isSender ?
                                    '{{ asset('storage/' . $LoggedAdminInfo->picture) }}' :
                                    profileImage;
                                let userName = isSender ? '{{ $LoggedAdminInfo->name }}' :
                                    profileName;

                                let messageTime = new Date(message.created_at).toLocaleTimeString(
                                    [], {
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    });

                                let messageHtml = `
                        <div class="chat-message ${isSender ? 'sender' : 'receiver'}">
                           
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
                }

                // Attach the click event to chat items
                $(document).on('click', '.chat-item', handleChatItemClick);

                // Event listener for sending a message
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
                        url: '{{ route('admin.sendMessage') }}',
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
                                    '{{ asset('storage/' . $LoggedAdminInfo->picture) }}';
                                let userName = '{{ $LoggedAdminInfo->name }}';

                                let messageTime = new Date().toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

                                let messageHtml = `
                        <div class="chat-message sender">
                           
                            <div class="message-content">
                                <p><strong>${userName}:</strong> ${message}</p>
                                <div class="timestamp">${messageTime}</div>
                            </div>
                        </div>`;

                                $('#chatMessageContainer').append(messageHtml);
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
