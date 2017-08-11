<?php
function connection(){
   $con = mysqli_connect("localhost","root","") or die("Unable to connect to server");
    mysqli_select_db($con,'smhs') or die("Unable to establish connection with Database");
}
    
?>