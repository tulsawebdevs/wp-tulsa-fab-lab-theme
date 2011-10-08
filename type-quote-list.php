	<li id="quote-<?php the_ID(); ?>" <?php post_class( 'full' ); ?>>

<?php if(has_post_thumbnail()){ ?>
		<div class="post-thumb">
		<?php the_post_thumbnail('quote-full-thumb') ?>
		</div>
<?php } ?>

		<div class="entry">
			<?php the_content(); ?>
		</div><!-- .entry -->
				
	</li><!-- #quote-<?php the_ID(); ?> -->