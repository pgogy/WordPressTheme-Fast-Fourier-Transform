<?php if ( have_posts() ) : 

	$counter = 1;	
		
	while ( have_posts() ) : the_post();
	
		$post->counter = $counter++;
		switch(get_theme_mod("home")){
			case "left" : get_template_part( 'parts/content/content-left', get_post_format() );
			case "center" : get_template_part( 'parts/content/content-index', get_post_format() );
		}

	endwhile;
	
else :

	get_template_part( 'content', 'none' );

endif;

?>