<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../css/chatbot-style.css">

</head>
<body>

    <button class="open-chatbot" onclick="openForm()">ChatBot
    <img src="../img/bot.png" type="img"> </button>
    <div id="chat" class="chat">
        <div class="top">
          <img src="../img/bot.png" type="img">
          <h1>ChatBot</h1>
        </div>
        <div id="messages" class="messages"></div>
          <input id="input" type="text" autocomplete="off" autofocus="true" placeholder="Inserisci un messaggio" name="msg"></textarea>
          <button type="submit" class="btn">
          <img src="../img/send.png" type="img">
          </button>
        <button type="button" class="close" onclick="closeForm()">
        <img src="../img/close.png" type="img"> </button>
    </div>
    
    <!--     <button type="submit" class="btn">
        <img src="../img/send.png" type="img">
      </button>
      <button type="button" class="close" onclick="closeForm()">
      <img src="../img/close.png" type="img"> </button>
    </form> 
</div> -->


<script>
   document .querySelector(".chatBtn") .addEventListener("click", openForm);
   document.querySelector(".close").addEventListener("click", closeForm);
   function openForm() {
      document.querySelector(".chat").style.display = "block";
   }
   function closeForm() {
      document.querySelector(".chat").style.display = "none";
   }
</script>

<script type="text/javascript" src="../php/chatbot/chat.js"></script>
<script type="text/javascript" src="../php/chatbot/answers.js"></script>



</body> 
</html>