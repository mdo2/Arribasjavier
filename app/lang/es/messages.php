<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Messages Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default messages used by
	| the portal.
	|
	*/
	/* Form Fields */
	"email-field" => "Email",
	"password-field" => "Contraseña",
	"password-confirmation-field" => "Confimación de contraseña",
	"submit-button" => "Enviar",
	
	
	/* User  */
	
		/* Password recovery */

		"password-recovery-system" => "
			<p class='lead'>Sistema de recuperación de contraseña</p>
				<p>
					Para recuperar una cuenta de la cual no se tiene o no se recuerda la contraseña solo hay que <b>introducir el email de dicha cuenta en el formulario</b> de abajo y hacer click en 'Enviar'.
				</p>
				<p>
					A continuación se le enviara un correo electrónico al email facilitado si existe una cuenta con dicha dirección. En ese correo se especificará un enlace, el cual, al hacer clik se le dirigira a una pagina donde especificar la nueva contraseña para la cuenta con el correo en cuestión.
			</p>",
		"password-recovery-email-label" => "Email de la cuenta a recuperar",
		"password-recovery-email-placeholder" => "ejemplo@dominio.com",
		"password-recovery-email-button" => "Enviar",
		
		/* Password reset */
		"password-reset-text" => "
			<p class='lead'>
				Restauración de contraseña
			</p>
			<p>
				Para restablecer la contraseña de la cuenta asociada al correo donde ha recivido el enlace a esta pagina solo tiene que introducir la nueva contraseña en el formulario de abajo.
			</p>
			<p>
				Si no aparece la dirección de correo de la cuenta a recuperar, esta dirección no es la correcta o experimenta algun problema acceda <a href=\":link\">aquí</a> y repita el proceso.
			</p>
		"
);

?>