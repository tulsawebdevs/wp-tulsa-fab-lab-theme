<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post();
	get_template_part( 'type-'.get_post_type(), 'full' );		
	endwhile; ?>
<?php endif; ?>