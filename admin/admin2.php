<?php
session_start();
require_once('vendor/autoload.php');

########## Google Settings.Client ID, Client Secret from https://console.developers.google.com #############
$client_id = '836337042403-jktd6tjlg7pqjml52de7o8nvrtbdemok.apps.googleusercontent.com';
$client_secret = 'E2LxskfY7aeDC3stFtUipqlq';
$redirect_uri = 'http://localhost/overcrowd-master/admin/admin2.php';

########## MySql details  #############
$db_username = "root"; //Database Username
$db_password = "mysql"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'overcrowd'; //Database Name
###################################################################

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

$service = new Google_Service_Oauth2($client);

//If $_GET['code'] is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

// This is the logout function
if(isset($GET['logout'])){
	unset($_SESSION['access_token']);
}


//if we have access_token continue, or else get login URL for user
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

//Display user info or display login url as per the info we have.
echo '<div style="margin:20px">';
if (isset($authUrl)){
    //show login url
    echo '<div align="center">';
    echo '<h3>Login with Google -- Demo</h3>';
    echo '<div>Please click login button to connect to Google.</div>';
    echo '<a class="login" href="' . $authUrl . '"><img src="images/google-login-button.png" /></a>';
    echo '</div>';
   
} else {
   
    $user = $service->userinfo->get(); //get user info
   
    // connect to database
    $mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
   
    //check if user exist in database using COUNT
    $result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
    $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
   
    //show user picture
    echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
   
    if($user_count) //if user already exist change greeting text to "Welcome Back"
    {
        echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['login_user'] = $user->id;
        $_SESSION['login_name'] = $user->name;
        $_SESSION['login_picture'] = $user->picture;

    }
    else //else greeting text "Thanks for registering"
    {
        echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
        $statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
        $statement->execute();

        $_SESSION['login_user'] = $user->id;
        $_SESSION['login_name'] = $user->name;
        $_SESSION['login_picture'] = $user->picture;


        echo $mysqli->error;
    }
   
    //print user details
    echo '<pre>';
    print_r($user);
    echo '</pre>';
}
echo '</div>';

?>