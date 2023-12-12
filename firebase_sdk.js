// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBCTagXyz4i1s125lpZQQD1cY1lJymb0Yg",
    authDomain: "iot-dacn.firebaseapp.com",
    projectId: "iot-dacn",
    storageBucket: "iot-dacn.appspot.com",
    messagingSenderId: "812533952307",
    appId: "1:812533952307:web:392ae6d9b5e6dbe1ca9846",
    measurementId: "G-BW5N645DX8",
    databaseURL: "https://iot-dacn-default-rtdb.firebaseio.com/"
};



// Initialize Firebase
firebase.initializeApp(firebaseConfig);

var database = firebase.database();


// get data from home page
document.addEventListener("DOMContentLoaded", function() {
    // Get references to the switches
    var fan_switch = document.getElementById("fan-switch");
    var manual_switch = document.getElementById("manual-switch");
    var buzzer_switch = document.getElementById("buzzer-switch");
    var fan_state = document.getElementById("fan-state");
    var manual_state = document.getElementById("manual-state");
    var buzzer_state = document.getElementById("buzzer-state");

    var fan_box = document.getElementById("fan-switch").parentNode;
    var buzzer_box = document.getElementById("buzzer-switch").parentNode;
   // Add event listeners for when the switches change
    fan_switch.addEventListener("change", function(event) {
        var fan_status = event.target.checked ? 1 : 0;
        database.ref("/Board_IoT/FAN").set(fan_status);
    });

    manual_switch.addEventListener("change", function(event) {
        var manual_status = event.target.checked ? 1 : 0;
        database.ref("/Board_IoT/MANUAL").set(manual_status);
    });

    buzzer_switch.addEventListener("change", function(event) {
        var buzzer_status = event.target.checked ? 1 : 0;
        database.ref("/Board_IoT/BUZZER").set(buzzer_status);
    });

    // Get value from database whenever it changes
    database.ref("/Board_IoT/TEMPERATURE").on("value", function(snapshot) {
        var temp = snapshot.val();
        document.getElementById("temp").innerHTML = temp + "°C";
    });

    database.ref("/Board_IoT/HUMIDITY").on("value", function(snapshot) {
        var humid = snapshot.val();
        document.getElementById("humid").innerHTML = humid + "%";
    });

    database.ref("/Board_IoT/AIR_Q").on("value", function(snapshot) {
        var air_q = snapshot.val();
        document.getElementById("air-q").innerHTML = air_q + "ppm";
    });

    database.ref("/Board_IoT/FAN").on("value", function(snapshot) {
        var fan_status = snapshot.val();
        fan_switch.checked = fan_status === 1;
        if (fan_status === 1) {
            fan_state.textContent = "ON";
        } else {
            fan_state.textContent = "OFF";
        }
    });

    database.ref("/Board_IoT/MANUAL").on("value", function(snapshot) {
        var manual_status = snapshot.val();
        manual_switch.checked = manual_status === 1;
        if (manual_status === 1) {
            fan_switch.disabled = true;
            buzzer_switch.disabled = true;
            manual_state.textContent = "ON";
            buzzer_box.style.background = "#adb3cc"
            fan_box.style.background = "#adb3cc"
        } else {
            fan_switch.disabled = false;
            buzzer_switch.disabled = false;
            manual_state.textContent = "OFF";
            buzzer_box.style.background = "#f99f93"
            fan_box.style.background = "#f99f93"
        }
    });

    database.ref("/Board_IoT/BUZZER").on("value", function(snapshot) {
        var buzzer_status = snapshot.val();
        buzzer_switch.checked = buzzer_status === 1;
        if (buzzer_status === 1) {
            buzzer_state.textContent = "ON";
        } else {
            buzzer_state.textContent = "OFF";
        }
    });

});