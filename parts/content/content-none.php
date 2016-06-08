<article id="post-<?php the_ID(); ?>">
	<header class="entry-header" style="<?php fast_fourier_transform__post_colour_background(); ?>">
		<h1 class="entry-title">
			<?PHP
				echo sprintf(
					 __( 'Sorry, Nothing found for %s', 'fast-fourier-transform' ), $_GET['s']
				);
			?>
		</h1>
	</header>
</article><!-- #post-## -->
