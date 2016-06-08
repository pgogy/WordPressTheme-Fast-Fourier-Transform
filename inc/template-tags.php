<?php

function fast_fourier_transform_get_categories($id){

	$post_categories = wp_get_post_categories($id);
	$cats = array();
		
	foreach($post_categories as $c){
		$cat = get_category( $c );
		$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'link' => get_category_link($c) );
	}
	
	return $cats;

}

function fast_fourier_transform_get_categories_links($id){

	$html = array();
	$cats = fast_fourier_transform_get_categories($id);
	
	foreach($cats as $cat){
		$html[] = "<a href='" . $cat['link'] ."'>" . $cat['name'] . "</a>";
	}
	
	
	if(count($html)==0){
		$html[] = _x("No Categories", "No Categories", "fast-fourier-transform");
	}
	
	return $html;

}

function fast_fourier_transform_body_class(){

	if(is_author()){
		return "author";
	}
	
}

function fast_fourier_transform_get_tags($id){

	$post_tags = wp_get_post_tags($id);
	$cats = array();
		
	foreach($post_tags as $c){
		$cat = get_tag( $c );
		$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'link' => get_tag_link($c) );
	}
	
	return $cats;

}

function fast_fourier_transform_get_tags_links($id){

	$html = array();
	$cats = fast_fourier_transform_get_tags($id);
	
	foreach($cats as $cat){
		$html[] = "<a href='" . $cat['link'] ."'>" . $cat['name'] . "</a>";
	}
	
	if(count($html)==0){
		$html[] = _x("No Tags", "No tags found", "fast-fourier-transform");
	}
	
	return $html;

}

function fast_fourier_transform_entry_meta() {
	
	?><div>
		<h6 class='meta_label'><?PHP echo _x('Categories', 'Categories', 'fast-fourier-transform'); ?></h6><span><?PHP echo implode(" / ", fast_fourier_transform_get_categories_links(get_the_ID())); ?></span>
	</div>
	<div>
		<h6 class='meta_label'><?PHP echo _x('Tags', 'Tags', 'fast-fourier-transform'); ?></h6><span><?PHP echo get_the_tag_list(" ", " / ", " "); ?></span>
	</div>
	<?PHP if(get_theme_mod("author")=="on"){ ?>
	<div>
		<h6 class='meta_label'><?PHP echo _x('Author', 'Post Author', 'fast-fourier-transform'); ?></h6><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></h6>
	</div>
	<div>
		<h6 class='meta_label'><?PHP echo _x('Published', 'Published', 'fast-fourier-transform'); ?></h6><span><a href="<?php echo get_permalink( get_the_ID() ); ?>"><?php the_date(); ?></a></span></h6>
	</div>
	<?PHP
	}
	
}

function fast_fourier_transform_post_background() {
	$background = rand(1,6);
	switch($background){
		case 1: return "cubes";
		case 2: return "stars";
		case 3: return "arrows";
		case 4: return "grid";
		case 5: return "gridother";
		case 6: return "arrows";
	}
}

function fast_fourier_transform_category_title_background($term) {

	$hex = fast_fourier_transform_hex2rgb(get_theme_mod("site_post_background_colour"));

	$thumbnail = get_option( 'fast_fourier_transform_picture_' . $term . '_thumbnail_id', 0 );
	
	if($thumbnail){
		
		?>margin-top: 10px; background-color: rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 0.75); <?PHP		
	
	}else{

		$colour = get_option( 'fast-fourier-transform' . $term . '_colour');
		
		if($colour){
			
			?> background-color: rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 0.75); <?PHP		
		
		}
		
	}

}

function fast_fourier_transform_post_colour_background() {

	global $post;
	$colour = get_post_meta($post->ID, "fast_fourier_transform_post_colour", true);
	?> background-color:<?PHP echo $colour;?>; <?PHP
	
}

function fast_fourier_transform_post_thumbnail() {

	if(get_post_thumbnail_id(get_the_ID())!=""){
		
		$id = get_the_ID();

		echo get_the_post_thumbnail($id, array(90,90), array("class" => "post-thumbnail-article"));
	
	}
	
}

function fast_fourier_transform_child_categories(){

	?><footer class="page-footer">
		<h1 class="page-title"><?PHP echo _x('Related Categories', "Similar Categories", 'fast-fourier-transform'); ?></h1>
		<div class="taxonomy-description"><?PHP
		
			$category = get_category($_GET['cat']);
			
			$childcats = get_categories('child_of=' . $category->parent . '&hide_empty=1&exclude=' . $_GET['cat']);
			$output = array();
			foreach ($childcats as $childcat) {
				if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false){
					$output[] = '<a href="'.get_category_link($childcat->cat_ID).'">' . $childcat->cat_name . '</a>';
					$ancestor = $childcat->cat_ID;
				}
			}
			
			echo implode(" / ", $output);
			
		?></div>
	</footer><?PHP

}

function fast_fourier_transform_posts_authors_list($type, $id){

	$the_query = new WP_Query( array($type => $id, 'posts_per_page' => 99) );
	
	$authors = array();

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$authors[] = get_the_author_meta('ID');
		}
	} 
	
	wp_reset_postdata();
	
	return $authors;
	
}

function fast_fourier_transform_single_line($post){
	
	$words = str_split($post->post_title,1);
	?><svg width="750px" height="61px">
	<line x1="0" orig_y1="40" x2="50" orig_y2="40" y1="40" x2="50" y2="40" turn="1" /><?PHP
	$last_x = 50;
	$last_y = 40;
	$space = 650 / count($words);
	foreach($words as $word){
		$size = ord($word) / 4;
		if($size>30){
			$y_pos = 30 - $size;
		}else{
			$y_pos = $size + 30;
		}
		?><line class="moveline" turn="1" orig_y1="<?PHP echo $last_y; ?>" orig_y2="<?PHP echo $y_pos; ?>" diff="<?PHP echo $last_y - $y_pos; ?>"  x1="<?PHP echo $last_x; ?>" y1="<?PHP echo $last_y; ?>" x2="<?PHP echo $last_x + $space; ?>" y2="<?PHP echo $y_pos; ?>" /><?PHP
		$last_x += $space; 
		$last_y = $y_pos; 
	}
	?>
	<line x1="700" orig_y1="<?PHP echo $last_y; ?>" orig_y2="40" y1="<?PHP echo $last_y; ?>" x2="750" y2="40" turn="1" />
	</svg><?PHP
}

function fast_fourier_transform_posts_authors_html($type, $id){

	$authors = array_unique(fast_fourier_transform_posts_authors_list($type, $id));

	$output = array();
	foreach($authors as $author){
		$output[] = "<a href='" . get_author_posts_url($author) . "'>" . ucfirst(get_the_author_meta( 'display_name', $author )) . "</a>";
	}
	
	echo implode(" / ", $output);

}

function fast_fourier_transform_post_authors($type, $id){
	?><footer class="page-footer">
		<h1 class="page-title"><?PHP echo _x('Authors', "WordPress authors", 'fast-fourier-transform'); ?></h1>
		<div class="taxonomy-description" id='tag_cloud'><?PHP
		
			fast_fourier_transform_posts_authors_html($type, $id);
			
		?></div>
	</footer><?PHP
}

function fast_fourier_transform_posts_content($type, $id){

	$the_query = new WP_Query( array($type => $id, 'posts_per_page' => 99) );
	
	$content = "";

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$content .= str_replace("\r", "", str_replace("\n", "", str_replace(".", "", preg_replace("/(?![=$'%-])\p{P}/u", " ", strip_tags(strtolower(get_the_content()))))));
		}
	} 
	
	wp_reset_postdata();
	
	return $content;
	
}
