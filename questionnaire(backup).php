<?php
include('header.php');
include_once('database.php');
if (isset($_POST['agree-term'])) {
    $instruction = "display:none";
    $questionnairePart1 = "display:block";
} else {
    $instruction = "display:block";
    $questionnairePart1 = "display:none";
}
//if(isset($_POST['p1']))
//	print_r($_POST['p1']);


	$p2 = $_POST['p2'];
	print_r($p2);

setcookie('pmarks', 0);

for ($i=0;$i<30;$i++) {
  $sql = "SELECT * FROM animalAns WHERE animalName like '$p2[$i]'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          echo $row["animalName"];
          $_COOKIE['pmarks'] = $_COOKIE['pmarks'] + 0.5;
          echo $_COOKIE['pmarks'];
      }
  } else {
      echo "0 results";
  } 
}

$final =  $_COOKIE['marks'] + $_COOKIE['pmarks'];
echo $final;


/*	$sql2 = mysqli_query($conn, "SELECT * FROM animalAns;");
    while($row = mysqli_fetch_assoc($sql2)){
        $sqldata[] = $row;
    }
    mysqli_close($conn);
    setcookie("TestCookie",json_encode($sqldata[0]), time()+3500);
    echo json_encode((nvarchar)$sqldata);*/
?>
<script>
  var marks = 0;
</script>
<link rel="stylesheet" type="text/css" href="css/Questionaire.css">
<div class="jumbotron jumbotron-fluid" id="que_header">
  <div class="container" style="padding:auto;">
    <div class="row">
      <div class="col-12">
        <h1 class="display-4 text-center font-weight-bolder">Montreal Cognitive Assessment 5-Minute Protocol (Hong Kong Version)</h1>
      </div>
    </div>
  </div>
</div>
      
<!-- content start-->
<div class="container">
  <div class="row">
    <section id="questionnaire">
      <div class="col-12">
        <h5 class="text-center">Montreal Cognitive Assessment 5-Minute Protocol (Hong Kong Version)</h5>
      </div>
      <div id="objective" style="<?php echo $instruction; ?>">
      <table>
        <tr><td id="intro">The Montreal Cognitive Assessment (MoCA) is a widely used screening assessment for detecting cognitive impairment.</td></tr>
        <tr><td>
        <li>It was created in 1996 by Ziad Nasreddine in Montreal, Quebec.</li>
        <li>It was validated in the setting of mild cognitive impairment, and has subsequently been adopted in numerous other settings clinically.</li>
        <li>MoCA scores range between 0 and 30. A score of 26 or over is considered to be normal. In a study, people without cognitive impairment scored an average of 27.4; people with mild cognitive impairment (MCI) scored an average of 22.1; people with Alzheimer's disease scored an average of 16.2.</li>
        </td></tr>
        <tr><td>The MoCA assesses several cognitive domains:</td></tr>
        <tr>
          <td>
            <ol>
              <li>The short-term memory recall task (5 points) involves two learning trials of five nouns and delayed recall after approximately five minutes.</li>
              <li>Visuospatial abilities are assessed using a clock-drawing task (3 points) and a three-dimensional cube copy (1 point).</li>
              <li>Multiple aspects of executive functions are assessed using an alternation task adapted from the trail-making B task (1 point), a phonemic fluency task (1 point), and a two-item verbal abstraction task (2 points).</li>
              <li>Attention, concentration, and working memory are evaluated using a sustained attention task (target detection using tapping; 1 point), a serial subtraction task (3 points), and digits forward and backward (1 point each).</li>
              <li>Language is assessed using a three-item confrontation naming task with low-familiarity animals (lion, camel, rhinoceros; 3 points), repetition of two syntactically complex sentences (2 points), and the aforementioned fluency task.</li>
              <li>Abstract reasoning is assessed using a describe the similarity task with 2 points being available.
              <li>Finally, orientation to time and place is evaluated by asking the subject for the date and the city in which the test is occurring (6 points).</li>
            </ol>
          </td>
        </tr>
      </table>
      </div>
      <div id="howto" style="<?php echo $instruction; ?>">
        <table>
        <tr><td id="intro">Assessment Instruction</td></tr>
        <tr><td>
          Questionees will be given a questionaire, containing <b><u>four sections</u></b> in total.
        </td></tr>
        <tr><td><ol>
          <li>First section is <b><u>speak-aloud</u></b>, where questionee is required to repeat after the corresponding pronounciation of each word recording (No text of the recording will be shown).</li>
          <li>Second section is <b><u>constructive pronouncing</u></b> of unique animal. Questionee is suggested to pronounce unique animal words as much as possible.</li>
          <li>Third section is <b><u>acknowledge of time and geographic dimension</u></b>. Questionee simply need to tell the date and the place he/she is currently at.</li>
          <li>Last section is the <b><u>delay memorization</u></b>, which is related to the first section. Questionee need to recall the words from the first section respectively, along with their description. Questionees can also tell the similar words if possible.</li>
        </ol></td></tr>
      </table>
      </div>
      
      
      
      <!-- Start of Pop-up message -->
      <div class="modal fade" id="exampleModalCenterx" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterxTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="overflow: hidden">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content center" style="background-color: #F8F9FA;">
                  <div class="modal-body" style="text-align:center">
                    <div id=questionnumber style="display:inline"></div>
                    <div id="p2ans"></div>
                    <button onclick="recordans();"><i class="fas fa-microphone"></i></button><br><br>
                    <button id="back">上一個</button><button id="next">下一個</button>
                  </div>
                  <br>
                  <button type="button" id="popupbtn" class="btn btn-secondary" name="popupbtn" style="width: 100px; margin: auto; background-color: #009688" onclick="document.getElementById('popupbtn').setAttribute('data-dismiss', 'modal');">關閉</button><br>
              </div>
          </div>
      </div>
      <!-- End of Pop-up message -->
      
      
      
      
      
      <div id="objective" style="<?php echo $questionnairePart1; ?>">
      <form method="POST" action="questionnaire.php">
      <table border="1">
        <tr><td id="intro" colspan="5">Questionnaire</td></tr>
        <tr class="qq1">
          <td colspan="5"><div><i class="fa fa-volume-off" style="font-size:24px" id='part1Explain'></i><i class="fa fa-volume-up" style="font-size:24px" name="playing" hidden></i></div>記憶部份： 請按一次右邊的按鈕，聆聽以下五個詞語，並按下方五個輸入欄重覆讀出，不限順序。注意只可以播放兩次，如收音錯誤可按下重讀，完成後請仍然保持記憶，因為在測試的最後你將會再被問及這些詞語。
            <button type='button' id='part1Speak'>播放</button></td>
        </tr>
        <tr class="qq1">
          <td><label for="">第一題:</label>
                <input id="p1q1" class="form-control" type="text" name='p1[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第二題:</label>
                <input id="p1q2" class="form-control" type="text" name='p1[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第三題:</label>
                <input id="p1q3" class="form-control" type="text" name='p1[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第四題:</label>
                <input id="p1q4" class="form-control" type="text" name='p1[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第五題:</label>
                <input id="p1q5" class="form-control" type="text" name='p1[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
        </tr>
        <tr class="qq1">
          <td colspan="5" style="text-align:center"><input type="button" onclick='checkq1()' value="確定"></td>
        </tr>
        <script>
        function checkq1() {
          if (confirm("確定答案？確定後不能再修改！")) {
            for (var i=1;i<6;i++) {
              var p1qans = document.getElementById('p1q'+i).value
              console.log(p1qans);
              if (p1qans == '面孔'|| p1qans == '絲絨'|| p1qans == '教堂'|| p1qans == '雛菊'|| p1qans == '紅色') {
                marks++
              }
            }
            // Disable Q1
            for (var s=0;s<document.getElementsByClassName('qq1').length;s++) {
              document.getElementsByClassName('qq1')[s].style.display="none";
            }
            // Show Q2
            for (var s=0;s<document.getElementsByClassName('qq2').length;s++) {
              document.getElementsByClassName('qq2')[s].style.display="";
            }
          }
        }
        </script>
        <tr class="qq2" style="display:none">
          <td colspan="5"><div><i class="fa fa-volume-off" style="font-size:24px" id='part2Explain'></i><i class="fa fa-volume-up" style="font-size:24px" name="playing" hidden></i></div>語言流暢度部份： 由你開始作答起有一分鐘時間，講一些名稱，越多越好。例如我要你講一些花朵的名稱時，你可以說： “向日葵、菊花......” 準備好嗎？現在，你有一分鐘的時間，我想你盡量說出你記得的動物。<button type="button" id="startq2" onclick="openModal();">開始回答</button></td>
        </tr>
        <tr class="qq2" style="display:none">
          <td><input id="p2q1" class="form-control" type="text" name='p2[]' placeholder="1" ></td>
          <td><input id="p2q2" class="form-control" type="text" name='p2[]' placeholder="2" ></td>
          <td><input id="p2q3" class="form-control" type="text" name='p2[]' placeholder="3" ></td>
          <td><input id="p2q4" class="form-control" type="text" name='p2[]' placeholder="4" ></td>
          <td><input id="p2q5" class="form-control" type="text" name='p2[]' placeholder="5" ></td>
        </tr>
        <tr class="qq2" style="display:none">
          <td><input id="p2q6" class="form-control" type="text" name='p2[]' placeholder="6" ></td>
          <td><input id="p2q7" class="form-control" type="text" name='p2[]' placeholder="7" ></td>
          <td><input id="p2q8" class="form-control" type="text" name='p2[]' placeholder="8" ></td>
          <td><input id="p2q9" class="form-control" type="text" name='p2[]' placeholder="9" ></td>
          <td><input id="p2q10" class="form-control" type="text" name='p2[]' placeholder="10" ></td>
        </tr>
        <tr class="qq2" style="display:none">
          <td><input id="p2q11" class="form-control" type="text" name='p2[]' placeholder="11" ></td>
          <td><input id="p2q12" class="form-control" type="text" name='p2[]' placeholder="12" ></td>
          <td><input id="p2q13" class="form-control" type="text" name='p2[]' placeholder="13" ></td>
          <td><input id="p2q14" class="form-control" type="text" name='p2[]' placeholder="14" ></td>
          <td><input id="p2q15" class="form-control" type="text" name='p2[]' placeholder="15" ></td>
        </tr>
        <tr class="qq2" style="display:none">
          <td><input id="p2q16" class="form-control" type="text" name='p2[]' placeholder="16" ></td>
          <td><input id="p2q17" class="form-control" type="text" name='p2[]' placeholder="17" ></td>
          <td><input id="p2q18" class="form-control" type="text" name='p2[]' placeholder="18" ></td>
          <td><input id="p2q19" class="form-control" type="text" name='p2[]' placeholder="19" ></td>
          <td><input id="p2q20" class="form-control" type="text" name='p2[]' placeholder="20" ></td>
        </tr>
        <tr class="qq2" style="display:none">
          <td><input id="p2q21" class="form-control" type="text" name='p2[]' placeholder="21" ></td>
          <td><input id="p2q22" class="form-control" type="text" name='p2[]' placeholder="22" ></td>
          <td><input id="p2q23" class="form-control" type="text" name='p2[]' placeholder="23" ></td>
          <td><input id="p2q24" class="form-control" type="text" name='p2[]' placeholder="24" ></td>
          <td><input id="p2q25" class="form-control" type="text" name='p2[]' placeholder="25" ></td>
        </tr>
        <tr class="qq2" style="display:none">
          <td><input id="p2q26" class="form-control" type="text" name='p2[]' placeholder="26" ></td>
          <td><input id="p2q27" class="form-control" type="text" name='p2[]' placeholder="27" ></td>
          <td><input id="p2q28" class="form-control" type="text" name='p2[]' placeholder="28" ></td>
          <td><input id="p2q29" class="form-control" type="text" name='p2[]' placeholder="29" ></td>
          <td><input id="p2q30" class="form-control" type="text" name='p2[]' placeholder="30" ></td>
        </tr>
        <tr class="qq2" style="display:none">
          <td colspan="5" style="text-align:center"><input type="button" onclick='checkq2()' value="確定"></td>
        </tr>
        <script>
        function checkq2() {
          if (confirm("確定答案？確定後不能再修改！")) {
            // 呢度計分
            // Disable Q2
            for (var s=0;s<document.getElementsByClassName('qq2').length;s++) {
              document.getElementsByClassName('qq2')[s].style.display="none";
            }
            // Show Q3
            for (var s=0;s<document.getElementsByClassName('qq3').length;s++) {
              document.getElementsByClassName('qq3')[s].style.display="";
            }
          }
        }
        </script>
        
        <!-- Question 3 -->
        <tr class="qq3" style="display:none">
          <td colspan="5"><div><i class="fa fa-volume-off" style="font-size:24px" id='part3Explain'></i><i class="fa fa-volume-up" style="font-size:24px" name="playing" hidden></i></div>
          定向部份：請係下面分別於每格讀出：年、月、日嘅數字部份，例如：1989年5月35日，就分別係年、月、日嘅方格讀出，1989、5 、35。
          </td>
        </tr>
        <tr class="qq3" style="display:none">
          <td colspan="2"><label for="">年:</label>
                <input id="p3q1" class="form-control" type="text" name='p3[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td colspan="2"><label for="">月:</label>
                <input id="p3q2" class="form-control" type="text" name='p3[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td colspan="1"><label for="">日:</label>
                <input id="p3q3" class="form-control" type="text" name='p3[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
        </tr>
        <tr class="qq3" style="display:none">
          <td colspan="5" style="text-align:center"><input type="button" onclick='checkq3()' value="確定"></td>
        </tr>
        <script>
        function checkq3() {
          if (confirm("確定答案？確定後不能再修改！")) {
              if (document.getElementById('p3q1').value == new Date().getFullYear()) {
                marks++
              }
              if (document.getElementById('p3q2').value == new Date().getMonth() + 1) {
                marks++
              }
              if (document.getElementById('p3q3').value == new Date().getDate()) {
                marks++
              }
              console.log(marks); // 呢度計分
            // Disable Q3
            for (var s=0;s<document.getElementsByClassName('qq3').length;s++) {
              document.getElementsByClassName('qq3')[s].style.display="none";
            }
            // Show Q4
            for (var s=0;s<document.getElementsByClassName('qq4').length;s++) {
              document.getElementsByClassName('qq4')[s].style.display="";
            }
          }
        }
        </script>
        <!-- Question 4 -->
        <tr class="qq4" style="display:none">
          <td colspan="5"><div><i class="fa fa-volume-off" style="font-size:24px" id='part4Explain'></i><i class="fa fa-volume-up" style="font-size:24px" name="playing" hidden></i></div>
          專注力部份：請係下面分別於每格讀出100逐次遞減7時嘅答案。例如第一格讀出100-7所得嘅答案，第二格就讀出100-7-7所得嘅答案，如此類推。
          </td>
        </tr>
        <tr class="qq4" style="display:none">
          <td><label for="">第一次</label>
                <input id="p4q1" class="form-control" type="text" name='p4[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第二次:</label>
                <input id="p4q2" class="form-control" type="text" name='p4[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第三次:</label>
                <input id="p4q3" class="form-control" type="text" name='p4[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第四次:</label>
                <input id="p4q4" class="form-control" type="text" name='p4[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第五次:</label>
                <input id="p4q5" class="form-control" type="text" name='p4[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
        </tr>
        <tr class="qq4" style="display:none">
          <td colspan="5" style="text-align:center"><input type="button" onclick='checkq4()' value="確定"></td>
        </tr>
        <script>
        function checkq4() {
          if (confirm("確定答案？確定後不能再修改！")) {
              console.log(marks); // 呢度計分
              if (document.getElementById('p4q1').value == 93) {
                marks++
              }
              if (document.getElementById('p4q2').value == 86) {
                marks++
              }
              if (document.getElementById('p4q3').value == 79) {
                marks++
              }
              if (document.getElementById('p4q4').value == 72) {
                marks++
              }
              if (document.getElementById('p4q5').value == 65) {
                marks++
              }
            // Disable Q4
            for (var s=0;s<document.getElementsByClassName('qq4').length;s++) {
              document.getElementsByClassName('qq4')[s].style.display="none";
            }
            // Show Q5
            for (var s=0;s<document.getElementsByClassName('qq5').length;s++) {
              document.getElementsByClassName('qq5')[s].style.display="";
            }
          }
        }
        </script>
        
        <!-- Question 5 -->
        <tr class="qq5" style="display:none">
          <td colspan="5"><div><i class="fa fa-volume-off" style="font-size:24px" id='part5Explain'></i><i class="fa fa-volume-up" style="font-size:24px" name="playing" hidden></i></div>
          延遲記憶部份：仲記唔記得我哋係第一部份提到嘅五個詞語?請係下面欄位讀出你仍然記得嘅詞語，順序不限。
          </td>
        </tr>
        <tr class="qq5" style="display:none">
          <td><label for="">第一題:</label>
                <input id="p5q1" class="form-control" type="text" name='p5[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第二題:</label>
                <input id="p5q2" class="form-control" type="text" name='p5[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第三題:</label>
                <input id="p5q3" class="form-control" type="text" name='p5[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第四題:</label>
                <input id="p5q4" class="form-control" type="text" name='p5[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
          <td><label for="">第五題:</label>
                <input id="p5q5" class="form-control" type="text" name='p5[]' placeholder="按下並說出答案" onclick="ans(this.id)">
          </td>
        </tr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Launch demo modal
        </button>
        <tr class="qq5" style="display:none">
          <td colspan="5" style="text-align:center"><input type="submit" name="submit" id="submit" value="Submit the questionnaire" onclick="checkq5();" /></td>
        </tr>
        <script>
        function checkq5() {
          if (confirm("確定答案？確定後不能再修改！")) {
            for (var i=1;i<6;i++) {
              var p5qans = document.getElementById('p5q'+i).value
              console.log(p5qans);
              if (p5qans == '面孔'|| p5qans == '絲絨'|| p5qans == '教堂'|| p5qans == '雛菊'|| p5qans == '紅色') {
                marks = marks + 2
                document.cookie = "marks="+marks;
              }
            }
          }
        }
        </script>
      </table>
      </div>
      </form>
      
      <div id="go">
        <form method="POST" action="questionnaire.php" style="<?php echo $instruction; ?>">
          <input type="checkbox" name="agree-term" id="agree-term" required/>
          <label for="agree-term"> I clearly understand the instruction </label></br>
          <input type="submit" name="submit" id="submit" value="Start the questionnaire" />
        </form>
      </div>
    </section>
    </div>
</div>

<script>
var synth = window.speechSynthesis;
var u = new SpeechSynthesisUtterance();
var part1Speak = document.querySelector('#part1Speak');
var part1Explain = document.querySelector('#part1Explain');
var part2Explain = document.querySelector('#part2Explain');
var part3Explain = document.querySelector('#part3Explain');
var part4Explain = document.querySelector('#part4Explain');
var part5Explain = document.querySelector('#part5Explain');
var back = document.querySelector('#back');
var next = document.querySelector('#next');
var countClicks = 0;
var p2num =1;
u.rate = 0.7;
u.lang = 'zh-HK';
u.text = "";

part1Explain.addEventListener("click", function(){
  u.text = "記憶部份： 請按一次右邊的按鈕，聆聽以下五個詞語，並按下方五個輸入欄重覆讀出，不限順序。注意只可以播放兩次，如收音錯誤可按下重讀，完成後請仍然保持記憶，因為在測試的最後你將會再被問及這些詞語";
  u.rate = 0.8;
  synth.speak(u);
})

part2Explain.addEventListener("click", function(){
  u.text = "語言流暢度部份： 由你開始作答起有一分鐘時間，講一些名稱，越多越好。例如我要你講一些花朵的名稱時，你可以說： “向日葵、菊花......” 準備好嗎？現在，你有一分鐘的時間，我想你盡量說出你記得的動物";
  u.rate = 0.8;
  synth.speak(u);
})

part3Explain.addEventListener("click", function(){
  u.text = "定向部份：請係下面分別於每格讀出年、月、日嘅數字部份，例如：1989年5月35日，就分別係年、月、日嘅方格讀出，1 9 8 9、5 、35。";
  u.rate = 0.8;
  synth.speak(u);
})

part4Explain.addEventListener("click", function(){
  u.text = "專注力部份：請係下面分別於每格讀出100逐次遞減7時嘅答案。例如第一格讀出100-7所得嘅答案，第二格就讀出100-7-7所得嘅答案，如此類推。";
  u.rate = 0.8;
  synth.speak(u);
})

part5Explain.addEventListener("click", function(){
  u.text = "延遲記憶部份：仲記唔記得我哋係第一部份提到嘅五個詞語?請係下面欄位讀出你仍然記得嘅詞語，順序不限。";
  u.rate = 0.8;
  synth.speak(u);
})

part1Speak.addEventListener("click", function(){
  u.rate = 0.7;
  u.text = "面孔。絲絨。教堂。雛菊。紅色";
  countClicks++;
  synth.speak(u);
});

startq2.addEventListener("click",function(event){
document.getElementById('questionnumber').innerHTML = "目前為第 "+p2num+" 個";
document.getElementById('p2ans').innerHTML = document.getElementById('p2q'+p2num).value;
});

next.addEventListener("click",function(event){
if (p2num<30) {
p2num++;
document.getElementById('questionnumber').innerHTML = "目前為第 "+p2num+" 個";
document.getElementById('p2ans').innerHTML = document.getElementById('p2q'+p2num).value;
} else {
document.getElementById('questionnumber').innerHTML += "<br>題號不能大於30!"
}
recordans();
});

back.addEventListener("click",function(event){
if (p2num>1) {
p2num--;
document.getElementById('questionnumber').innerHTML = "目前為第 "+p2num+" 個";
document.getElementById('p2ans').innerHTML = document.getElementById('p2q'+p2num).value;
} else {
document.getElementById('questionnumber').innerHTML += "<br>題號不能小於30!"
}
recordans();
});

u.addEventListener('start', function(event) {
for (var i = 0; i <= arguments.length; i++){
document.getElementsByName('playing')[i].hidden = false;
}
document.getElementById('part1Explain').hidden = true;
document.getElementById('part2Explain').hidden = true;
document.getElementById('part3Explain').hidden = true;
document.getElementById('part4Explain').hidden = true;
document.getElementById('part1Speak').disabled = true;
});

u.addEventListener('end', function(event) { 
for (var i = 0; i <= arguments.length; i++){
document.getElementsByName('playing')[i].hidden = true;
}
document.getElementById('part1Explain').hidden = false;
document.getElementById('part2Explain').hidden = false;
document.getElementById('part3Explain').hidden = false;
document.getElementById('part4Explain').hidden = false;
if (countClicks < 2) {
document.getElementById('part1Speak').disabled = false;
}});



function toggle(startOver = true) {
        synth.cancel();
        if(startOver) {
          synth.speak(u);
        }
}
window.addEventListener('load', toggle.bind(null, false));

</script>


<script>

  function ans(question) {
      var recognition = new webkitSpeechRecognition();
      recognition.lang = "zh-HK";

      recognition.onresult = function(event) {
          document.getElementById(question).value = event.results[0][0].transcript;
      }
      recognition.start();
  }

</script>

<!-- Start of Pop-up message script -->
<script>
    const modal = document.querySelector('#exampleModalCenterx');
    function openModal() {
        $('#exampleModalCenterx').modal('show');
    }

    // Prevent pop-up message click outside will close
    $('#exampleModalCenterx').modal({
        backdrop: 'static',
        keyboard: false
    });

console.log(ans2);
function recordans() {
    var recognition = new webkitSpeechRecognition();
    recognition.lang = "zh-HK";

    recognition.onresult = function(event) {
        // console.log(event);
        document.getElementById('p2ans').innerHTML = event.results[0][0].transcript;
        document.getElementById('p2q'+p2num).value = event.results[0][0].transcript;
    }
    recognition.start();
    
    $('#exampleModalCenterx').on('hidden.bs.modal', function (e) {
            recognition.stop();
    })

}
</script>
<!-- End of Pop-up message script -->
<?php
include_once('footer.php');

?>