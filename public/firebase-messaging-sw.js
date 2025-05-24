// firebase-messaging-sw.js
importScripts('https://www.gstatic.com/firebasejs/9.6.11/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.6.11/firebase-messaging-compat.js');

firebase.initializeApp({
    apiKey: "AIzaSyD52-3NhfFdSXBij1h4UvQdGe78s-HJJD4",
    authDomain: "casting-a3efc.firebaseapp.com",
    projectId: "casting-a3efc",
    storageBucket: "casting-a3efc.appspot.com",
    messagingSenderId: "1061448001736",
    appId: "1:1061448001736:web:5ebb3d88d31c3ab85b1dfd",
    measurementId: "G-Z623DPXXZE"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);

    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: payload.notification.icon
    };

    self.registration.showNotification(notificationTitle, notificationOptions);
});
