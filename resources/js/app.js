Echo.private('chat.' + userId)  // userId should be the logged-in user's ID
    .listen('MessageSent', (event) => {
        console.log(event.message);
        // Display the message in your chat UI
    });
