<?php
// Create connection
$conn= new mysqli("localhost","root","123","myDB" );
// check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>