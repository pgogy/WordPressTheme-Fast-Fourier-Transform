<article id="post-<?php the_ID(); ?>" <?php post_class("home-page"); ?> >
	<?PHP
		$words = explode(" ", strip_tags($post->post_content));
		?><svg>
		<line x1="0" orig_y1="40" x2="50" orig_y2="40" y1="40" x2="50" y2="40" turn="1"/><?PHP
		$last_x = 50;
		$last_y = 40;
		$space = 650 / count($words);
		foreach($words as $word){
			if(strlen($word)>10){
				$y_pos = 50 - strlen($word);
			}else{
				$y_pos = strlen($word) + 50;
			}
			?><line class="moveline" turn="1" orig_y1="<?PHP echo $last_y; ?>" orig_y2="<?PHP echo $y_pos; ?>" diff="<?PHP echo $last_y - $y_pos; ?>"  x1="<?PHP echo $last_x; ?>" y1="<?PHP echo $last_y; ?>" x2="<?PHP echo $last_x + $space; ?>" y2="<?PHP echo $y_pos; ?>" /><?PHP
			$last_x += $space; 
			$last_y = $y_pos; 
		}
		?>
		<line x1="700" orig_y1="<?PHP echo $last_y; ?>" orig_y2="40" y1="<?PHP echo $last_y; ?>" x2="750" y2="40" turn="1"/>
		</svg><?PHP
	?>
	<p class="title"><a href="<?PHP echo get_the_permalink(); ?>"><?PHP echo $post->post_title; ?></a></p>	
</article>
