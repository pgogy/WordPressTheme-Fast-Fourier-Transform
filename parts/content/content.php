<article id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			endif;
		
			fast_fourier_transform_single_line($post);
		
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'fast-fourier-transform' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fast-fourier-transform' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'fast-fourier-transform' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?PHP
		fast_fourier_transform_single_line($post);
	?>
	<footer class="entry-footer">
		<?php fast_fourier_transform_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'fast-fourier-transform' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	<?PHP
		fast_fourier_transform_single_line($post);
	?>
</article><!-- #post-## -->