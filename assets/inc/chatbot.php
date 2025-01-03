<!--====== CHATBOT-API START ======-->
<?php include 'assets/chat-api/api.php'; ?>
<!--====== CHATBOT-API END ======-->

<?php
  if(isset($_SESSION["s_user_id"])){
    $user_id = $_SESSION["s_user_id"];
    $sql = "SELECT * FROM chats WHERE USER_ID = $user_id ORDER BY ID ASC";
    $result = mysqli_query($conn, $sql);
  }
    
?>



<!-- Main chatbot container -->
<div id="chatbot" class="main-card main-card-collapsed">

  <!-- Toggle button to expand/collapse the chatbot -->
  <button id="chatbot_toggle">
    <!-- SVG icon for the collapsed state (chatbot icon) -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
      <path d="M0 0h24v24H0V0z" fill="none" />
      <path d="M15 4v7H5.17l-.59.59-.58.58V4h11m1-2H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm5 4h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1z" />
    </svg>
    <!-- SVG icon for the expanded state (close icon) -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="display:none">
      <path d="M0 0h24v24H0V0z" fill="none" />
      <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
    </svg>
  </button>

  <!-- Header section for the chatbot -->
  <div class="main-title">
    <div>
      <!-- SVG icon for the chatbot robot -->
      <svg viewBox="0 0 640 512" title="robot">
        <path fill="currentColor" d="M32,224H64V416H32A31.96166,31.96166,0,0,1,0,384V256A31.96166,31.96166,0,0,1,32,224Zm512-48V448a64.06328,64.06328,0,0,1-64,64H160a64.06328,64.06328,0,0,1-64-64V176a79.974,79.974,0,0,1,80-80H288V32a32,32,0,0,1,64,0V96H464A79.974,79.974,0,0,1,544,176ZM264,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,264,256Zm-8,128H192v32h64Zm96,0H288v32h64ZM456,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,456,256Zm-8,128H384v32h64ZM640,256V384a31.96166,31.96166,0,0,1-32,32H576V224h32A31.96166,31.96166,0,0,1,640,256Z" />
      </svg>
    </div>
    <span>Eco Chatbot</span>
  </div>

  <!-- Chat area where messages are displayed -->
  <div class="chat-area" id="message-box">
  <?php if(isset($_SESSION["s_user_id"])){ foreach($result as $row){ ?>
    <div class="chat-message-div"><span style="flex-grow:1"></span>
      <div class="chat-message-sent"><?= $row["MESSAGE"]; ?></div>
    </div>
    <div class="chat-message-div">
      <div class="chat-message-received"><?= $row["REPLAY"]; ?></div>
    </div>
    <?php }}else{ ?>
      <div class="text-center m-auto">
        <img src="assets/img/business-3d-tech-support.png" alt="image not found" />
        <legend class="text-secondary">You Must Login To Use ChatBot</legend>
        <a class="btn btn-outline-primary" href="auth.php">Sign Up</a>
      </div>
      <?php } ?>
  </div>




  <!-- Divider line -->
  <div class="line"></div>

  <!-- Input area for typing and sending messages -->
  <form class="input-div" method="POST">
    <!-- Input field for the user message -->
    <input id="chat-input" class="input-message" type="text" name="message" placeholder="Type your message ..." />
    <!-- Button to send the message -->
    <button id="btn-send" class="input-send" type="submit" name="send" disabled>
      <!-- SVG icon for the send button -->
      <svg style="width:24px;height:24px">
        <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
      </svg>
    </button>
  </form>

</div>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>