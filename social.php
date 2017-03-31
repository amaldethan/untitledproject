<?php 
	//ob_start();
	session_start();
	include('config.php');
	include('dbconfig.php');
	include('hybridauth-api/hybridauth/Hybrid/Auth.php');
	include('hybridauth-api/vendor/autoload.php');

	if(isset($_GET['provider'])){
		$provider = $_GET['provider'];
		try {
			$hybridauth = new Hybrid_Auth($config);
			$authProvider = $hybridauth->authenticate($provider);
			$adapter = $hybridauth->getAdapter($provider);
			$user_profile = $authProvider->getUserProfile();
			//$logout = $adapter->logout();
			if($user_profile && isset($user_profile->identifier)){

        $identifier = $user_profile->identifier;
		$fname = $user_profile->firstName;
        $lname = $user_profile->lastName;
        $emailid = $user_profile->email;

        $_SESSION['identifier'] = $identifier;
        $_SESSION['emailid'] = $emailid;

        $check = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$emailid.'"');
        if(mysqli_fetch_row($check)>0){
          

            $query = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$emailid.'"');
            $res = mysqli_fetch_array($query);
            $id = $res['id'];
            $_SESSION['id'] = $res['id'];
            $_SESSION['uname'] = $res['uname'];
            $_SESSION['started'] = true; 
          header('Location: pages/index.php');
        }
        
        else {

          die("User does not exist.");

        }
      

        
      
        //$sessid = $_COOKIE['PHPSESSID'];

       	//echo "<br> <a href='logout.php'>Logout</a>";

       	

               	
       	}

		}

		catch( Exception $e )
    { 
         switch( $e->getCode() )
         {
                case 0 : echo "Unspecified error."; break;
                case 1 : echo "Hybridauth configuration error."; break;
                case 2 : echo "Provider not properly configured."; break;
                case 3 : echo "Unknown or disabled provider."; break;
                case 4 : echo "Missing provider application credentials."; break;
                case 5 : echo "Authentication failed The user has canceled the authentication or the provider refused the connection.";
                         break;
                case 6 : echo "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
                         $authProvider->logout();
                         break;
                case 7 : echo "User not connected to the provider.";
                         $authProvider->logout();
                         break;
                case 8 : echo "Provider does not support this feature."; break;
        }
 
        echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
 
        echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";
 
    	}
	}

?>