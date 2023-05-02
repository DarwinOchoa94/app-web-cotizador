<?php
        session_start();
        if (isset($_SESSION[$_COOKIE["PHPSESSID"]]))
                header("Location: ".$_SESSION[$_COOKIE["PHPSESSID"]]["dirName"]."");
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8">
                <title>Grupo Torres & Torres</title>
                <meta name="description" content="description">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, user-scalable=no">
                <meta name="author" content="Evgeniya">
                <meta name="keyword" content="keywords">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                
                <link href="../../Framework/devoops/plugins/bootstrap/bootstrap.css" rel="stylesheet">
                <link href="../../Framework/devoops/css/font-awesome.css" rel="stylesheet">
                <link href="../../Framework/devoops/css/style.min.css" rel="stylesheet">
       			<script src="../../Framework/devoops/plugins/jquery/jquery-2.1.0.min.js"></script>
                
                <!--<link href="http://fonts.googleapis.com/css?family=Righteous" rel="stylesheet" type="text/css">-->
                <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!--[if lt IE 9]>
                                <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
                                <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
                <![endif]-->
        <style>
                body{
                        background:#7DAABB;
                }
                .btn{
                        padding: 5px 10px;
                        font-size: 15px;
                        color:#039;
                }
        </style>
        </head>
<body>
<div class='container-fluid'>
        <div id='page-login' class='row'>
                <div class='col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3'>
                        <div class='box'>
                                <div class='box-content'>
                    <form name='ajaxform' id='ajaxform' method='POST'>
                        <div class='text-center'>
                            <h3 class='page-header' style='text-align:center'><img src='css_js_fonts/img/logoLight.png'><br><br>LOGIN</h3>
                        </div>
                        <div class='form-group'>
                            <label class='control-label'><i class='fa fa-user'></i>Username</label>
                            <input type='text' class='form-control' name='username' />
                        </div>
                        <div class='form-group'>
                            <label class='control-label'><i class='fa fa-key'></i>Password</label>
                            <input type='password' class='form-control' name='password' />
                        </div>
                        <div class='form-group'>
                            <label class='control-label'><i class='fa fa-home'></i>Empresa</label>
                            <select class='form-control' name='empresa'>
                            <option value='TYT' selected>Torres & Torres</option>
                            <option value='CIA'>Ciateite</option>
                            <option value='TOLEPU'>Tolepu</option>
                            <!--<option value='ESTIBA'>Estiba</option>-->
                            </select>
                        </div>
                        <div class='text-center'>
                            <!--<a href='../index2.php' class='btn btn-primary'>Sign in</a>-->
                            <button id='submit' name='submit' class='btn btn-primary'>.:: <i class='fa fa-unlock-alt'></i> Entrar ::.</button>
                        </div>
                    </form>    
                                </div>
                        </div>
                </div>
        </div>
</div>


<div 
					id='divLogin'
					class='demo'
					style='
						position:absolute;
						left:0px;
						top:0px;
						width:400px;
						height:180px;
						background:#ffffff;
						border:1px solid #000000;
						visibility:hidden;
					'
				>
					<table cellspacing='0' cellpadding='0' width='100%'>
						<tr>
							<td>
								<table cellspacing='0' cellpadding='05' width='100%'>
									<tr>
										<td style='background:#000000;color:#ffffff;'>
											Login del sistema
										</td>
										<td align='right' style='background:#000000;color:#ffffff;'>
											<a 
												style='cursor:pointer;'
												onclick='
													apagarPantallaLogin();
												'
											>
												[X]
											</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<form action='./index.php?action=login' method='POST'>
									<table cellspacing='0' cellpadding='10'>
										<tr>
											<td>
												$txtUsuario
											</td>
										</tr>
										<tr>
											<td>
												$txtPassword
											</td>
										</tr>
										<tr>
											<td>
												 
											</td>
											<td>
												<input type='submit' value='ENTRAR'>
											</td>
										</tr>
									</table>
								</form>
							</td>
						</tr>
					</table>
				</div>



<script>
	jQuery(document).ready(function(){
        $(function(){
                $('#submit').click(function(){
                        var url = 'php/jsonVeryLogin.php'; // El script a dónde se realizará la petición.
                        $.ajax({
                                type: 'POST',
                                url: url,
                                data: $('#ajaxform').serialize(), // Adjuntar los campos del formulario enviado.
                                statusCode: {
                                        404: function() {
                                                alert( 'No se encontro la pagina...!!' );
                                        }
                                },
                                success: function(data)
                                {       
                                        var obj = jQuery.parseJSON( data );
                                        console.log(obj.response);
                                        if (obj.success==false)
                                                alert(obj.errors.reason)
                                        else{
                                                console.log(obj.response.host);
                                                //url = ''+obj.response.host+'');
                                                location.href =(obj.response.host);     
                                        }
                                }                          
                        });
                        return false; // Evitar ejecutar el submit del formulario.
                });                                     
        });
});
</script>
</body>
</html>
