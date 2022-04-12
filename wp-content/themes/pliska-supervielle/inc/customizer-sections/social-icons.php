<?php
/**
 * Register Social Menu Section in the theme customizer.
 *
 * @package pliska
 */

function pliska_register_social_icons_theme_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'social_icons_section',
		array(
			'title'       => __( 'Liens réseaux sociaux', 'pliska' ),
			'description' => __( "Ajoutez des icones de reseaux social dans le pied de page, il faut juste copier et coller un lien.", 'pliska' ),
		)
	);

	$wp_customize->add_setting(
		'phone_control',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'phone_control',
		array(
			'label'       => __( 'Numero de téléphone', 'pliska' ),
			'section'     => 'social_icons_section',
			'type'        => 'url',
			'description' => esc_html__( 'Ajoutez un numero de telephone', 'pliska' ),
		)
	);

	$wp_customize->add_setting(
		'facebook_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'facebook_url',
		array(
			'label'       => __( 'Facebook Url', 'pliska' ),
			'section'     => 'social_icons_section',
			'type'        => 'url',
			'description' => esc_html__( 'Ajoute un liens pour un compte Facebook.', 'pliska' ),
		)
	);

	$wp_customize->add_setting(
		'twitter_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'twitter_url',
		array(
			'label'       => __( 'Twitter Url', 'pliska' ),
			'section'     => 'social_icons_section',
			'type'        => 'url',
			'description' => esc_html__( 'Ajoutez le liens sur un compte twitter.', 'pliska' ),
		)
	);

	$wp_customize->add_setting(
		'youtube_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'youtube_url',
		array(
			'label'       => __( 'Youtube Url', 'pliska' ),
			'section'     => 'social_icons_section',
			'type'        => 'url',
			'description' => esc_html__( 'Ajoutez un liens sur une chaine youtube.', 'pliska' ),
		)
	);


	$wp_customize->add_setting(
		'mail_control',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'mail_control',
		array(
			'label'       => __( 'Adresse email', 'pliska' ),
			'section'     => 'social_icons_section',
			'type'        => 'url',
			'description' => esc_html__( 'Ajoutez une addresse email', 'pliska' ),
		)
	);

}

add_action( 'customize_register', 'pliska_register_social_icons_theme_customizer' );
