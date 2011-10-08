<?php get_header(); ?>
<div id="opening-remarks" class="entry">
<?php if(have_posts()){ the_post();
	the_content();
} ?>
</div>

<div id="mid-content">
<div id="announcements"><p style="text-align: justify;"><strong>We encourage everyone interested in Creative Design, Invention, and Fabrication to <a href="/calendar">Tour</a> Fab Lab Tulsa and <a href="http://www.fablabtulsa.com/wp-content/uploads/2011/09/Jumpstart-Flyer.pdf" target="_blank">Register</a> for our <a href="/jumpstart-program">JUMPSTART PROGRAM</a>. Introductory pricing ends 10/31/11 so register soon!  We're looking forward to seeing you!</div>

	<ul id="quotes">
	<?php /*
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
	*/ ?>
<li class="post-599 quotes type-quotes hentry full" id="quote-599" style="display: list-item;">
	<div class="post-thumb">
	<img src="http://www.fablabtulsa.com/wp-content/uploads/2011/02/Robot-with-Tool-244x300.png" alt="" title="Robot with Tool" width="244" height="300" class="alignright size-medium wp-image-600" />
	</div>
	<div class="entry">
	<p>Welcome<br /><small>to the</small><br />Digital Revolution<br /><small>in</small><br />Fabrication</p>
	</div>
</li>
	</ul>

<!-- Features - bottom 3 sections -->

<!--	<ul id="featured-pages">
<?php /*
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
*/
?>	
	</ul>
-->

<!-- End Features - bottom 3 sections -->

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
