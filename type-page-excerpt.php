	<div id="page-<?php the_ID(); ?>" <?php post_class( 'full' ); ?>>

<?php if(has_post_thumbnail()){ ?>
		<div class="post-thumb">
		<?php the_post_thumbnail('post-full-thumb') ?>
		</div>
<?php } ?>
		
		<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fablab' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
<?php //get_template_part('entry-utility'); ?>		

		<div class="entry">
			<?php the_excerpt(); ?>
		</div><!-- .entry -->
		
<!--
<?php trackback_rdf(); ?>
-->
		
	</div><!-- #page-<?php the_ID(); ?> -->