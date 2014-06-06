<!DOCTYPE html>
<html lang="es-es">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>@rribasjavier</h1>
		<h2>Recuperación de contraseña</h2>
		<div>
			Para recuperar la contraseña de la cuenta rellene el formulario de la pagina:
			<br>
			{{ URL::to('user/reset', array($token)) }}.
		</div>
	</body>
</html>
