<div class="entry-meta"><?php
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'theme' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
?></div>

<div class="entry-utility">
	<?php if ( count( get_the_category() ) ) : ?>
		<span class="cat-links">
			<?php printf( __( '<span class="%1$s">In</span> %2$s', 'theme' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
		</span>
		<span class="meta-sep">|</span>
	<?php endif; ?>
	<?php
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list ):
	?>
		<span class="tag-links">
			<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'theme' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
		</span>
		<span class="meta-sep">|</span>
	<?php endif; ?>
	<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'theme' ), __( '% Comments', 'twentyten' ) ); ?></span>
	<?php edit_post_link( __( 'Edit', 'theme' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-utility -->