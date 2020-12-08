<?php
include('header.php');
include('database.php');
?>
<?php

$userID = isset($_SESSION['$user_ID']) ? $_SESSION['user_ID'] : '';
print_r ($_POST);
echo 'GET contains<p>';


if(isset($_POST['p2'])){
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
}

    $stmt = mysqli_prepare($conn, "INSERT INTO history (userID,education,ansarray,score,date) VALUES (?,?,?,?,?,?)");

    if (!$stmt) {
        die("Error in prepare statement!");
    }
    echo "Prepared successfully<br/>";

    /* bind parameters for markers */
    $stmt->bind_param("iisis", $userID, $model, $fName, $lName, $email, $mobile,  );

    /* execute query */
    $stmt->execute();
?>