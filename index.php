<?php 
session_start();
require_once('funciones/php/funciones.php');
$mensaje = "";
if(isset($_POST[encriptar_PHP('login')])){

	$_SESSION[encriptar_PHP('user')] = $_POST[encriptar_PHP('user')];
	$_SESSION[encriptar_PHP('pass')] = encriptar_PHP($_POST[encriptar_PHP('pass')]); 
	$login = validar_usuario();
	$_SESSION[encriptar_PHP('rol')] = encriptar_PHP($login['id_rol']);
	if(sizeof($login)>1){
		header ("Location: formularios/inicio.php");
	}else{
		$mensaje = "<div class='alert alert-danger' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> <center><strong>Error de inicio!</strong> ¡Datos incorrectos!.</center> </div>";
	}
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="funciones/css/bootstrap.min.css">
	<link rel="stylesheet" href="funciones/css/estilo.css">
	<title>CRAB Software</title>
</head>
<body class="login">
	<div class="container-fluid">
		<?php  echo $mensaje;?>
		<div class="row">
			<div class="col-md-6 yopal">
			<div class="background"></div>
			<div class="filtro"></div>
				<div class="logos">
					<img src="imagenes/fondo.png" class="logo-yopal img-fluid mx-auto d-block">
				</div>
			</div>
			<div class="col-md-6 ingreso">
				<div class="loginform">
                    <img src="imagenes/crab.png" class="logo-barracuda img-fluid mx-auto d-block">
						<h1 class="title text-center" id="login">INICIO DE SESIÓN</h1>
						<form method="post">
							<div class="form-group">
								<label class="col-form-label">Usuario</label>
								<input type="text" name="<?php echo encriptar_PHP('user')?>" class="form-control form-control-lg" />
							</div>
							<div class="form-group">
								<label class="col-form-label">Contraseña</label>
								<input type="password" name="<?php echo encriptar_PHP('pass')?>" class="form-control form-control-lg" />
							</div>
							<button type="submit" name="<?php echo encriptar_PHP('login')?>"
								class="w-100 btn btn-lg btn-success mt-4">INGRESAR</button>
						</form>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright text-center py-3">© 2020 Copyright:
			<a href="https://barracuda.com.co/">https://www.barracuda.com.co</a>
	</div>
	<script src="funciones/js/jquery.js"></script>
	<script src="funciones/js/bootstrap.min.js"></script>
	<script src="funciones/js/funciones_js.js"></script>
	<script type="text/javascript">
		alerta();
	</script>
</body>

</html>