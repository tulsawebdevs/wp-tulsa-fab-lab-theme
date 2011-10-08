	<div id="post-<?php the_ID(); ?>" <?php post_class( 'excerpt' ); ?>>
	
<?php if(has_post_thumbnail()){ ?>
		<div class="post-thumb">
		<?php the_post_thumbnail('post-excerpt-thumb') ?>
		</div>
<?php } ?>
		
		<h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fablab' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		
<?php //get_template_part('entry-utility'); ?>

		<div class="entry">
			<?php the_excerpt(); ?>
		</div><!-- .entry -->

<!--
<?php trackback_rdf(); ?>
-->
		
	</div><!-- #post-<?php the_ID(); ?> -->