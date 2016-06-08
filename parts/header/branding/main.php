<?PHP
	if(get_theme_mod("menu")=="top" || get_theme_mod("sitename")=="top"){
		?>
		<div id="header-area-top" class="sidebar sidebar-centre">
			<header id="masthead" class="site-header" role="banner">
				<?PHP
					if(get_theme_mod("sitename")=="top"){
						?>
							<div class="site-branding">
						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?PHP echo get_bloginfo('name'); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?PHP echo get_bloginfo('name'); ?></a></p>
						<?php endif;
						?></div><?PHP
					}
					
					if(get_theme_mod("menu")=="top"){
						get_template_part( 'parts/header/menu/standard'); 
					}
				?>
			</header><!-- .site-header -->
		</div>				
		<?PHP
	}
?>