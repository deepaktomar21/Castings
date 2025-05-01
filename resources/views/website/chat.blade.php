@extends('website.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Chat blade -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Chat with {{ $receiver->name }}
                    </div>

                    <div class="card-body" id="chat-box" style="height: 300px; overflow-y: auto;">
                        <!-- Messages will appear here -->
                    </div>

                    <div class="card-footer d-flex">
                        <input type="text" id="message" class="form-control me-2" placeholder="Type your message...">
                        <button onclick="sendMsg()" class="btn btn-success">Send</button>
                    </div>
                </div>

                <!-- Notification Area -->
                <div id="notification-area" class="mt-3 alert alert-info d-none">
                    🔔 <span id="notification-text"></span>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

   
@endsection
