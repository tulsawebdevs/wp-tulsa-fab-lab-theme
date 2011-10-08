<?php get_header(); ?>
<div id="opening-remarks" class="entry">
<?php if(have_posts()){ the_post();
	the_content();
} ?>
</div>

<div id="mid-content">
	<ul id="quotes">
	<?php 
		query_posts(array(
			'post_type' => 'quotes',
			'posts_per_page' => -1,
		));
		if(have_posts()){
			while(have_posts()){
				the_post();
				get_template_part( 'type-quote', 'list' );		
			}
		}
		wp_reset_query();
	?>
	</ul>
	<ul id="featured-pages">
<?php 
	query_posts(array(
		'post_type' => 'page',
		'posts_per_page' => '3',
		'include' => array(2,3,8) // List featured pages here.
	));
	if(have_posts()){
		while(have_posts()){
			the_post();
			get_template_part( 'type-page', 'list' );		
		}
	}
	wp_reset_query();
?>	
	</ul>
<?php wp_nav_menu( array( 'container'=> false, 'menu_id' => 'menu-side', 'theme_location' => 'front-right' ) ); ?>

</div>

<div id="latest-posts">
<?php 
	query_posts(array(
		'post_type' => 'post',
		'posts_per_page' => '6',
	));
	if(have_posts()){
		while(have_posts()){
			the_post();
			get_template_part( 'type-post', 'excerpt' );		
		}
	}
	wp_reset_query();
?>
</div>

<!--
<div id="content">
<?php //get_template_part('loop','front-page');?>
</div>
-->

<?php get_footer(); ?>
