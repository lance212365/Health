 <?php
 session_start();
//require database
require_once "database.php";

//validate update
 $checking=array();

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
      foreach ($_POST as $key => $value)
    {
        if (empty($_POST["$key"]))
        {
            $checking["$key"] = false;
        }
    }
    $name = $_POST['userName'];

    $id = $_POST['id'];
    $sql1 = "select * from `SEHS4517_HP`.`user` where `id` not in ($id)";
    $result = mysqli_query($conn, "$sql1");
    while ($row = mysqli_fetch_assoc($result))
     {
         //print_r($row);
         if ($row["loginName"] == $name)
         {
             $checking['userName']='used';
         }
     };
     
    //password validation
    if (strlen($_POST["password"])< 6)
    {
        $checking["password"] = invalid;
    }
    
   //email validation
   if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
        $checking["email_format_false"] = true;
    }
    
    //first name validation
    if (!preg_match("/^[a-zA-Z\s]*$/", $_POST["fName"]) || strlen($_POST["fName"]) <= 1 || strlen($_POST["fName"]) >= 20)
    {
        $checking["fName_format_false"] = true;
    }

    //validate last name
    if (!preg_match("/^[a-zA-Z\s]*$/", $_POST["lName"]) || strlen($_POST["lName"]) <= 1 || strlen($_POST["fName"]) >= 20)
    {
        $checking["lName_format_false"] = true;
    }
    
    //validate birth date
    if (is_date($_POST["birth"]))
    {
        $currentDate = getdate();
        if ($currentDate[0] < strtotime($_POST["pickUp"]))
        {
            $checking["birth"] = false;
        }
    }
    else
    {
        $checking["birth"] = false;
    }
    
    //gender validation
    if (!isset($_POST["gender"])||empty($_POST["gender"]))
    {
        $checking["gender"] = false;
    }
    
    //validate phone number
    if (!preg_match("/^[\d]*$/", $_POST["phone"]) || strlen($_POST["phone"]) != 8)
    {
        $checking["mobile_format_false"] = true;
    }
    
    if (!empty($checking))
    {
        echo json_encode($checking);
    }
    else
    {
        // Check connection
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $loginName = $_POST["userName"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $birth = $_POST["birth"];
        $gender = $_POST["gender"];
        $phone = $_POST["phone"];
        $type = $_POST["type"];
        $id = $_POST["id"];
        
        $sql3 = "UPDATE `SEHS4517_HP`.`user` SET loginName = '$loginName', password = '$password',email = '$email',fName = '$fName',lName = '$lName',birth = '$birth',gender = '$gender',phone = '$phone',type = '$type' WHERE id = $id";

        /* execute query */
        if (mysqli_query($conn, $sql3))
        {
            //redirect to other prevent user resubmit the form data
            $checking['data']=ok;
            echo json_encode($checking);
        }
        else
        {
            //some error:
            //printf("Error: %s.\n", $stmt->error);
            $checking['data']=fail;
            echo json_encode($checking);
        }
       
        /* close connection */
        mysqli_close($conn);
    }
    
 }else{
     //header("LOCATION: index.php");
 }
 
  //date validation check the date format is correct
function is_date($str)
{
    $date_value = DateTime::createFromFormat('Y-m-d', $str);
    return $date_value && $date_value->format('Y-m-d') === $str;
}
