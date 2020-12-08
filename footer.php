</div>
<?php
session_start()
?>
<div id="footer">
    <!-- Footer Here -->
    
    <!-- Start of Pop-up voice recognition -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div style="margin:auto; color:#777777; font-size:40px; margin-bottom:10px; margin-top:50px; text-align:center" id="voicetext">Listening...</div>
              <div class="modal-body" style="margin:auto;  text-align:center">
                <div class="google-loader" id="google-loader">
                  <div class="dot blue"></div>
                  <div class="dot red"></div>
                  <div class="dot yellow"></div>
                  <div class="dot green"></div>
                </div>
                <button type='button' class='btnvoice modalbtn' onclick='record()' id='voicebtnmodal' style='visibility:hidden; margin-bottom:50px'><i class='fa fa-microphone' style='font-size:25px;color:white;text-align:center'></i></button>
              </div>
            </div>
          </div>
        </div>
    <!-- End of Pop-up voice recognition -->
    
    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btnvoice float" onclick="record()" id="voicebtn" style="z-index: 1;"><i class="fa fa-microphone" style="font-size:25px;color:white;text-align:center"></i></button>
    
</div>
<!-- Start of Bootstrap javaScript -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- End of Bootstrap javaScript -->
<!-- Below is the script for voice recognition and conversion to text-->
<script>
    function record() {
        document.getElementById('voicebtnmodal').style.visibility = 'hidden';
        document.getElementById('google-loader').hidden = false;
        document.getElementById('voicetext').innerHTML = "Listening...";
        if (!('webkitSpeechRecognition' in window)) {
          document.getElementById('voicebtn').setAttribute("data-target","#")
          alert("Voice recognition is only supported on Chrome version 25 or above");
        } else {
			
          var recognition = new webkitSpeechRecognition();
          recognition.lang = "zh-hk";
          
          recognition.onaudiostart = function() {
            recognition.onresult = function(event) {
              document.getElementById('voicetext').innerHTML = event.results[0][0].transcript;
              console.log(event.results[0][0].transcript)
                if (["knowledge","knowledge base","知識","我想學多啲嘢"].includes(event.results[0][0].transcript)) {window.location.href="knowledge.php";}
                else if (["home","主頁","homepage"].includes(event.results[0][0].transcript)) {window.location.href="index.php";}
                else if (["login","登入"].includes(event.results[0][0].transcript)) {window.location.href="login.php";}
                else if (["logout","登出"].includes(event.results[0][0].transcript)) {if (confirm('Want to logout?')) {window.location.href="logout.php"};}
                else if (["registration","Sign up","註冊"].includes(event.results[0][0].transcript)) {window.location.href="registration.php";}
                else if (["questionnaire","問卷"].includes(event.results[0][0].transcript)) {window.location.href="questionnaire.php";}
                else if (["mission","宗旨","使命"].includes(event.results[0][0].transcript)) {window.location.href="mission.php";}
                else if (["contact","contact us","聯絡我們","聯繫我們"].includes(event.results[0][0].transcript)) {window.location.href="contact.php";}
                else if (event.results[0][0].transcript == "phpmyadmin") {window.open("/phpmyadmin/index.php","_blank");} // Just for convenience [need del]
                else {
                  document.getElementById('google-loader').hidden = true;
                  document.getElementById('voicetext').innerHTML = event.results[0][0].transcript + "<p>I don't know the command<br>Please try again with press the button</p>";
                  document.getElementById('voicebtnmodal').style.visibility = 'visible';
                }
            }
          }

          recognition.onend = function(event) {
            recognition.stop();
            console.log('Speech recognition has stopped.');
              if (document.getElementById('voicetext').innerHTML=="Listening...") {
                document.getElementById('google-loader').hidden = true;
                console.log("Say something");
                document.getElementById('voicetext').innerHTML = "<p>Try to Say Something<br>Press the button and speak</p>";
                document.getElementById('voicebtnmodal').style.visibility = 'visible';
              }
          }

          recognition.start();
          
          $('#exampleModal').on('hidden.bs.modal', function (e) {
            recognition.stop();
          })
        }
    }
</script>
<!-- end of script -->
</body>
</html>