<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="icon" href="favicon/main.ico" type="image/x-icon">
      
      <title>Admin page | IoT</title>

      <!-- sdk link  -->
      <script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
      <script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-database.js"></script>
      <!-- custom js file link  -->
      <script src="firebase_sdk.js"></script>
      


   </head>

   <body>
      
      <div class="container">
         <div class="content">
            <h3>Hi, <span>admin</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <a href="logout.php" class="btn">logout</a>
            <p style="margin-top: 20px;
                     font-size: 30px;">These are status of our IoT system</p>   
         </div>
      </div>

      <div class="boxes">
         <div class="box">
            <h3>FAN: <span id="fan-state"></span></h3>
            <input type="checkbox" id="fan-switch" class="switch-input" disabled>
            <label for="fan-switch" class="switch-label"></label>
         </div>
         <div class="box">
            <h3>MODE: <span id="manual-state"></span></h3>
            <input type="checkbox" id="manual-switch" class="switch-input" >
            <label for="manual-switch" class="switch-label"></label>
         </div>
         <div class="box">
            <h3>BUZZER: <span id="buzzer-state"></span></h3>
            <input type="checkbox" id="buzzer-switch" class="switch-input" disabled>
            <label for="buzzer-switch" class="switch-label"></label>
         </div>

      </div>

      <div class="boxes2">
         <div class="box">
            <h3>HUMIDITY</h3>
            <h1><span id="humid">00</span></h1>
            <h4>THRESHOLD</h4>
            <div class="input-group">
               <span class="change-btn" id="humid-minus">-</span>
               <span class="num" id="humid-thresh-num">00</span>
               <span class="change-btn" id="humid-plus">+</span>
            </div>
         </div>
         <div class="box">
            <h3>TEMPERATURE</h3>
            <h1><span id="temp">00</span></h1>
            <h4>THRESHOLD</h4>
            <div class="input-group">
               <span class="change-btn" id="temp-minus">-</span>
               <span class="num" id="temp-thresh-num">00</span>
               <span class="change-btn" id="temp-plus">+</span>
            </div>
         </div>
         <div class="box">
            <h3>AIR QUALITY</h3>
            <h1><span id="air-q">00</span></h1>
            <h4>THRESHOLD</h4>
            <div class="input-group">
               <span class="change-btn" id="airq-minus">-</span>
               <span class="num" id="airq-thresh-num">00</span>
               <span class="change-btn" id="airq-plus">+</span>
            </div>
         </div>
         <div class="box">
            <h3>GAS DETECTION</h3>
            <h1><span id="gas">00</span></h1>
            <h4>THRESHOLD</h4>
            <div class="input-group">
               <span class="change-btn" id="gas-minus">-</span>
               <span class="num" id="gas-thresh-num">00</span>
               <span class="change-btn" id="gas-plus">+</span>
         </div>
      </div>

   </body>
</html>