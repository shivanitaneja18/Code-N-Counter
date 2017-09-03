 <?php
   
 ob_start();
 session_start();
 require_once 'Config.php';
 
 // it will never let you open (login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: index.html");
     
  exit;
 }

 require_once 'DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['mobilenumber']) && isset($_POST['password'])) {
 
    // receiving the post params
    $mobilenumber = $_POST['mobilenumber'];
    $password = $_POST['password'];
    $_SESSION['mobilenumber']=$mobilenumber;
     
    // get the user by mobilenumber and password
    $user = $db->getUserByEmailAndPassword($mobilenumber, $password);
 
    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        //$response["uid"] = $user["unique_id"];
        //$response["user"]["firstname"] = $user["firstname"];
        //$response["user"]["lastname"]=$user["lastname"];
        //$response["user"]["email"] = $user["email"];
        //$response["user"]["created_at"] = $user["created_at"];
        //$response["user"]["updated_at"] = $user["updated_at"];
        $response["user"]="Login Success!";
        //$_SESSION['mobilenumber']=$mobilenumber;
         
       header("Location:http://localhost/Floreciente/competition-master/index.html");
       $_SESSION['mobilenumber']=$user["mobilenumber"];

         
         echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    //echo json_encode($response);
}

?>


<!DOCTYPE html>
<html>
<head>
     <title>Floreciente</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="icon" type="image/png" sizes="16x16" href="logo.png">
    <link rel="stylesheet" href="login1.css">
</head>
<body>
<nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- add header -->
 
        
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.html"><img src="flogo.jpg" class="img-responsive" width="50" height="50"> </a>
            <a class="navbar-brand navbar-bg" href="../index.html">Floreciente</a>
        </div>
        <!-- menu items -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
               <button class="btn btn-danger btn-md pull-right" onclick="window.location='login.php'"> Login </button>
                
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid bg1">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <fieldset>
                    <legend>Login</legend>
                    
                    <div class="form-group">
                        <label for="name">Mobile Number</label>
                        <input type="text" name="mobilenumber" placeholder="Your Mobile Number" id="mobilenumber" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Your Password" id="password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <center><input type="submit" name="login" value="Login" class="btn btn-danger" id="submit" /></center>
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($response["user"])) { echo $response["user"]; } ?></span>
        </div>
    </div>
    <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">    
        Don't have an Account?<a href="register.php">Sign Up Here</a>
        </div>
    </div>
</div>
</div>
 
 
  
 
 


</body>
 
</html>