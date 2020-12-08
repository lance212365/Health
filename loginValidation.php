<?php
    require "database.php";
    session_start();
    
?>
<?php
if (isset($_GET['logout'])){
    session_destroy();
    header ("location: index.php");
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_POST['userName']) && isset($_POST["password"])){
        if(!empty($_POST['userName']) && !empty($_POST['userName'])){
            $sql = mysqli_query($conn, "SELECT `id`,`loginName`,`password` FROM `SEHS4517_HP`.`user`");
            while($row = mysqli_fetch_assoc($sql)){
                if($row["loginName"] == $_POST["userName"] && $row["password"] == $_POST["password"]){
                    $_SESSION["login"]=true;
                    $_SESSION['login_name']=$row['loginName'];
                    $_SESSION['user_ID']=$row['id'];
                    /* close connection */
                    mysqli_close($conn);
                    print('logined');
                    header("LOCATION: index.php");
                }else{
                    $GLOBALS['exit'] = 1;
                }
            }
            if($exit){
                header("LOCATION: login.php");
            }
        }else{
            header("LOCATION: login.php");
        }
    }else{
        header("LOCATION: login.php");
    }
}else{
    header("LOCATION: index.php");
}

?>