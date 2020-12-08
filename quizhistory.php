<?php
include('header.php');
include_once('database.php');
?>
<script type="text/javascript">
    $('document').ready(function(){
        var $table = $('#table')
        $('#edit').click(function () {
          var data = $table.bootstrapTable('getSelections')
          console.log(data);
           $('#quizID').val(data[0].QuizID);
           $('#ID').val(data[0].ID);
           $('#ansarray').val(data[0].ansarray);
           $('#score').val(data[0].score);
           $('#date').val(data[0].date);

          console.log(edit);
        });
    });
</script>
<div class="container">
    <div class='row'>
        <div class='col-12'>
            <h3 class='text-center'>Quiz history</h3>
        </div>
        <div class="col-12 mx-auto">
            <table
                id='table'
                data-toggle='table'
                data-height='480'
                data-url= 'historyJson.php'
                data-side-pagination='client'
                data-click-to-select='true'
                data-single-select="true"
                data-search='true'
                data-pagination='true'
                data-show-columns='true'
                data-sortable='true'
                data-mobile-responsive='true'
                >
                <thead>
                    <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field='quizID' data-sortable='true'>QuizID</th>
                        <th data-field='ID' data-sortable='true'>UserID</th>
                        <th data-field='ansarray'>Answers</th>
                        <th data-field='score' data-sortable='true'>score</th>
                        <th data-field='date' data-sortable='true'>date</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-12 ">
            <button class="btn btn-success float-right" id="edit" data-toggle="modal" data-target="#editModal">Edit</button>
        </div>
    </div>
</div>
<br>   
</div>
<div class="modal" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Quiz history</h5>
      </div>
      <div class="modal-body">
        <div class="container">
    <div class="row">
        <form action="" method="POST">
            <div class="form-group">
                <label for="quizID">QuizID</label>
                <input id="quizID" type="text" name="loginName"/>
            </div>
            <div class="form-group">
                <label for="ID">User ID</label>
                <input id="ID" type="text" name="password"/>
            </div>
            <div class="form-group">
                <label for="ansarray">Answers</label>
                <input id=ansarray type="text" name="email"/>
            </div>
            <div class="form-group">
                <label for="score">Score</label>
                <input id=score type="text" name="fName"/>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input id="date" type="text" name="lName"/>
            </div>
        </form>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php 
include_once('footer.php');
?>