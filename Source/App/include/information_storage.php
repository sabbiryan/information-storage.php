<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'db_info_store');

class information_storage {
    public function __construct() {
        $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('Oops connection error -> ' . mysql_error());
        mysql_select_db(DB_DATABASE, $connection) or die('Database error -> ' . mysql_error());
    }
    
    public function register_admin($name,$username,$email,$password) {
        $password = md5($password);
        
	$sql = mysql_query("SELECT aid FROM admin WHERE username = '$username' or email = '$email'");
        $no_rows = mysql_num_rows($sql);
       
	if ($no_rows == 0) {
            $result = mysql_query("INSERT INTO admin (name, username, email, password) 
            values ('$name', '$username', '$email', '$password')") 
                or die(mysql_error());
            return $result;
	}
	else {
            return FALSE;
	}	
    }
    
    public function get_session() {	    
       if(isset($_SESSION['login'])) {
            return $_SESSION['login'];
       }
    }
    
   public function check_login($emailusername, $password) {
        $password = md5($password);
		
        $result = mysql_query("SELECT * FROM admin WHERE email = '$emailusername' or username='$emailusername' and password = '$password'");
       // echo '------'.$result;
        
        $user_data = mysql_fetch_array($result);
       // echo '<pre>';
       // print_r($user_data);
        //exit();
        $no_rows = mysql_num_rows($result);
	
        if ($no_rows == 1) {
            $_SESSION['login'] = true;
            $_SESSION['aid'] = $user_data['aid'];
            return TRUE;
        }
        else{	    
            return FALSE;
        }
    }

    public function admin_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
    
    public function i_store($first_name, $last_name, $email_address, $present_address, $permanent_address, $city, $country, $zip_code, $mobile) {
        
	$sql = mysql_query("SELECT sid FROM istore WHERE email_address = '$email_address'");
        $no_rows = mysql_num_rows($sql);
        //echo $email_address.' '.$first_name.' '.$last_name.' '.$present_address.' '.$permanent_address.' '.$city.' '.$country.' mobile '.$mobile.' mobile '.$zip_code;
        //echo $no_rows;
        //exit();
	if ($no_rows == 0) {
            $result = mysql_query("INSERT INTO istore (first_name, last_name, email_address, present_address, permanent_address, city, country, zip_code, mobile) 
            values ('$first_name', '$last_name', '$email_address', '$present_address', '$permanent_address', '$city', '$country', '$zip_code', '$mobile')") 
                or die(mysql_error());
            
            return $result;
	}
	else {
            return FALSE;
	}	
    }
    
}
?>
