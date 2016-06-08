<?PHP
	if(get_theme_mod("navigation")=="fixed"){
		?><div class="pad">&nbsp;</div><?PHP
	}

	if(get_theme_mod("menu")=="bottom" || get_theme_mod("menu")=="middle" || get_theme_mod("sitename")=="bottom"){
		?>
		<div id="header-area-bottom" class="sidebar sidebar-centre">
			<header id="masthead" class="site-header" role="banner">
				<?PHP
					if(get_theme_mod("menu")=="middle"){
						get_template_part( 'parts/header/menu/standard'); 
					}
					
					if(get_theme_mod("sitename")=="bottom"){
						?>
							<div class="site-branding">
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?PHP echo get_bloginfo('name'); ?></a></h1>
							</div>
						<?PHP
					}
					
					if(get_theme_mod("menu")=="bottom"){
						get_template_part( 'parts/header/menu/standard'); 
					}
				?>
			</header><!-- .site-header -->
		</div>				
		<?PHP
	}
?>