<?php 
    require "database.php";

    $sql2 = mysqli_query($conn, "SELECT * FROM `SEHS4517_HP`.`history`");
    while($row = mysqli_fetch_assoc($sql2)){
        $sqldata[] = $row;
    }
    mysqli_close($conn);
    echo json_encode($sqldata);
?>