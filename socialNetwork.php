<?php
// Define el titulo del menu
$themename = "Social Media";

// Define un nombre corto. Este nombre sera utilizado para definir las variables 
$shortname = "rs";

// Definimos el array de valores que tiene que mostrarse en el formulario
$options = array (
	array(
		"name" => $themename,
		"type" => "title"
	),
	array(
		"name" => "Linkedin",
		"desc" => "Indica tu url de Linkedin (https://www.linkedin.com/...)",
		"id" => $shortname."_linkedin",
		"type" => "text",
		"default" => "https://www.linkedin.com/"
	),
	/* array(
		"name" => "Twitter",
		"desc" => "Indica tu url de Twitter (https://twitter.com/...)",
		"id" => $shortname."_twitter",
		"type" => "text",
		"default" => ""
	), */
	array(
		"name" => "Instagram",
		"desc" => "Indica tu url de Instagram (https://Instagram.com/...)",
		"id" => $shortname."_instagram",
		"type" => "text",
		"default" => "https://Instagram.com/"
	),
	array(
		"name" => "Show / Hide",
		"id" => $shortname."_show",
		"type" => "select",
		"options" => array("si", "no"),
		"default" => "si"
	),
);
 
add_action('admin_menu', 'panel_menu');
 
/**
 ** Funcion que define el menu y guarda los datos si se han modificado
 **/
function panel_menu(){
	global $themename, $shortname, $options;
	$page = "Social Media";
 
	saveFormTheme_admin( $options, $page );
	add_menu_page(
		'Social Media',
		$themename, 		//Nombre a mostrar submenu opciones
		'manage_options',	//nivel de usuario que puede ver el panel
		$page, 				//identificador de mi panel dentro de wordpress
		'panel_options_menu'//función que mostrará las opciones dentro del panel
	);
}
 
/**
 ** Función que muestra el formulario e indica si se han guardado los datos.
 **/
function panel_options_menu(){
	global $themename, $shortname, $options;
    if ( isset($_POST['save']) ) 
    echo '<p><strong>'.$themename.' ha sido guardado...</strong></p>';
	showFormTheme_admin( $options );
}
 
/**
 ** Funcion encargada de guardar los valores del formulario o actualizarlos en la base de datos
 **/
function saveFormTheme_admin($options,$page){
	if(isset( $_GET['page'] ) && $_GET['page'] == $page )
	{
		if(isset($_POST['save']))
		{
			echo "<br>".$_GET['page'];
			foreach ($options as $value)
			{
				if(isset($value['id']))
					update_option($value['id'], $_POST[$value['id']]);
			}
			foreach($options as $value)
			{
				if(isset($value['id']))
				{
					if(isset($_POST[$value['id']]))
					{
						update_option($value['id'], $_POST[$value['id']]);
					} else {
						delete_option($value['id']);
					}
				}
			}
		}
	}
}
 
/**
 ** Funcion que muestra el formulario con los valores recibidos en el array $options
 **/
function showFormTheme_admin($options){
	?>
	<div class="form-wrap">
		<form method="post">
			<?php
			foreach ($options as $value)
			{
				if($value['type']=="title"){
					?>
					<h2><?php echo $value['name']; ?></h2>
					<?php
				}elseif($value['type']=="text"){
					?>
					<div class="form-field">
						<label><?php echo $value['name']; ?></label>
						<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default']; } ?>">
						<p><?php if(isset($value['desc'])) echo $value['desc']; ?></p>
					</div>
					<?php
				}elseif($value['type']=='textarea'){
					?>
					<div class="form-field">
						<label><?php echo $value['name']; ?></label>
						<textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['default']; } ?></textarea>
						<p><?php if(isset($value['desc'])) echo $value['desc']; ?></p>
					</div>
					<?php
				}elseif($value['type']=='select'){
					?>
					<div class="form-field">
						<label><?php echo $value['name']; ?></label>
						<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
						<?php
						foreach ($value['options'] as $option)
						{
							?>
							<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['default']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
							<?php
						}
						?>
						</select>
						<p><?php if(isset($value['desc'])) echo $value['desc']; ?></p>
					</div>
					<?php
				}elseif($value['type']=='checkbox'){
					?>
					<div class="form-field">
						<label><?php echo $value['name']; ?></label>
						<?php
						if(get_option($value['id']))
						{
							$checked = "checked=\"checked\"";
						}else{
							$checked = "";
						}
						?>
						<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?>>
						<p><?php if(isset($value['desc'])) echo $value['desc']; ?></p>
					</div>
					<?php
				}
			}
			?>
			<p class="submit">
				<input name="save" type="submit" id="submit" class="button button-primary" value="Guardar cambios">
			</p>
		</form>
	</div>
	<?php
}
?>