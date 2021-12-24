<?php 

$con = mysqli_connect("127.0.0.1","root","","login");

if($con->connect_error):
     die("connection failed".$con->connect_error);

endif;