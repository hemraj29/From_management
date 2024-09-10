<?php
   
   $HOSTNAME = 'localhost';
   $USERNAME = 'root';
   $PASSWORD = '2003';
   $DATABASE = 'signupforms';


   $con = mysqli_connect($HOSTNAME, $USERNAME,'', $DATABASE);


   if(!$con)
   {  

       die(mysqli_error($con));
   }

?>