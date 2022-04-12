<?php
/**
 * Register Blog Settings Section in the theme customizer.
 *
 * @package pliska
 * @since 1.0.0
 */
function pliska_register_blog_theme_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'blog_options',
		array(
			'title'       => esc_html__( 'Options des articles', 'pliska' ),
			'description' => esc_html__( 'Choisissez quel informations relatives aux articles a montrer. Cela inclus date de publication, auteur, categorie tag ou commentaire.', 'pliska' ),
		)
	);
	/* Show categories entry meta */
	$wp_customize->add_setting(
		'show_post_categories',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_post_categories',
		array(
			'label'       => esc_html__( 'Montrer les categories', 'pliska' ),
			'description' => esc_html__( 'Montrer les categories, associés a l\'article.', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	/* Show Published date entry meta */
	$wp_customize->add_setting(
		'show_post_date',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_post_date',
		array(
			'label'       => esc_html__( 'Montrer la date de l\'article', 'pliska' ),
			'description' => esc_html__( 'Montrer la date de publication de l\'article.', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	/* Show Published date entry meta */
	$wp_customize->add_setting(
		'show_modified_date',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_modified_date',
		array(
			'label'       => esc_html__( 'Montrer la date de modification', 'pliska' ),
			'description' => esc_html__( 'Montrer la date de quand l\article as t\'il été modifié la derniere fois.', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	// show_time_to_read


	/* Show Published author entry meta */
	$wp_customize->add_setting(
		'show_post_author',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_post_author',
		array(
			'label'       => esc_html__( 'Montrer l\'auteur de l\'article', 'pliska' ),
			'description' => esc_html__( 'Montrer l\'auteur de l\'article<', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);
	/* Show tags entry meta */
	$wp_customize->add_setting(
		'show_post_tags',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_post_tags',
		array(
			'label'       => esc_html__( 'Montrer les tags', 'pliska' ),
			'description' => esc_html__( 'Montrer les tags associés a l\'article', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);
	/* Show Post Comments */
	$wp_customize->add_setting(
		'show_post_comments',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_post_comments',
		array(
			'label'       => esc_html__( 'Montrer les commentaires', 'pliska' ),
			'description' => esc_html__( '', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);
	/* Show or hide breadcrumbs */
	$wp_customize->add_setting(
		'show_breadcrumbs',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'show_breadcrumbs',
		array(
			'label'       => esc_html__( 'Montrer le chemin de l\'article', 'pliska' ),
			'description' => esc_html__( '', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_page_breadcrumbs',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'show_page_breadcrumbs',
		array(
			'label'       => esc_html__( 'Montrer le chemin de la page', 'pliska' ),
			'description' => esc_html__( '', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);



	//articles en relations
	$wp_customize->add_setting(
		'show_related_posts',
		array(
			'default'           => 1,
			'sanitize_callback' => 'pliska_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_related_posts',
		array(
			'label'       => esc_html__( 'Montrer des articles similaires', 'pliska' ),
			'description' => esc_html__( '', 'pliska' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	//articles en relations default img url

    $wp_customize->add_setting('image_control_one', array(
        'default' => esc_url(get_template_directory_uri()) . '/assets/img/300X225.jpg',
        'section' => 'blog_options',
        'sanitize_callback' => 'pliska_sanitize_image',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control_one',
		array(
			'label' => __('image par defaut', 'pliska'),
			'section' => 'blog_options',
			'description' => esc_html__( 'une image de font apparait par defaut si aucune image n\'as été donnée a l\'article. Taille recomandée 300X225px', 'pliska' ),
			'type' => 'image',
		))
    );

}

add_action( 'customize_register', 'pliska_register_blog_theme_customizer' );
