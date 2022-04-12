<?php

/*
 * Allow users to change or remove the call to action on the Homepage
 * and customize the header image
 */

function pliska_customize_register_banner_and_header( $wp_customize ) {
	/*
	 * HEADER IMAGE OPTIONS
	 *
	 */

	$wp_customize->add_panel(
		'pliska_header_options',
		array(
			'title'       => __( 'Options d\'entête', 'pliska' ),
			'description' => esc_html__( 'Personnalisez l\'image d\'en-tête à votre goût avec les options ci-dessous. Modifiez la largeur, la hauteur et la position de l\'image. Choisissez d\'ajouter ou de supprimer l\'effet de parallaxe sur l\'image. Personnalisez le bouton d\'appel à l\'action sur l\'en-tête de la page d\'accueil. Remarque : pour que ces options fonctionnent, assurez-vous qu\'une image d\'en-tête est spécifiée dans la section « Image d\'en-tête', 'pliska' ),
			'priority'    => 160,
		)
	);

	$wp_customize->add_section(
		'header_menu',
		array(
			'title'       => esc_html__( "Options du menu", 'pliska' ),
			'description' => esc_html__( "CPersonnalisez la barre de menu supérieure. Affichez-le uniquement en haut de la page (position statique), affichez-le tout le temps (fixe) ou affichez-le lorsque vous faites défiler vers le haut (collant). La position par défaut est collante.", 'pliska' ),
			'panel'       => 'pliska_header_options',
		)
	);
	$wp_customize->add_section(
		'header_image_options',
		array(
			'title'       => esc_html__( "Options de l'entête", 'pliska' ),
			'description' => esc_html__( "Personnalisez l'image d'en-tête à votre goût avec les options ci-dessous. Modifiez la largeur, la hauteur et la position de l'image. Choisissez d'ajouter ou de supprimer l'effet de parallaxe sur l'image. Personnalisez le bouton d'appel à l'action sur l'en-tête de la page d'accueil. Remarque : pour que ces options fonctionnent, assurez-vous qu'une image d'en-tête est spécifiée dans la section « Image d'en-tête .", 'pliska' ),
			'panel'       => 'pliska_header_options',
		)
	);

	$wp_customize->add_section(
		'call_to_action',
		array(
			'title'       => esc_html__( 'Boutons d\'actions', 'pliska' ),
			'description' => esc_html__( "Personnalisez l'image d'en-tête à votre goût avec les options ci-dessous. Modifiez la largeur, la hauteur et la position de l'image. Choisissez d'ajouter ou de supprimer l'effet de parallaxe sur l'image. Personnalisez le bouton d'appel à l'action sur l'en-tête de la page d'accueil. Remarque : pour que ces options fonctionnent, assurez-vous qu'une image d'en-tête est spécifiée dans la section Image d'en-tête. ", 'pliska' ),
			'panel'       => 'pliska_header_options',
		)
	);

	$wp_customize->add_section(
		'header_animations',
		array(
			'title'       => esc_html__( 'Animations du titre', 'pliska' ),
			'description' => esc_html__( 'anime le titre durant le chargement.', 'pliska' ),
			'panel'       => 'pliska_header_options',
		)
	);

	// Header Menu Position

	$wp_customize->add_setting(
		'header-menu-position',
		array(
			'default'           => 'sticky',
			'sanitize_callback' => 'pliska_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'header-menu-position',
		array(
			'label'       => esc_html__( 'Position du menu', 'pliska' ),
			'section'     => 'header_menu',
			'description' => esc_html__( "Positionnez le menu pour qu'il reste en haut de l'écran lors du défilement vers le bas ou gardez-le au-dessus du pli.", 'pliska' ),
			'type'        => 'select',
			'choices'     => array(
				'fixed'  => esc_html( 'fixé' ),
				'sticky' => esc_html( 'collant' ),
				'static' => esc_html( 'statique' ),
			),
		)
	);

	// Header Image on All Pages
	$wp_customize->add_setting(
		'show-header-image-homepage',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'show-header-image-homepage',
		array(
			'label'       => esc_html__( "Affichez l'image d'en-tête du site en tant qu'image de secours lorsqu'il n'y a pas d'image en vedette sur des articles et des pages uniques. ", 'pliska' ),
			'section'     => 'header_image_options',
			'description' => esc_html__( "Affichez l'image d'en-tête globale de la section Image d'en-tête sur tous les articles et pages qui n'ont pas d'image en vedette spécifiée. Décocher cette option conservera l'image d'en-tête globale sur la page d'accueil, la page du blog et les archives des articles uniquement. Utile lorsque vous souhaitez développer votre site avec un constructeur de pages ou des blocs Gutenberg ", 'pliska' ),
			'type'        => 'checkbox',
		)
	);

	// Header Image on All Pages
	$wp_customize->add_setting(
		'show-header-image-post-archives',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'show-header-image-post-archives',
		array(
			'label'       => esc_html__( 'Afficher l\'image d\'en-tête du site sur les archives des articles ', 'pliska' ),
			'section'     => 'header_image_options',
			'description' => esc_html__( 'Afficher l\'image d\'en-tête globale sur les archives de publication .', 'pliska' ),
			'type'        => 'checkbox',
		)
	);


	// Header background size
	$wp_customize->add_setting(
		'header_background_size',
		array(
			'default'           => 'couvert',
			'sanitize_callback' => 'pliska_sanitize_select',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_background_size',
		array(
			'label'       => esc_html__( "Taille de l'arrière-plan de l'en-tête ", 'pliska' ),
			'section'     => 'header_image_options',
			'description' => esc_html__( "Redimensionnez l'image d'en-tête pour l'ajuster à la largeur de tout l'écran ou choisissez de conserver sa largeur initiale" , 'pliska' ),
			'type'        => 'select',
			'choices'     => array(
				'initial' => esc_html( 'initial' ),
				'cover'   => esc_html( 'couvert' ),
			),
		)
	);

	// Header Image Position
	$wp_customize->add_setting(
		'header_background_position',
		array(
			'default'           => 'centré',
			'sanitize_callback' => 'pliska_sanitize_select',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_background_position',
		array(
			'label'       => esc_html__( "Position d'arrière-plan de l'en-tête" , 'pliska' ),
			'section'     => 'header_image_options',
			'description' => esc_html__( "Choisissez comment vous souhaitez positionner l'image d'en-tête." , 'pliska' ),
			'type'        => 'select',
			'choices'     => array(
				'top'    => esc_html( 'haut' ),
				'center' => esc_html( 'centré' ),
				'bottom' => esc_html( 'bas' ),
			),
		)
	);

	// Header Height

	$wp_customize->add_setting(
		'header_image_height',
		array(
			'default'           => '100vh',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_image_height',
		array(
			'label'       => esc_html__( "Taille de l'image d'entête", 'pliska' ),
			'section'     => 'header_image_options',
			'type'        => 'text',
			'description' => esc_html__( "Modifiez la hauteur de l'image d'en-tête. La taille recommandée est comprise entre 60 et 100vh (la valeur par défaut est 100vh). Remarque : ce paramètre est uniquement destiné aux grands écrans de bureau afin d'éviter le chevauchement de texte." , 'pliska' ),
		)
	);

	// Header Parallax Effect
	$wp_customize->add_setting(
		'header_background_attachment',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_background_attachment',
		array(
			'label'       => esc_html__( "Options de parralaxe sur l'entête", 'pliska' ),
			'section'     => 'header_image_options',
			'description' => esc_html__( "Ajoutez un bel effet de parallaxe sur l'image d'en-tête. Essayez-le en faisant défiler la page vers le bas." , 'pliska' ),
			'type'        => 'checkbox',
		)
	);

	// Header Gradient

	$wp_customize->add_setting(
		'gradient_direction',
		array(
			'default'           => 'left',
			'sanitize_callback' => 'pliska_sanitize_select',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'gradient_direction',
			array(
				'label'   => esc_html__( 'Direction des Gradient', 'pliska' ),
				'section' => 'header_image_options',
				'type'    => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'pliska' ),
					'right'  => esc_html__( 'Right', 'pliska' ),
					'top'    => esc_html__( 'Top', 'pliska' ),
					'bottom' => esc_html__( 'Bottom', 'pliska' ),
				),
			)
		)
	);

	// Gradient Opacity

	function pliska_customize_gradient_range() {
		return apply_filters(
			'pliska_customize_gradient_range',
			array(
				'min'  => 0,
				'max'  => 9,
				'step' => 1,
			)
		);
	}

	$wp_customize->add_setting(
		'header_gradient_density',
		array(
			'default'           => '4',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'header_gradient_density',
		array(
			'label'       => __( "Densité de gradient d'image d'en-tête", 'pliska' ),
			'description' => __( "Contrôlez la densité du dégradé. De 0 à 10. La valeur par défaut est 4. Réglez-le sur 0 pour supprimer tout le dégradé.", 'pliska' ),
			'section'     => 'header_image_options',
			'type'        => 'range',
			'input_attrs' => pliska_customize_gradient_range(),
		)
	);

	// Header Overlay Opacity

	function pliska_customize_opacity_range() {
		return apply_filters(
			'pliska_customize_opacity_range',
			array(
				'min'  => 0,
				'max'  => 9,
				'step' => 1,
			)
		);
	}

	$wp_customize->add_setting(
		'cover_template_overlay_opacity',
		array(
			'default'           => '1',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'cover_template_overlay_opacity',
		array(
			'label'       => __( 'Superposition Opacité-Densité', 'pliska' ),
			'description' => __( "Assurez-vous que le contraste est suffisamment élevé pour que le texte soit lisible. Pour modifier la superposition d'animation d'opacité au défilement, allez dans l'onglet << Animations d'en-tête >>", 'pliska' ),
			'section'     => 'header_image_options',
			'type'        => 'range',
			'input_attrs' => pliska_customize_opacity_range(),
		)
	);

	/*
	 * CALL TO ACTION
	 */



	// Banner label
	// Banner Link
	// Meta arrow

	$wp_customize->add_setting(
		'show_meta_arrow',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_meta_arrow',
		array(
			'label'       => esc_html__( 'Montrer la fleche vers le contenu', 'pliska' ),
			'description' => esc_html__( 'Montre une fleche en direction du corps de texte', 'pliska' ),
			'section'     => 'header_image_options',
			'type'        => 'checkbox',
		)
	);

	// Overlay Animation
	$wp_customize->add_setting(
		'header_text_animation_enable_homepage_only',
		array(
			'default'           => 0,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'header_text_animation_enable_homepage_only',
		array(
			'label'       => esc_html__( "Activer l'animation de texte d'en-tête sur la page d'accueil uniquement", 'pliska' ),
			'section'     => 'header_animations',
			'description' => esc_html__( "Par défaut, l'animation du texte de l'en-tête est affichée sur l'ensemble du site Web. Cochez cette option si vous souhaitez afficher l'animation du titre de la page uniquement sur la page d'accueil.", 'pliska' ),
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'header_text_animation',
		array(
			'default'           => 'bounce',
			'sanitize_callback' => 'pliska_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'header_text_animation',
		array(
			'label'       => esc_html__( 'Animation du titre', 'pliska' ),
			'section'     => 'header_animations',
			'description' => esc_html__( ' Choisissez comment animer le titre.', 'pliska' ),
			'type'        => 'select',
			'choices'     => array(
				'bounce'    => esc_html( 'Zoommer et rebondissement' ),
				'slide_left_right' => esc_html( 'glisse de droite à gauche' ),
				'typewrite' => esc_html( 'Ecriture au clavier' ),
				'none'      => esc_html( 'aucun' ),
			),
		)
	);

	// Overlay Animation
	$wp_customize->add_setting(
		'header_scroll_animation',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'header_scroll_animation',
		array(
			'label'       => esc_html__( "Animation d'opacité de superposition d'image d'en-tête ", 'pliska' ),
			'section'     => 'header_animations',
			'description' => esc_html__( "Activer l'animation de superposition lors du défilement de la page. L'image d'en-tête s'assombrit lors du défilement de la page.<", 'pliska' ),
			'type'        => 'checkbox',
		)
	);
}

add_action( 'customize_register', 'pliska_customize_register_banner_and_header', 20 );

function pliska_customize_header_menu_options() {

	// get menu colors
	$top_menu_text_color = get_theme_mod( 'nav_top_menu_text_color', '#666' );
	$top_menu_bgr_color  = get_theme_mod( 'nav_top_menu_bgr_color', '#fff' );

	// static vs sticky header
	$header_menu_position = get_theme_mod( 'header-menu-position', 'sticky' );

	if ( $header_menu_position == 'static' ) { // static header ?>

	<style>

	.main-navigation-container {
		background-color: #fff;
		position: relative;
		z-index: 9;
	}

	.menu-toggle .burger,
	.menu-toggle .burger:before,
	.menu-toggle .burger:after {
		border-bottom: 2px solid #333;
	}

	@media (min-width: 40em) {
	.site-menu a {
		color: <?php echo esc_attr( $top_menu_text_color ); // WPCS: XSS ok. ?>;
		}
	.site-menu ul ul a {
		color: #fff;
		}
	}
	</style>

		<?php

	} else { // sticky header
		?>
	<style>

	.main-navigation-container {
		background: transparent;
		position: fixed;
		z-index: 9;
		transition: background-color .15s ease-out;
	}

	.main-navigation-container.fixed-header {
		background-color: #fff;
	}

	.menu-toggle .burger,
	.menu-toggle .burger:before,
	.menu-toggle .burger:after {
		border-bottom: 2px solid #f7f7f7;
	}

	.fixed-header .menu-toggle .burger,
	.fixed-header .burger:before,
	.fixed-header .burger:after {
		border-bottom: 2px solid #333;
	}

	.main-navigation-container .site-title a, .main-navigation-container p.site-description {
		color: #fff;
	}
	.fixed-header .site-title a, .fixed-header p.site-description {
		color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
	}
	.no-header-image .site-title a, .no-header-image p.site-description {
		color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
	}

	.fixed-header {
		top: 0;
	}

	@media (min-width: 40em) {
		.fixed-header {
			top: auto;
		}
		.site-menu a {
			color: #fff;
		}
	}
	</style>
	<script>
	</script>
		<?php
	}
}

add_action( 'wp_head', 'pliska_customize_header_menu_options' );

// Customize header animations

function pliska_customize_header_animations() {

	$animation                     = get_theme_mod( 'header_text_animation', 'bounce' );
	$is_display_animation_homepage = get_theme_mod( 'header_text_animation_enable_homepage_only', 0 );
	// five letters per second typewrite animation
	$typewrite_duration            = pliska_get_page_title_length() / 5;
	$cursor_duration               = ceil( pliska_get_page_title_length() /4 );
	$typewrite_letters_number      = pliska_get_page_title_length();
	$secondary_accent_color        = get_theme_mod( 'secondary_accent_color', '#fbc02d' );
	if ( $animation == 'none' ) {
		return;
	}

	if ( $is_display_animation_homepage ) {
		if (!is_front_page() && !( is_front_page() && is_home() ) ) return;
	}

	if ( $animation == 'slide_left_right' ) {
		?>
		<style>
		#header-page-title .entry-title {
			animation-name: moveInleft;
			animation-duration: 3s;
		}

		#header-page-title .description {
			animation-name: moveInRight;
			animation-duration: 3s;
		}
		</style>

		<?php

	} elseif ( $animation == 'bounce' ) {
		?>
		<style>
		#header-page-title h1 span {
			display: inline-block;
			animation: bounce 1s ease-in-out;
		}
		#header-page-title-inside {
			animation: 1s pliska_zoom_in_header ease-in-out forwards 0s;
			z-index: 10;
			opacity: 0;
			position: relative;
		}
		</style>

		<?php
	} elseif ( $animation == 'typewrite' ) {
		if(is_search( )) return;
		?>
		<style>
			@media only screen and (min-width:40em){
				#header-page-title h1 {
					font-family: monospace;
					display: inline-block;
					overflow: hidden;
					letter-spacing: 2px;
					animation: typing <?php echo esc_attr( $typewrite_duration ); ?>s steps(<?php echo esc_attr( $typewrite_letters_number ); ?>, end), blink .8s step-end <?php echo esc_attr( $cursor_duration ); ?> forwards;
					white-space: nowrap;
					font-weight: 700;
					box-sizing: border-box;
					<?php if( is_rtl() ) : ?>
						border-left: 4px solid <?php echo esc_attr( $secondary_accent_color ); ?>;
					<?php else : ?>
						border-right: 4px solid <?php echo esc_attr( $secondary_accent_color ); ?>;
					<?php endif; ?>
				}
			}
			@keyframes typing {
				from {
					width: 0%
				}
				to {
					width: 100%
				}
			}
			@keyframes blink {
				from, to {
					border-color: transparent
				}
				50% {
					border-color: <?php echo esc_attr( $secondary_accent_color ); ?>;
				}
			}
		</style>

		<?php
	}

}

add_action( 'wp_head', 'pliska_customize_header_animations' );
