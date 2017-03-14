<?php 

        $config = array("base_url" => "http://localhost.com/test/hybridauth-api/hybridauth/index.php", 
        "providers" => array ( 
            "Google" => array ( 
                "enabled" => true,
                "keys"    => array ( "id" => "953576727947-edmpeueufia81o9sk29ev7kc0p7busi7.apps.googleusercontent.com", "secret" => "eN6HNtzDeorO6UnfA9v1kBrr" ), 
 
            ),
 
            "Facebook" => array ( 
                "enabled" => true,
                "keys"    => array ( "id" => "249016282225554", "secret" => "f0291ada3c20c3489b22cb959b47e695" ),
                "scope" => "email, user_about_me, user_birthday, user_hometown"  //optional.              
            ),
 
            
        ),
        // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
        "debug_mode" => true,
        "debug_file" => "debug.log",
    );

?>