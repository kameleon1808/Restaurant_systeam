// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
// import { initializeApp } from "firebase/app";
// import { getAnalytics } from "firebase/analytics";
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyB1Etk64W9KSQC4g2II--xRYFFEHbZk_AI",
    authDomain: "dostava1-aa246.firebaseapp.com",
    projectId: "dostava1-aa246",
    storageBucket: "dostava1-aa246.appspot.com",
    messagingSenderId: "470348757544",
    appId: "1:470348757544:web:f64cfbf09bb7e38368531d",
    measurementId: "G-BFGX1ZD5BG"
});
// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);
// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});