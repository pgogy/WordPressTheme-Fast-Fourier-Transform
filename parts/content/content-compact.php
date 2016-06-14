<?PHP
	$words = explode(" ", strip_tags($post->post_content));
	$size = strlen($post->post_title) * rand(5,40);
?>
<article style="width:<?PHP echo $size; ?>px" id="post-<?php the_ID(); ?>" <?php post_class("home-page home-compact"); ?> >
	<svg style="width:<?PHP echo $size; ?>px"><?PHP
		$last_x = 10;
		$last_y = 40;
		if(strlen($words[0])>10){
			$y_pos = 50 - strlen($words[0]);
		}else{
			$y_pos = strlen($words[0]) + 50;
		}
		$space = $size / count($words);
		?><line class="moveline" turn="1" orig_y1="40" orig_y2="<?PHP echo $y_pos; ?>"  x1="<?PHP echo $last_x; ?>" y1="40" x2="<?PHP echo $last_x + $space; ?>" y2="<?PHP echo $y_pos; ?>" /><?PHP
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
		</svg><?PHP
	?>
	<p class="title"><a href="<?PHP echo get_the_permalink(); ?>"><?PHP echo $post->post_title; ?></a></p>	
</article>
