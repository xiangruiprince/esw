<?php the_post(); ?>
<?php ThemexCourse::refresh($post->ID, true); ?>
<div class="ninecol column last">
	<div class="course-description widget <?php echo ThemexCourse::$data['status']; ?>-course">
		<h1><?php the_title(); ?></h1>
		<div class="widget-content">
			<?php the_content(); ?>
			<footer class="course-footer">
				<?php get_template_part('module', 'form'); ?>
			</footer>
		</div>						
	</div>
</div>
<?php if(ThemexCourse::hasMembers() || is_active_sidebar('course') || !empty(ThemexCourse::$data['sidebar'])) { ?>
<aside class="sidebar threecol column last">
	<?php
	echo do_shortcode(themex_html(ThemexCourse::$data['sidebar']));
	
	if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('course'));

	?>
</aside>
<?php } ?>