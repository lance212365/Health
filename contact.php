<?php
include('header.php');
include('database.php');

require_once('PHPMailer/PHPMailerAutoload.php');

if (isset($_POST['sendemail'])) {
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();

$mail->Username = 'sehs4517group@gmail.com';
$mail->Password = '72183110011111';

$mail->Subject = $_POST['subject'];
$mail->Body = 'From: ' . $_POST['email'] . '<br><br>' . $_POST['body'];
$mail->addAddress('sehs4517group@gmail.com');

$mail->Send();
}

?>
<div style="position:absolute;height:100%;width:100%;background-image:url('images/elderly.png');background-size:cover; background-repeat:no-repeat; opacity:0.4">
    
</div>

<div class="container mt-5" >
    <div class="row">
        <div class="col-auto mx-auto" style="width: 100%;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contact Us</h5>
                    <form action="" method="POST">
                        <div class="form-group">
                            Subject:
                            <input id="subject" class="form-control" type="text" name="subject">
                        </div>
                        <div class="form-group">
                            Content:
                            <textarea id="content" class="form-control" name="body"></textarea>
                        </div>
                        <div class="form-group">
                            Your Email: (We will contact you soon)
                            <input id="email" class="form-control" type="email" name="email">
                        </div>
                        <div class="from-control">
                            <input id="submit" class="btn btn-primary" type="submit" name="sendemail">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once('footer.php');
?>