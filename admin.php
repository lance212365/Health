<?php
include('header.php');
include_once('database.php');
?>
    <script type="text/javascript">
        $('document').ready(function() {
            var $table = $('#table')
            $('#edit').click(function() {
                var data = $table.bootstrapTable('getSelections');
                console.log(data);
                $('#id').val(data[0].id);
                $('#loginName').val(data[0].loginName);
                $('#password').val(data[0].password);
                $('#email').val(data[0].email);
                $('#fName').val(data[0].fName);
                $('#lName').val(data[0].lName);
                $('#birth').val(data[0].birth);
                $('#gender').val(data[0].gender);
                $('#phone').val(data[0].phone);
                $('#type').val(data[0].type);
            });

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
        });
    </script>
    <div class="container">
        <div class='row'>
            <div class='col-12'>
                <h3 class='text-center'>User List</h3>
            </div>
            <div class="col-12 mx-auto">
                <table id='table' data-toggle='table' data-height='480' data-url='userJson.php' data-side-pagination='client' data-click-to-select='true' data-single-select="true" data-search='true' data-pagination='true' data-show-columns='true' data-sortable='true' data-mobile-responsive='true'>
                    <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field='id' data-sortable='true'>Id</th>
                            <th data-field='loginName'>LoginName</th>
                            <th data-field='password'>Password</th>
                            <th data-field='email' data-sortable='true'>Email</th>
                            <th data-field='fName' data-sortable='true'>First Name</th>
                            <th data-field='lName' data-sortable='true'>Last Name</th>
                            <th data-field='birth'>Birth</th>
                            <th data-field='gender' data-sortable='true'>Gender</th>
                            <th data-field='phone'>phone</th>
                            <th data-field='type'>Type</th>
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
    <form action="updateValidation.php" method="POST">
        <div class="modal" id="editModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Detail</h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-row">
                                <input id="id" class="d-none" type="text" name="id" />
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="loginName">LoginName</label>
                                        <input class="form-control" id="loginName" type="text" name="loginName" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" id="password" type="text" name="password" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" id=email type="text" name="email" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="fName">First Name</label>
                                        <input class="form-control" id=fName type="text" name="fName" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="lName">Last name</label>
                                        <input class="form-control" id="lName" type="text" name="lName" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="birth">Birth</label>
                                        <input class="form-control" id="birth" type="date" name="birth" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <input class="form-control" id="gender" type="text" name="gender" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form=group">
                                        <label for="phone">phone</label>
                                        <input class="form-control" id="phone" type="text" name="phone" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <input class="form-control" id="type" type="text" name="type" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php 
include_once('footer.php');
?>