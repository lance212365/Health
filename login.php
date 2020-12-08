<?php
    include_once('header.php');
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <form action="loginValidation.php" method="POST">
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input id="userName check" class="form-control" type="text" name="userName">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password check" class="form-control" type="password" name="password">
                    </div>
                            <input id="submit" class="btn btn-primary" type="submit" name="submit" value="login">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-5">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title text-center">Don't have TKZYC Health Account?</h5>
                        </div>
                        <div class="col-12 justify-content-center d-flex">
                            <a href="registration.php"><button class="btn btn-primary">Create Account</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('footer.php');
?>