<?php
	session_start();
	if (isset($_SESSION["idu"]))
		header("Location: ./options");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>e-Login  TYT</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSS -->
        <link rel='stylesheet' href='css/fonts.css'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="script/scriptJquery/html5.js"></script>
        <![endif]-->

    </head>

    <body bgcolor="#0099CC">
        <div class="box outer page-container">
        <br />
            <h1>e-Login Torres & Torres</h1>
            <form  name="ajaxform" id="ajaxform" method="POST">
                <input type="text" name="username" class="username" placeholder="Usuario">
                <input type="password" name="password" class="password" placeholder="Password">
                <button id="submit" name="submit">Entrar</button>
                <div id="error"></div>
            </form>
            <div class="connect">
                <p>Visite nuestro Sitios:</p>
                <p>
                    <a class="facebook" href="http://192.168.0.245/intranetPro/"></a>
                    <a class="twitter" href="../"></a>
                </p>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>