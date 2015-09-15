<div class="lesson-options">
	<?php if(ThemexCourse::isMember()) { ?>
	<form action="<?php echo themex_url(); ?>" method="POST">
		<?php if(ThemexLesson::$data['progress']!=0) { ?>
			<?php if(!ThemexCore::checkOption('lesson_retake')) { ?>
			<a href="#" class="element-button finish-lesson submit-button"><?php _e('Mark Incomplete', 'academy'); ?></a>
			<input type="hidden" name="lesson_action" value="uncomplete_lesson" />
			<input type="hidden" name="course_action" value="uncomplete_course" />
			<?php } ?>
		<?php } else if(ThemexLesson::$data['prerequisite']['progress']!=0) { ?>
			<?php if(is_singular('quiz')) { ?>
			<a href="#quiz_form" class="element-button submit-button"><span class="button-icon check"></span><?php _e('Complete Quiz', 'academy'); ?></a>		
			<?php } else if(!empty(ThemexLesson::$data['quiz'])) { ?>
			<a href="<?php echo get_permalink(ThemexLesson::$data['quiz']['ID']); ?>" class="element-button"><span class="button-icon edit"></span><?php _e('Take a Quiz', 'academy'); ?></a>
			<?php } else { ?>
			<a href="#" class="element-button submit-button secondary"><span class="button-icon check"></span><?php _e('Mark Complete', 'academy'); ?></a>
			<input type="hidden" name="lesson_action" value="complete_lesson" />
			<input type="hidden" name="course_action" value="complete_course" />
			<?php } ?>
		<?php } ?>
		<input type="hidden" name="lesson_id" value="<?php echo ThemexLesson::$data['ID']; ?>" />
		<input type="hidden" name="course_id" value="<?php echo ThemexCourse::$data['ID']; ?>" />
		<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
		<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_lesson" />
	</form>
	<?php } ?>
	<?php if($next=ThemexCourse::getAdjacentLesson(ThemexLesson::$data['ID'])) { ?>
	<a href="<?php echo get_permalink($next->ID); ?>" title="<?php _e('Next Lesson', 'academy'); ?>" class="element-button next-lesson"><span class="button-icon next"></span><?php _e('Next Lesson', 'academy'); ?></a>
	<?php } ?>
	<?php if($prev=ThemexCourse::getAdjacentLesson(ThemexLesson::$data['ID'], false)) { ?>
	<a href="<?php echo get_permalink($prev->ID); ?>" title="<?php _e('Previous Lesson', 'academy'); ?>" class="element-button prev-lesson"><span class="button-icon prev"></span><?php _e('Previous Lesson', 'academy'); ?></a>
	<?php } ?>
</div>
<?php
echo do_shortcode(themex_html(ThemexLesson::$data['sidebar']));

if(!empty(ThemexLesson::$data['attachments'])) {
	get_template_part('module', 'attachments');
}

if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('lesson'));

if(!empty(ThemexCourse::$data['lessons'])) {
	get_template_part('module', 'lessons');
}
?>