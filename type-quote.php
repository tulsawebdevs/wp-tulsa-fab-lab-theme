	<div id="post-<?php the_ID(); ?>" <?php post_class( 'full' ); ?>>

<?php if(has_post_thumbnail()){ ?>
		<div class="post-thumb">
		<?php the_post_thumbnail('post-full-thumb') ?>
		</div>
<?php } ?>
		
		<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fablab' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
<?php get_template_part('entry-utility'); ?>		

		<div class="entry">
			<?php the_content(); ?>
		</div><!-- .entry -->
		
		<?php if(is_single()){ ?>
		<?php get_template_part('nav', 'post'); ?>	
		<div class="comments">
			<?php comments_template( '', true ); ?>
		</div>
		<?php } ?>
		
<!--
<?php trackback_rdf(); ?>
-->
		
	</div><!-- #post-<?php the_ID(); ?> -->