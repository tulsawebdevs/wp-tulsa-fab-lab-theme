	<li id="page-<?php the_ID(); ?>" <?php post_class( 'full' ); ?>>
		
		<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fablab' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<div class="entry">
			<?php the_excerpt(); ?>
		</div><!-- .entry -->
		
	</li><!-- #page-<?php the_ID(); ?> -->