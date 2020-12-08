<?php
include('header.php');
include('database.php');
?>
        
        <link rel="stylesheet" type="text/css" href="css/genericArticle.css">
        <div>
          <img src="images/doctor_mission.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
        </div>
          
        <!-- content start-->
            <div class="mainHeader">
              <img src="images/hbline.png"/>
              <h1>Mission</h1>
            </div>
            
              <div id="mainContent" class="mainContent">
                <!--Begin Content-->
                    <p>
                        <img src="images/doctor_surgery.jpg" alt="Doctor" id="imgfloat" class="floatright" style="float:right;">
                        What is the Doctor’s Mission? This is an issue worth seriously considering and studying. Doctor’s Mission
                        refers to the fundamental reason for the existence of
                        doctors, also means major responsibilities the doctors
                        assume. For thousands of years, in terms of Doctor’s
                        Mission there were a lot of descriptions, such as “health
                        guard”, “angel in white”, “heal the wounded and rescue the
                        dying, practice medicine in order to help the people” and
                        so on, but we have not yet found an accurate definition.<br/><br/>
                        Through careful and long-term thinking, this author held:
                        Doctor’s Mission is to cure the sickness to save the patient.
                        This is a summary of Doctor’s Mission, which consists of
                        three aspects and three levels, namely, medical science
                        research, medical education and diagnosis and treatment of
                        patient. In accordance with the definition of Doctor’s
                        Mission, doctors can be divided into four types, namely:
                        clinical, teaching, scientific research and omnipotent.
                    </p>
                </div>
                    <div class="mainHeader">
                      <img src="images/hbline.png"/>
                      <h1>Our values</h1>
                    </div>
                    <div id="mainContent" class="mainContent">
                    <ul>
                      <LI>Providing excellence in medical and surgical care </LI>
                      <LI>Treating every patient as a valued individual, honoring their humanity </LI>
                      <LI>Team commitment to communication, diversity and respect </LI>
                      <LI>Being the leader in physician and healthcare advocacy throughout our community </LI>
                    </ul>
                    </div>
                    <div class="mainHeader">
                      <img src="images/hbline.png"/>
                      <h2>Our Mission Song</h2>
                    </div>
                    <div id="mainContent" class="mainContent" style="text-align:center">
                      <button id='btnSpeak'>Play</button> <button id='stopButton'>Stop</button>
                        <div id='song'>
                         Give your heart to the medical profession Give your life in dedication<br/>
                         Share your love and your hope<br/>
                         Share your faith in life<br/>
                         for good health<br/>
                         Our best we will try<br/>
                         We will work hand in hand<br/>
                         with the oath in our hearts<br/>
                         Make the practice a more human art We will ask We will search<br/>
                         We'll excel, be alert<br/>
                         Serve the people of Hong Kong<br/>
                         Let us dream Let us learn<br/>
                         Let us strive to make the world go on better Let's concern!<br/>
                        </div>
                    </div>
                    <br>
                    <h3>Community Scheme</h3>
                    <div class="styleTable  styleFirstRow">
                      <table width="100%">
                         <tr>
                           <td valign="top" width="60%"><a href="https://www.thkma.org/home.php" rel="external">The HKMA WEBSITE</a></td>
                          <td valign="top" width="60%"><iframe src="https://www.youtube.com/embed/_uSJ-Y0ey_0?wmode=transparent" frameborder="0" allowfullscreen height="280px" width="500px"></iframe></td>
                        </tr>
                      </table>
                    </div>
                    
                    
                    
    <script>
        var txtInput = document.querySelector('#txtInput');
        var btnSpeak = document.querySelector('#btnSpeak');
        var stopButton = document.querySelector('#stopButton');
        
        var synth = window.speechSynthesis;
        var u = new SpeechSynthesisUtterance();
        u.lang = 'zh-HK';
        u.text = document.getElementById('song').innerText;
        btnSpeak.addEventListener("click", function(){
          synth.speak(u);
        });
        
        function toggle(startOver = true) {
          synth.cancel();
          if(startOver) {
            synth.speak(u);
          }
        }
        stopButton.addEventListener('click', toggle.bind(null, false));
        
        u.addEventListener('start', function(event) {
          document.getElementById('btnSpeak').disabled = true;
        })
        
        stopButton.addEventListener('click', function(event) {
          document.getElementById('btnSpeak').disabled = false;
        })
        
        function toggle(startOver = true) {
                synth.cancel();
                if(startOver) {
                  synth.speak(u);
                }
        }
        window.addEventListener('load', toggle.bind(null, false));
    </script>

<?php
include_once('footer.php');
?>