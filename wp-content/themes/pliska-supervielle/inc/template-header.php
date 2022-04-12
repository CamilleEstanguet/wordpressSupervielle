<?php
/**
 * Display Header With Featured Image
 */
function pliska_header_title() { ?>

	<div id="header-page-title">

		<div id="header-page-title-inside">

		<?php
		// If the homepage displays blog posts, show site title
		if ( is_front_page() && is_home() ) {
			echo '<div class="page-title"><h1 class="entry-title" ' . pliska_schema_microdata( 'entry-title', 0 ) . '>' . esc_html( get_bloginfo( 'name', 'pliska' ) ) . '</h1></div><p class="description">' . esc_html( get_bloginfo( 'description', 'pliska' ) ) . '</p>';

			// Display call to action
			//do_action( 'pliska_call_to_action_hook' );

		}
		// if homepage is a static page, display the page title and description
		elseif ( is_front_page() && ! is_home() ) {

			echo '<div class="page-title"><h1 class="entry-title"' , pliska_schema_microdata( 'entry-title', 0 ) ,  '>' , the_title() , '</h1></div>' , has_excerpt()? '<p class="description">' . wp_kses_post( get_the_excerpt() ) . '</p>' : '';

			// Display call to action
			//do_action( 'pliska_call_to_action_hook' );
		}
		// if a static page for blog posts is selected, display its title and description
		elseif ( ! is_front_page() && is_home() ) {
			echo '<div class="page-title"><h1 class="entry-title"' , pliska_schema_microdata( 'entry-title', 0 ) ,  '>' , single_post_title() , '</h1></div>' , get_the_excerpt( get_queried_object() )? '<p class="description">' . wp_kses_post( get_the_excerpt( get_queried_object() ) ) . '</p>' : '';
		}

			// if it is a normal single page or post, wrap the header text and display post title
		elseif ( is_page() ) {
			echo '<div class="page-title"><h1 class="entry-title"' , pliska_schema_microdata( 'entry-title', 0 ) ,  '>' , the_title() , '</h1></div>';

		}
		// if it is a normal single page or post, wrap the header text and display post title
		elseif ( is_singular() ) {
			echo '<div class="post-title"><h1 class="entry-title"' , pliska_schema_microdata( 'entry-title', 0 ) ,  '>' , the_title() , '</h1></div>';

		} else {
			echo '<h1 class="entry-title">';
			if ( function_exists( 'is_shop' ) && is_shop() ) {
				echo wp_kses( get_the_title( wc_get_page_id( 'shop' ) ), array() );
			} elseif ( is_archive() ) {
				echo  get_the_archive_title();
			}
			if ( is_search() ) {
				printf( __( 'Resultat de recherche pour: %s', 'pliska' ), '' . get_search_query() . '' );
			}
			if ( is_404() ) {
				_e( 'Not Found', 'pliska' );
			}
			echo '</h1>';
		}
		// Single Posts and pages. DIsplay post excerpt
		if ( is_singular() && has_excerpt() && !is_front_page() ) {
			echo '<div class="description">' , wp_kses_post( get_the_excerpt() ) , '</div>';
		}
		if ( ( is_archive() && ! function_exists( 'is_shop' ) ) || ( is_archive() && ! is_shop() ) ) {
			echo '<div class="description">' , wp_kses_post( get_the_archive_description() )  , '</div>';
		}
		if ( is_search() ) {
			echo get_search_form();
		}
		// Single Posts. Post Meta after Header Title
		if ( is_single() ) { ?>
			<div class="after-title-meta">
				<?php do_action( 'pliska_header_after_title_meta_hook' ); ?>
			</div> <?php
		}
		?>

		</div>
	</div>

	<?php
	// Meta Arrow
		do_action( 'pliska_meta_arrow_hook' );
	?>
	<?php
}
