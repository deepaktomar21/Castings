@extends('website.layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }

        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7
        }

        .chat-app .chat {
            margin-left: 280px;
            border-left: 1px solid #eaeaea
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer
        }

        .people-list .chat-list li.active {
            background: #efefef
        }

        .people-list .chat-list li .name {
            font-size: 15px
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%
        }

        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: #efefef
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }

            .chat-app .people-list.open {
                left: 0
            }

            .chat-app .chat {
                margin: 0
            }

            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }
    </style>



    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    {{-- <div class="container py-4">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search user..." id="search-user">
                        </div>
                    </div>
                    <ul class="list-group list-group-flush" id="user-list">
                        @foreach ($users as $user)
                            <li class="list-group-item d-flex align-items-center user-item" data-user-id="{{ $user->id }}" data-name="{{ $user->name }}" data-avatar="{{ $user->avatar }}">
                                <img src="{{ $user->avatar ?? asset('default-avatar.png') }}" class="rounded-circle me-2" width="40" height="40" alt="Avatar">
                                <div>
                                    <div class="fw-bold">{{ $user->name }}</div>
                                    <small class="text-muted"><i class="fa fa-circle {{ $user->is_online ? 'text-success' : 'text-secondary' }}"></i> {{ $user->is_online ? 'Online' : 'Offline' }}</small>
                                </div>
                            </li>
                        @endforeach
                        @foreach ($users as $user)
    <li class="clearfix" data-user-id="{{ $user->id }}">
        <img src="{{ $user->avatar }}" alt="avatar">
        <div class="about">
            <div class="name">
                {{ $user->name }}
                @if ($user->unread_count > 0)
                    <span class="badge badge-danger">{{ $user->unread_count }}</span>
                @endif
            </div>
            <div class="status">
                <i class="fa fa-circle {{ $user->is_online ? 'online' : 'offline' }}"></i>
                {{ $user->is_online ? 'online' : 'offline' }}
            </div>
        </div>
    </li>
@endforeach

                    </ul>
                </div>
            </div>
    
            <div class="col-lg-8 col-md-7">
                <div class="card h-100 d-flex flex-column" id="chat-box" style="display: none;">
                    <div class="card-header bg-light d-flex align-items-center">
                        <img src="" class="rounded-circle me-2" width="40" height="40" id="chat-avatar">
                        <div>
                            <h6 class="mb-0" id="chat-name"></h6>
                            <small id="chat-last-seen">Last seen: --</small>
                        </div>
                    </div>
    
                    <div class="card-body overflow-auto" id="message-list" style="height: 400px;">
                        <ul class="list-unstyled mb-0"></ul>
                    </div>
    
                    <div class="card-footer border-top">
                        <div class="input-group">
                            <input type="text" id="message-input" class="form-control" placeholder="Enter message...">
                            <button class="btn btn-primary" id="send-message"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container py-4">
        <div class="row clearfix">
            <!-- User List Panel -->
            <div class="col-lg-4 col-md-5">
                <div class="card h-100">
                    <div class="card-header bg-light">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search user..." id="search-user">
                        </div>
                    </div>
                    {{-- <ul class="list-group list-group-flush overflow-auto" style="max-height: 500px;" id="user-list">
                        @foreach ($users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center user-item" 
                                data-user-id="{{ $user->id }}" 
                                data-name="{{ $user->name }}" 
                                data-avatar="{{ $user->avatar ?? asset('default-avatar.png') }}">
                                
                                <div class="d-flex align-items-center">
                                    <img src="{{ $user->avatar ?? asset('default-avatar.png') }}" class="rounded-circle me-2" width="40" height="40" alt="Avatar">
                                    <div>
                                        <div class="fw-bold">{{ $user->name }}</div>
                                        <small class="text-muted">
                                            <i class="fa fa-circle {{ $user->is_online ? 'text-success' : 'text-secondary' }}"></i> 
                                            {{ $user->is_online ? 'Online' : 'Offline' }}
                                        </small>
                                    </div>
                                </div>
    
                                @if (!empty($user->unread_count) && $user->unread_count > 0)
                                    <span class="badge bg-danger rounded-pill">{{ $user->unread_count }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul> --}}
                    <ul class="list-group list-group-flush" id="user-list">
                        @foreach ($users as $user)
                            <li class="list-group-item d-flex align-items-center user-item"
                                data-user-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                data-avatar="{{ $user->avatar }}">
                                <img src="{{ $user->avatar ?? asset('default-avatar.png') }}" class="rounded-circle me-2"
                                    width="40" height="40" alt="Avatar">
                                <div>
                                    <div class="fw-bold">{{ $user->name }}</div>
                                    @if ($user->unread_count > 0)
                                        <span class="badge bg-danger rounded-pill">{{ $user->unread_count }}</span>
                                    @endif
                                    <small class="text-muted">
                                        <i
                                            class="fa fa-circle {{ $user->is_online ? 'text-success' : 'text-secondary' }}"></i>
                                        {{ $user->is_online ? 'Online' : 'Offline' }}
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            <!-- Chat Box -->
            <div class="col-lg-8 col-md-7">
                <div class="card h-100 d-flex flex-column" id="chat-box" style="display: none;">
                    <div class="card-header bg-light d-flex align-items-center">
                        <img src="" class="rounded-circle me-2" width="40" height="40" id="chat-avatar">
                        <div>
                            <h6 class="mb-0" id="chat-name"></h6>
                            <small id="chat-last-seen">Last seen: --</small>
                        </div>
                    </div>

                    <div class="card-body overflow-auto" id="message-list" style="height: 400px;">
                        <ul class="list-unstyled mb-0"></ul>
                    </div>

                    <div class="card-footer border-top">
                        <div class="input-group">
                            <input type="text" id="message-input" class="form-control" placeholder="Enter message...">
                            <button class="btn btn-primary" id="send-message"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const users = document.querySelectorAll('.user-item');
            const chatBox = document.getElementById('chat-box');
            const chatName = document.getElementById('chat-name');
            const chatAvatar = document.getElementById('chat-avatar');
            const chatLastSeen = document.getElementById('chat-last-seen');
            const messageList = document.querySelector('#message-list ul');
            let currentUserId = null;

            users.forEach(user => {
                user.addEventListener('click', function() {
                    const name = this.dataset.name;
                    const avatar = this.dataset.avatar;
                    currentUserId = this.dataset.userId;

                    chatName.textContent = name;
                    chatAvatar.src = avatar;
                    chatLastSeen.textContent = 'Last seen: a few moments ago';
                    chatBox.style.display = 'flex';

                    // Clear chat and fetch messages
                    messageList.innerHTML = '';
                    fetch(`/chat/${currentUserId}/messages`)
                        .then(res => res.json())
                        .then(messages => {
                            messages.forEach(msg => {
                                const alignment = msg.from_user_id ==
                                    {{ Auth::id() }} ? 'text-end' : 'text-start';
                                const badgeClass = msg.from_user_id ==
                                    {{ Auth::id() }} ? 'bg-primary' : 'bg-secondary';
                                messageList.innerHTML += `
                                    <li class="mb-2">
                                        <div class="${alignment}">
                                            <span class="badge ${badgeClass}">${msg.message}</span>
                                        </div>
                                    </li>
                                `;
                            });
                            document.getElementById('message-list').scrollTop = messageList
                                .scrollHeight;
                        });
                });
            });

            document.getElementById('send-message').addEventListener('click', function() {
                const message = document.getElementById('message-input').value.trim();
                if (!message || !currentUserId) return;

                fetch('/send-message', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            message: message,
                            to_user_id: currentUserId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            messageList.innerHTML += `
                            <li class="mb-2">
                                <div class="text-end">
                                    <span class="badge bg-primary">${message}</span>
                                </div>
                            </li>
                        `;
                            document.getElementById('message-input').value = '';
                            document.getElementById('message-list').scrollTop = messageList
                                .scrollHeight;
                        }
                    });
            });
        });

        let selectedUserId = null;

        function fetchMessages() {
            if (!selectedUserId) return;

            fetch(`/chat/${selectedUserId}/messages`)
                .then(response => response.json())
                .then(data => {
                    const messageList = document.getElementById("message-list");
                    messageList.innerHTML = '';
                    data.forEach(msg => {
                        const li = document.createElement("li");
                        li.className = msg.from_user_id === CURRENT_USER_ID ? "sent" : "received";
                        li.innerHTML = `<div class="message">${msg.message}</div>`;
                        messageList.appendChild(li);
                    });

                    // Scroll to bottom
                    messageList.scrollTop = messageList.scrollHeight;
                });
        }
    </script>
<script type="module">
  
    const firebaseConfig = {
      apiKey: "AIzaSyD52-3NhfFdSXBij1h4UvQdGe78s-HJJD4",
      authDomain: "casting-a3efc.firebaseapp.com",
      projectId: "casting-a3efc",
      storageBucket: "casting-a3efc.firebasestorage.app",
      messagingSenderId: "1061448001736",
      appId: "1:1061448001736:web:5ebb3d88d31c3ab85b1dfd",
      measurementId: "G-Z623DPXXZE"
    };
  
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
  </script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.10.0/dist/echo.iife.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>



    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
