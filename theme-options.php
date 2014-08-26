<?php

/**
* Option panel  for theme display or anything else that you need
*
*
*/

// Adding the them option functionnality
function cs_child_register_settings() {
	register_setting( 'cs_child_theme_options', 
		'cs_child_options', 'cs_child_validate_options' );
	//FB::info('Info message');
}
add_action( 'admin_init', 'cs_child_register_settings' );



//building the minimal option values
$cs_child_options = array(
	'copyright' => '&copy; ' . date('Y') . get_bloginfo('name'),
	'logo' => 'yes',
	'seeAuthor' => 'no'
);

//Setting the minimal option values
$cs_child_settings = get_option( 'cs_child_options', $cs_child_options );


// Setting the options list for the admin form
$cs_child_logo = array(
	'yes' => array(
		'value' => 'yes',
		'label' => 'Display logo'
	),
	'no' => array(
		'value' => 'no',
		'label' => 'Mask logo'
	),
);
$cs_child_seeAuthor = array(
	'yes' => array(
		'value' => 'yes',
		'label' => 'Display seeAuthor'
	),
	'no' => array(
		'value' => 'no',
		'label' => 'Mask seeAuthor'
	),
);


// add menu & page to admin backoffice
function cs_child_theme_options() {
	add_theme_page( 'Options', 'Options', 	'edit_theme_options', 'cs_child_theme_options', 	'cs_child_theme_options_page' );
}
add_action( 'admin_menu', 'cs_child_theme_options' );



// Create the admin option form 
function cs_child_theme_options_page() {
	// On inclut nos tableaux globaux
	global $cs_child_options, $cs_child_logo;
	
	// Valide la soumission du formulaire
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
    ?>

	<div class="wrap">

	<?php
    // Affiche le nom de la page et son icone si celle-ci a été définie
    screen_icon();
    echo "<h2>" . get_current_theme() . __( ' Options' ) . "</h2>";
	?>

	<?php
    // Si le formulaire vient juste d'etre soumis, affiche une notification
    if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div class="updated fade">
    <p><strong><?php _e( 'Options saved' ); ?></strong></p>
    </div>
	<?php endif;?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'cs_child_options', $cs_child_options ); ?>

	<?php
    // Cette fonction retourne plusieurs champs cachés requis par le formulaire,
	// parmis lesquels un nonce ("number used once"), un nombre unique utilisé 
	// pour s'assurer que le formulaire n'ait été envoyé que depuis la page
	// d'administration. Très important pour la sécurité.
    settings_fields( 'cs_child_theme_options' );
	?>

	<table class="form-table"><!-- Désolé pour les tables ^.^ -->

	<tr valign="top">
    <th scope="row">
    <label for="cs_child_copyright">Copyright</label>
    </th>
	<td>
	<input id="cs_child_copyright" name="cs_child_options[cs_child_copyright]" type="text" 
    	value="<?php  esc_attr_e($settings['cs_child_copyright']); ?>" />
	</td>
	</tr>

	<tr valign="top"><th scope="row">logo</th>
	<td>
	<?php foreach( $cs_child_logo as $logo ) : ?>
	<input type="radio" id="<?php echo $logo['value']; ?>"  
		name="cs_child_options[logo]"
    	value="<?php esc_attr_e( $logo['value'] ); ?>" 
		<?php checked( $settings['logo'], $logo['value'] ); ?> />
	<label for="<?php echo $logo['value']; ?>">
		<?php echo $logo['label']; ?></label><br />
    <?php endforeach; ?>
	</td>
	</tr>
    
    </table>

	<p class="submit"><input type="submit" class="button-primary" 
    	value="Save" /></p>
	</form>

	</div>

	<?php
}


//validating options selected in admin form
function cs_child_validate_options( $input ) {
	global $cs_child_options, $cs_child_logo;

	$settings = get_option( 'cs_child_options', $cs_child_options );

	// Afin d'éviter des vulnérabilités comme XSS, on enlève toute balise HTML
	$input['cs_child_copyright'] = wp_filter_nohtml_kses( $input['cs_child_copyright'] );

	// Nous sauvegardons la valeur du champ pour le restaurer
	// en cas d'une entrée non valide
	$prev = $settings['logo'];
	// Vérification que l'entrée existe dans le tableau
	if ( !array_key_exists( $input['logo'], $cs_child_logo ) )
		$input['logo'] = $prev;

	return $input;
}


/* Usage in theme
global $cs_child_options;
$cs_child_settings = get_option( 'cs_child_options', $cs_child_options );

or

<?php if( $cs_child_settings['sidebar'] == 'yes' ) : ?>
	<div class="sidebar">
    ....
    </div>
    <div class="content">
    ....
    </div>
<?php else: ?>
	<div class="content">
    ....
    </div>
    <div class="sidebar">
    ....
    </div>
<?php endif; ?>

*/


