<?php

$TEXTNAME = $_POST['TEXTNAME'];
$ADDRESS = $_POST['ADDRESS'];
$CITY = $_POST['CITY'];
$PINCODE = $_POST['PINCODE'];
$gender = $_POST['gender'];
$DOB = $_POST['DOB'];
$TXTPWD = $_POST['TXTPWD'];
$PHONENO = $_POST['PHONENO'];

global $conn;
$conn = mysqli_connect("localhost","root","","test1");
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    //$conn = mysqli_connect("localhost","root","","test");
    $stmt=$conn->prepare("INSERT INTO registration(TEXTNAME,ADDRESS,CITY,PINCODE,GENDER,DOB,PASSWORD,PHONENO)values(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissss",$TEXTNAME,$ADDRESS,$CITY,$PINCODE,$gender,$DOB,$TXTPWD,$PHONENO);
    if ($stmt->execute()) {
        echo "Your response have been recorded sucessfully.";
    }
    else {
        echo $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>