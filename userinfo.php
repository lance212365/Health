<?php
include('header.php');
include('database.php');
?>
<?php if(isset($_SESSION['login'])){?>
<?php 
    $id = $_SESSION['user_ID'];
    $sql2 = mysqli_query($conn, "SELECT * FROM `SEHS4517_HP`.`user` WHERE id = $id");
    while($row = mysqli_fetch_assoc($sql2)){
        $sqldata = $row;
    }
    mysqli_close($conn);
    
   // print_r($sqldata);
?>
<script type="text/javascript">
    //check all validate
    $('form').submit(function(event) {
        event.preventDefault();
        var userName = $('#loginName').val();
        var password = $('#password').val();
        var email = $('#email').val();
        var fName = $('#fName').val();
        var gender = $('#gender').val();
        var lName = $('#lName').val();
        var birth = $('#birth').val();
        var phone = $('#phone').val();
        var type = $('#type').val();
        var id = $('#id').val();

        var check = $.ajax({
            method: "POST",
            url: "updateValidation.php",
            data: {
                'userName': userName,
                'password': password,
                'email': email,
                'fName': fName,
                'lName': lName,
                'gender': gender,
                'birth': birth,
                'phone': phone,
                'type': type,
                'id': id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.data == 'ok') {
                    location.reload();
                } else {
                    $(".is-valid").removeClass("is-valid");
                    $(".is-invalid").removeClass("is-invalid");
                    if (data.birth == false) {
                        $("#birth").addClass("is-invalid");
                    }
                    if (data.email == false) {
                        $("#email").addClass("is-invalid");
                    }
                    if (data.email_format_false == true) {
                        $("#email").addClass("is-invalid");
                    }
                    if (data.fName == false) {
                        $("#fName").addClass("is-invalid");
                    }
                    if (data.fName_format_false == true) {
                        $("#fName").addClass("is-invalid");
                    }
                    if (data.gender == false) {
                        $("#gender").addClass("is-invalid");
                    }
                    if (data.lName == false) {
                        $("#lName").addClass("is-invalid");
                    }
                    if (data.lName_format_false == true) {
                        $("#lName").addClass("is-invalid");
                    }
                    if (data.phone == false) {
                        $("#phone").addClass("is-invalid");
                    }
                    if (data.mobile_format_false == true) {
                        $("#phone").addClass("is-invalid");
                    }
                    if (data.userName == false) {
                        $("#userName").addClass("is-invalid");
                    }
                    if (data.password == 'invalid') {
                        $("#password").addClass("is-invalid");
                    }

                }
            }
        })
    });
</script>
<form action="updateValidation.php" method="POST">
<div class="container">
    <div class="row">
        <div class="card">
            <h5 class="card-header">User Detail</h5>
            <div class="card-body">
                <div class="form-row">
                    <input id="id" class="d-none" type="text" name="id" value="<?php echo($sqldata['id']);?>" />
                    <div class="col-12">
                        <div class="form-group">
                            <label for="loginName">LoginName</label>
                            <input class="form-control" id="loginName" type="text" value="<?php echo($sqldata['loginName']);?>" name="loginName" disabled/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" type="text" name="password" value="<?php echo($sqldata['password']);?>" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id=email type="text" name="email" value="<?php echo($sqldata['email']);?>" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="fName">First Name</label>
                            <input class="form-control" id=fName type="text" name="fName" value="<?php echo($sqldata['fName']);?>" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="lName">Last name</label>
                            <input class="form-control" id="lName" type="text" name="lName" value="<?php echo($sqldata['lName']);?>" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="birth">Birth</label>
                            <input class="form-control" id="birth" type="date" name="birth" value="<?php echo($sqldata['birth']);?>" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input class="form-control" id="gender" type="text" name="gender" value="<?php echo($sqldata['gender']);?>" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form=group">
                            <label for="phone">phone</label>
                            <input class="form-control" id="phone" type="text" name="phone" value="<?php echo($sqldata['phone']);?>" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input class="form-control" id="type" type="text" name="type" value="<?php echo($sqldata['type']);?>" disabled/>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php }else{header("LOCATION: index.php");}?>
<?php
include_once('footer.php');
?>