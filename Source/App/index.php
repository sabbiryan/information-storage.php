<?php
session_start();
include_once './include/information_storage.php';
$info_store = new information_storage();

$aid = $_SESSION['aid'];

if (!$info_store->get_session()){
   header("location:./admin/admin_login.php");
}

if(isset($_GET['q'])){
    if ($_GET['q'] == 'logout') {
        //echo $_GET['q'];
        //echo '-----'.$_GET['id'];
        //exit();
        $info_store->admin_logout();
        header("location:./admin/admin_login.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home</title>
        <link type="text/css" href="css/style.css" rel="stylesheet"/>
        <style>
            body{
                font-family:Arial, Helvetica, sans-serif;
                margin-top: -20px;
                margin-left: -1.5px;
                margin-right: -1.5px;
            }
        </style>
    </head>
    <body>
        <<div id="wrapper">
            <?php include_once ("./layout/tem_header.php"); ?>
            <?php include_once ("./layout/temp_nav.php"); ?>
            
            <section>
                <aside></aside>
                <div id="content">
                    <p>That is a simple database site which store a person information</p>
                    <p>That is a simple demo site and that is developed using PHP PDO which is basically PHP Object Oriented Concept</p>
                </div>
                <aside></aside>
            </section>
            
            <?php include_once './layout/temp_footer.php'; ?>
        </div>
    </body>
</html>
