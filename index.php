<?php
include_once('header.php');
include_once('database.php');
?>
<link rel="stylesheet" href="css/index.css">
<!-- Start of Pop-up message -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="overflow: hidden">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="overflow-y: initial !important">
        <div class="modal-content center" style="background-color: #F8F9FA;">
            <div style="text-align:center">
                <br><h2 class="modal-title" id="exampleModalCenterTitle" style="color: red"><img src ="images/warning.png" alt="死圖了!"  width= "10%" >Attention</h2>
            </div>
            <br>
            <div class="modal-body" style="height: 50vh; overflow-y: auto;">
              <div style="text-align:center"><img src="images/covid19.png" alt="死圖了!" width= "85%"></div>
                <br/>
                <p>
                  Reported illnesses have ranged from mild symptoms to severe illness and death for confirmed coronavirus disease 2019 (COVID-19) cases.
                  These symptoms may appear 2-14 days after exposure (based on the incubation period of MERS-CoV viruses).
                </p>
                <ul>
                <li>Fever</li>
                <li>Cough</li>
                <li>Shortness of breath</li>
                </ul>
                
            </div>
            <br>
            <button type="button" id="popupbtn" class="btn btn-secondary" name="popupbtn" style="width: 100px; margin: auto; background-color: #009688" onclick="document.getElementById('popupbtn').setAttribute('data-dismiss', 'modal');">Got it!</button><br>
        </div>
    </div>
</div>
<!-- End of Pop-up message -->

<!-- Start of Contant -->
<div class="jumbotron" style="height: 70vh; background:transparent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5">
        <img id="indexlogo" src="images/logo.png" width="100%"/>
      </div>
      <div class="col-md-7">
      <!-- Start of carousel -->
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="mission.php"><img src="images/indexImage1.png" class="d-block w-100" alt="..."></a>
              <div class="carousel-caption d-none d-md-block" style="background:#e1e1ea;margin:auto; opacity:0.8">
                <h2 style="color:black;">Mission</h5>
                <p style="color:black;">What is doctor mission?</p>
              </div>
            </div>
            <div class="carousel-item">
              <a href="questionnaire.php"><img src="images/indexImage2.png" class="d-block w-100" alt="..."></a>
              <div class="carousel-caption d-none d-md-block" style="background:#e1e1ea; margin:auto; opacity:0.8">
                <h2 style="color:black;">Questionnaire</h5>
                <p style="color:black;">There are some interesting questionnaire</p>
              </div>
            </div>
            <div class="carousel-item">
              <a href="knowledge.php"><img src="images/indexImage3.png" class="d-block w-100" alt="..."></a>
              <div class="carousel-caption d-none d-md-block" style="background:#e1e1ea; margin:auto; opacity:0.8">
                <h2 style="color:black;">Knowledge Base</h5>
                <p style="color:black;">There are some of useful information.</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      <!-- End of carousel -->
      </div>
    </div>
  </div>
</div>
<!-- End of Contant -->

<!-- Start of Pop-up message script -->
<script>
    const modal = document.querySelector('#exampleModalCenter');
    document.addEventListener('DOMContentLoaded', openModal);
    function openModal() {
        if (!sessionStorage.getItem('shown-modal')) {
            $('#exampleModalCenter').modal('show');
            sessionStorage.setItem('shown-modal', 'true');
        }
    }

    // Prevent pop-up message click outside will close
    $('#exampleModalCenter').modal({
        backdrop: 'static',
        keyboard: false
    });
</script>
<!-- End of Pop-up message script -->

<?php
include_once('footer.php');
?>