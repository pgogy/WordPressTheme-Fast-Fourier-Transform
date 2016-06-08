<?PHP

	if(get_theme_mod("search")=="on"){

	?><div id="search">
		<form action="<?PHP echo home_url(); ?>" method="GET">
			<input type="text" class='fast_fourier_transform__search_box' name="s" value="<?PHP __("Search....", "fast-fourier-transform"); ?>" />
			<br />
			<input type="submit" value="<?PHP echo __("search", "fast-fourier-transform"); ?>" />
		</form>
	</div>
	<?PHP
	
	}
	
?>