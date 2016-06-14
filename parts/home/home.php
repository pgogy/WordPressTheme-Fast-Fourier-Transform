<?php if ( have_posts() ) : 
	
	while ( have_posts() ) : the_post();

		switch(get_theme_mod("home_page")){
			case "left" : get_template_part( 'parts/content/content-left', get_post_format() ); break;
			case "center" : get_template_part( 'parts/content/content-index', get_post_format() ); break;
			case "compact" : get_template_part( 'parts/content/content-compact', get_post_format() ); break;
			default : get_template_part( 'parts/content/content-compact', get_post_format() ); break;
		}

	endwhile;
	
else :

	get_template_part( 'content', 'none' );

endif;

?>