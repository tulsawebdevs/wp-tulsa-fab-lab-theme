<?php

/* Template Name: Projects */

get_header(); ?>

<h2 class="page-title">Projects</h2>

<div id="content" class="wide projects">

<?php

$projects_feed = InstructablesFeeds::get_projects();

$amount = 20;
			
foreach( $projects_feed->get_items(0, $amount) as $project ){
		
		$publisher = '';
		$site_link = '';
		$link = '';
		$content = '';
		$date = '';
		$link = esc_url( strip_tags( $project->get_link() ) );
		$title = strip_tags( $project->get_title() );
		
		//$author = $project->get_item_tags('author');

		$content = wp_html_excerpt($project->get_content(), 150) . '&hellip;';

		$date = esc_html( strip_tags( $project->get_date() ) );
		$date = strtotime( $date );
		$date = gmdate( get_option( 'date_format' ), $date );
		
?>
	<div class="project">
		
		<h2><a href="<?php echo $link; ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fablab' ), $title ); ?>" rel="bookmark"><?php echo $title; ?></a></h2>
		<div class="date"><em><?php echo $date ?></em></div>
		<div class="entry">
			<?php echo $project->get_content(); ?>
		</div><!-- .entry -->

	</div><!-- .project -->
	
<?php } ?>
</div>

<?php get_footer(); ?>
