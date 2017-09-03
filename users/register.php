 <?php
session_start();
require_once 'DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['firstname']) && isset($_POST['lastname']) &&isset($_POST['email']) && isset($_POST['password']) && isset($_POST['mobilenumber'])) {
 
    // receiving the post params
    $firstname = $_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobilenumber=$_POST['mobilenumber'];
 
    // check if user is already existed with the same email
    if ($db->isUserExisted($mobilenumber)) {
        // user already existed
        //$response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $mobilenumber;
        echo json_encode($response);
    } else {
        // create a new user
        $user = $db->storeUser($firstname,$lastname,$email,$password,$mobilenumber);
        if ($user) {
            // user stored successfully
            //$response["error"] = FALSE;
            //$response["uid"] = $user["unique_id"];
            //$response["user"]["firstname"] = $user["firstname"];
            //$response["user"]["lastname"]=$user["lastname"];
            //$response["user"]["email"] = $user["email"];
            //$response["user"]["mobilenumber"]=$user['mobilenumber'];
            //$response["user"]["created_at"] = $user["created_at"];
            //$response["user"]["updated_at"] = $user["updated_at"];
            $response["user"]="You have successfully registered.Please login to continue.";
            //echo json_encode($response);
        } else {
            // user failed to store
           // $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            //echo json_encode($response);
        }
    }
} else {
    //$response["error"] = TRUE;
    //$response["error_msg"] = "Required parameters (name, email or password) is missing!";
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
  <link rel="stylesheet" href="register1.css">
  
 
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
<div class="container-fluid bg2">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Sign Up</legend>

                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="firstname" placeholder="Enter First Name"   class="form-control" id="firstname"/>
                        
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" placeholder="Enter Last Name"  class="form-control" id="lastname"/>
                         
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Email"  class="form-control" id="email"/>
                        
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Password" required class="form-control" id="password" />
                         
                    </div>

                    

                    <div class="form-group">
                      <label for="name">Mobile Number</label>
                      <input type="text" name="mobilenumber" placeholder="Enter the contact number"   class="form-control" id="mobilenumber" />
                       
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Sign Up" id="submit"   class="btn btn-danger"/>
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if(isset($response["user"])) {echo $response["user"];}   ?></span>
             
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">    
        Already Registered? <a href="login.php">Login Here</a>
        </div>
    </div>
</div>

  
 

 </body>
 </html>