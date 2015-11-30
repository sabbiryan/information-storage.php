<?php

include_once '../include/information_storage.php';
$info_store = new information_storage();

// Checking for user logged in or not
if ($info_store->get_session()) {
    header("location:../index.php");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link type="text/css" rel="stylesheet" href="../css/style.css"/>
        <title>Admin Registration</title>
        <style>
            body{
                font-family:Arial, Helvetica, sans-serif;
                margin: 0px 10%;
            }
        </style>
        <script language="javascript" type="text/javascript">
            function submitregistration(){
                var form = document.admin_reg;				 
                if(form.name.value == ""){
                    alert( "Enter name." );
                    return false;
                }
                else if(form.username.value == ""){
                    alert( "Enter username." );
                    return false;
                }
                else if(form.email.value == ""){
                    alert( "Enter email." );
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
            <aside><a href="../index.php">Back</a></aside>
                <div id="content" >
                
                    <form method="POST" action="admin_registration.php"  id="admin_register_form" name="admin_reg">
                        <fieldset>
                            <legend style="text-align: center">Admin Registration</legend>
                            <table cellpadding="5px">
                                <tr>
                                    <td><label>Full Name</label></td>
                                    <td><input type="text" name="name"  required="true"/></td>
                                </tr>
                                <tr>
                                    <td><label>Username</label></td>
                                    <td><input type="text" name="username"  required="true"/></td>
                                </tr>
                                <tr>
                                    <td><label>Email</label></td>
                                    <td><input type="text" name="email" id="email"  required="true"/></td>
                                </tr>
                                <tr>
                                    <td><label>Password</label></td>
                                    <td><input type="password" name="password" required="true"/></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><input type="submit" name="register_admin_btn" onclick="return( submitregistration());" value="Register"/></td>                 
                                </tr>
                            </table>
                        </fieldset>    
                    </form>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                         $register = $info_store->register_admin($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
                         if ($register) {
                         // Registration Success
                             echo 'Registration  successful <a href="admin_login.php">Click here</a> to login';
                         } 
                         else {
                             // Registration Failed
                             echo 'Registration failed. Email or Username already exits please try again';
                         }
                    }
                    ?>
                </div>
            <aside></aside>
        </section>
    <?php include_once '../layout/temp_footer.php'; ?>
    </body>
</html>
