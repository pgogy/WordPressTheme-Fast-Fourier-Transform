<?PHP

//	if(get_theme_mod("pagination")=="on"){

		$links = paginate_links( array( "prev_text" => _x("Previous", "Before this one", "fast-fourier-transform"), "next_text" => _x("Next", "After this one", "fast-fourier-transform") ));
		
		if($links!=""){ ?>
			<footer class="page-footer">
				<h1 class="pagination"><span class='more'><?PHP
					echo _x('Page', "More of the same", 'fast-fourier-transform');
				?></span> <?PHP
			
				echo $links;
				
				?></h1>
			</footer><?PHP
			
		}
		
//	}
