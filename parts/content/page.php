<article id="post-<?php the_ID(); ?>">
	<header class="entry-header" style="<?php fast_fourier_transform__post_colour_background(); ?>">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'fast-fourier-transform' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->