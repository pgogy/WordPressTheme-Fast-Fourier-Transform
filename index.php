<?php

get_header(); 

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?PHP
				get_template_part( 'parts/home/home' );
			?>			
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?PHP
	if(get_theme_mod("pagination")=="on"){
	
		get_template_part('parts/pagination/pagination');
	
	}
	
	if(get_theme_mod("search")=="on"){
	
		get_template_part('parts/search-form/standard');
	
	}
	?>
<?php get_footer(); ?>
