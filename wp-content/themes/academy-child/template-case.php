<?php
/*
Template Name: Case Studies
*/

get_header();

$layout=ThemexCore::getOption('posts_layout', 'right');
if($layout=='left') { ?>
<aside class="sidebar column fourcol">
	<?php get_sidebar(); ?>
</aside>
<div class="column eightcol last">
<?php } else if($layout=='right') { ?>
<div class="column eightcol">
<?php } else { ?>	
<div class="fullwidth-section">
<?php } ?>
	<div class="posts-listing popup-container">
		<?php if(is_page()) {
			query_posts(array(
				'post_type' =>'case',
				'paged' => themex_paged(),
			));

			if(have_posts()) {
				while(have_posts()) {
					the_post(); 
					get_template_part('content', 'post');
				} 
			} else {
				echo "<h3><?php _e('No posts found. Try a different search?','academy'); ?></h3>";
				echo "<p><?php _e('Sorry, no posts matched your search. Try again with some different keywords.','academy'); ?></p>";
			}
		} ?>
	</div>
	<?php ThemexInterface::renderPagination(); ?>
</div>
<?php if($layout=='right') { ?>
	<aside class="sidebar column fourcol last">
		<?php get_sidebar(); ?>
	</aside>
<?php } ?>

<?php get_footer(); ?>