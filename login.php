<?php

$success = 0;
$user = 0;
$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    
    $username = $_POST['username'];

    $password = $_POST['password'];

  
    $sql = "Select * from `registration` where
    username='$username' and password = '$password' ";


    $result = mysqli_query($con,$sql);
    if($result)
    {
        $num = mysqli_num_rows($result);

       if($num > 0)
        {
            $login = 1;

            session_start();
            $_SESSION['username'] = $username;
            header('location:home.php');
        
        }
        else {

            $invalid = 1;
               echo "Invalid data";
        }
       

        
    }
}


?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Signup from

    </title>
  </head>
  <body>
<?php
  if($login)
{
    echo'<div class="alert alert-success d-flex align-items-center" role="alert-danger">
  
  </svg>
  <div>
      Logged in successfully 
  </div>
</div>';
}

?>


<?php
  if($invalid)
{
    echo'<div class="alert alert-danger d-flex align-items-center" role="alert-danger">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
         Invalid Credential
  </div>
</div>';
}

?>


  <h1 class="text-center mt-4">Login to Our Website</h1>
    <div class="container mt-5">
    <form action="login.php" method ="post">
  <div class="from-group ">
    <label for="exampleInputEmail1" >Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
    placeholder="Enter Your Username" name="username">
  
  <div class="from-group">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
  </div>
 
  <button type="submit" class="btn btn-primary w-100">Login </button>
</form>
     
    </div>
    
  </body>
</html>