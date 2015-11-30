<?php

include_once './include/information_storage.php';
$info_store = new information_storage();

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
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link type="text/css" rel="stylesheet" href="./css/style.css"/>
    <title>Information Storage</title>
    <style>
        body{
            font-family:Arial, Helvetica, sans-serif;
            margin: 0px 10%;
        }
    </style>
</head>
<body>
    <?php include_once ("./layout/tem_header.php"); ?>
    <?php include_once ("./layout/temp_nav.php"); ?>
    <section>
        <aside></aside>
        <div id="content">
            <form action="i_store.php" method="post">
                <fieldset>
                    <legend>Store Information</legend>
                    <table>
                        <tr>
                            <td><label>First Name</label></td>
                            <td>
                                <input type="text" name="first_name" placeholder="Enter First Name"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Last Name</label></td>
                            <td>
                                <input type="text" name="last_name" placeholder="Enter Last Name"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Email</label></td>
                            <td>
                                <input name="email_address" type="email" placeholder="Enter Email Address"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Present Address</label></td>
                            <td>
                                <textarea rows="4" cols="30" name="present_address" placeholder="Enter Present Address"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Permanent Address</label></td>
                            <td>
                                <textarea rows="4" cols="30" name="permanent_address" placeholder="Enter Permanent Address"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label>City</label></td>
                            <td>
                                <input type="text" name="city" placeholder="Enter Your City"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Country</label></td>
                            <td>
                                <select name="country">
                                    <option value="">Select Country...</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Soudi Arab">Soudi Arab</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United State">United State</option>
                                </select>                            
                            </td>
                        </tr>
                        <tr>
                            <td><label>Zip Code</label></td>
                            <td>
                                <input type="text" name="zip_code" placeholder="Enter Your ZipCode"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Mobile</label></td>
                            <td>
                                <input type="text" name="mobile" placeholder="Enter Mobile No."/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="reg_btn" value="Save">
                            </td>    
                        </tr>

                    </table>
                </fieldset>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 $store = $info_store->i_store($_POST['first_name'],$_POST['last_name'],$_POST['email_address'],$_POST['present_address'],$_POST['permanent_address'],$_POST['city'],$_POST['country'],$_POST['zip_code'],$_POST['mobile']);
                 if ($store) {
                     // Stored Success
                     echo 'Information Stored Succesfully';
                 } 
                 else {
                     // Stored Failed
                     echo 'Stored failed! email already exists, try with another!';
                 }
            }
            ?>

        </div>
        <aside></aside>
    </section>
    <?php include_once ("./layout/temp_footer.php"); ?>
</body>
