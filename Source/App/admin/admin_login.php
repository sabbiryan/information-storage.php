<?php
session_start();
include_once '../include/information_storage.php';
$info_store = new information_storage();

if ($info_store->get_session()){
   header("location:../index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link type="text/css" rel="stylesheet" href="../css/style.css"/>
        <title>Admin Login</title>
        <style>
            body{
                font-family:Arial, Helvetica, sans-serif;
                margin: 0px 10%;
            }
        </style>
	<script language="javascript" type="text/javascript">
            function submitregistration() {
                var form = document.admin_login;
                if(form.emailusername.value == ""){
                    alert( "Enter email or username." );
                    return false;
                }
                else if(form.password.value == ""){
                    alert( "Enter password." );
                    return false;
                }
            }
	</script> 
    </head>
    <body>
    <?php include_once ("../layout/tem_header.php"); ?>
    <?php //include_once ("../layout/temp_nav.php"); ?>
    <br/><br/>
        <section>
            <aside>
                <p>Username: admin</p>
                <p>Password: admin</p>
            </aside>
                <div id="content" >
                
                    <form method="POST" action="admin_login.php"  id="admin_login_form" name="admin_login">
                        <fieldset>
                            <legend style="text-align: center">Admin Login</legend>
                            <table cellpadding="5px">
                                <tr>
                                    <td><label>Email or Username</label></td>
                                    <td><input type="text" name="emailusername"  required="true"/></td>
                                </tr>
                                <tr>
                                    <td><label>Password</label></td>
                                    <td><input type="password" name="password" id="password" required="true"/></td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="flag" value="login"/></td>
                                    <td><input type="submit" name="login_btn" onclick="return( submitregistration());" value="Login"/></td>                 
                                </tr>
                            </table>
                        </fieldset>    
                    </form>
                    <!--<label><a href="admin_registration.php">Register</a></label>-->
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {    
                        $login = $info_store->check_login($_POST['emailusername'], $_POST['password']);
                        if ($login) {
                            // Registration Success
                           header("location:../index.php");
                        } else {
                            // Registration Failed
                            echo 'Username or password wrong';
                        }    
                    }
                    ?>
                </div>
            <aside></aside>
        </section>
    <?php include_once '../layout/temp_footer.php'; ?>
    </body>
</html>

